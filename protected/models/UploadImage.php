<?php

/**
 * This is the model class for uploading and manipulating images".
 * *
 */
class UploadImage extends CFormModel{
	const LOGO_BR = 'logo_br'; // indexed on BrokerSettings->id
	const LOGO_OP = 'logo_op'; // indexed on Operator->id
	const PICTURE = 'picture'; // indexed on User->id
	const AIRPLANE = 'airplane'; // indexed on <tail number>_<image number>
	const DEFAULT_IMAGE = 'default'; // get the default image
	const REPO_PATH = '/imagerepo';
	public $repo;
	public $id;
	public $type; // 'logo' or 'n#_index#' like 'N35424_1'
	public $size;
	public $image;
	public function __construct($id, $type, $size){
		// $this->repo = Yii::getPathOfAlias('application.protected.uploads');
		$this->repo = UploadImage::getRepo();
		$this->id = $id;
		$this->type = $type;
		$this->size = $size;
		$this->openPath($this->repo, $id, $type, $size);
	}
	public static function getName(){
		return 'image.jpg';
	}
	public function getPath(){
		return $this->repo . '/' . $this->id . '/' . $this->type . '/' . $this->size . '/';
	}
	public static function getRepo(){
		return Yii::getPathOfAlias('webroot') . UploadImage::REPO_PATH;
	}
	public static function getRepoUrl(){
		return Yii::app()->baseUrl . UploadImage::REPO_PATH;
	}
	public static function getStaticPath($id, $type, $size){
		if($type != UploadImage::DEFAULT_IMAGE) return UploadImage::getRepo() . '/' . $id . '/' . $type . '/' . $size . '/';
		else return UploadImage::getRepo() . '/' . $type . '/' . $size . '/';
	}
	public static function getStaticUrl($id, $type, $size){
		if($type != UploadImage::DEFAULT_IMAGE) return UploadImage::getRepoUrl() . '/' . $id . '/' . $type . '/' . $size . '/';
		else return UploadImage::getRepoUrl() . '/' . $type . '/' . $size . '/';
	}
	public static function openPath($repo, $id, $type, $size){
		$dir = $repo;
		if(!($dir)){
			mkdir($dir, 0777, true);
		}
		if(isset($id)){
			$dir = $dir . '/' . $id;
			if(!file_exists($dir)){
				mkdir($dir, 0777, true);
			}
		}
		$dir = $dir . '/' . $type;
		if(!file_exists($dir)){
			mkdir($dir, 0777, true);
		}
		$dir = $dir . '/' . $size;
		if(!file_exists($dir)){
			mkdir($dir, 0777, true);
		}
	}
	public function getImageRaw(){
		return '<img src="' . $this->getPath() . $this->getName() . '" alt=/"' . $this->type . '/" />';
	}
	public static function getImage($id, $type, $x, $y){
		return '<img src="' . UploadImage::getImageUrl($id, $type, $x, $y) . '" alt="' . $type . '" />';
	}
	public static function getImageUrl($id, $type, $x, $y){
		$thumbSize = ($x == 0)?'raw':$x . '_' . $y;
		$path = UploadImage::getStaticPath($id, $type, $thumbSize) . UploadImage::getName();
		$url = UploadImage::getStaticUrl($id, $type, $thumbSize) . UploadImage::getName();
		$raw = UploadImage::getStaticPath($id, $type, 'raw') . UploadImage::getName();
		if(UploadImage::pathExists($path)){
			return $url;
		}elseif(UploadImage::pathExists($raw)){ // if sized image does not exist but raw does, size and store image.
			list($sourceImageWidth, $sourceImageHeight, $sourceImageType) = getimagesize($raw);
			$sourceGdImage = imagecreatefromjpeg($raw);
			$sourceAspectRatio = $sourceImageWidth / $sourceImageHeight;
			$thumbnailAspectRatio = $x / $y;
			if($sourceImageWidth <= $x && $sourceImageHeight <= $y){
				$thumbnailImageWidth = $sourceImageWidth;
				$thumbnailImageHeight = $sourceImageHeight;
			}elseif($thumbnailAspectRatio > $sourceAspectRatio){
				$thumbnailImageWidth = (int)($y * $sourceAspectRatio);
				$thumbnailImageHeight = $y;
			}else{
				$thumbnailImageWidth = $x;
				$thumbnailImageHeight = (int)($x / $sourceAspectRatio);
			}
			$thumbnailGdImage = imagecreatetruecolor($thumbnailImageWidth, $thumbnailImageHeight);
			imagecopyresampled($thumbnailGdImage, $sourceGdImage, 0, 0, 0, 0, $thumbnailImageWidth, $thumbnailImageHeight, $sourceImageWidth, $sourceImageHeight);
			UploadImage::openPath(UploadImage::getRepo(), $id, $type, $thumbSize);
			imagejpeg($thumbnailGdImage, $path, 90);
			imagedestroy($sourceGdImage);
			imagedestroy($thumbnailGdImage);
		}elseif($type != UploadImage::DEFAULT_IMAGE){ // image does not exist. Therefore, we get the default images stored at id=0
			$type = UploadImage::DEFAULT_IMAGE;
			return UploadImage::getImageUrl('', $type, $x, $y);
		}
		return $url; // the default image dose not exist!
	}
	public function getImageThumb($x = 100, $y = 100){
		return UploadImage::getImage($this->id, $this->type, $x, $y);
	}
	public function rules(){
		return array(array('image','file','types'=>'gif, jpg, png'));
	}
	
	/**
	 * Convert all incomming images to jpg.
	 */
	public function convertToJpeg($img){
		$imgInfo = getimagesize($img);
		
		$width = $imgInfo[0];
		$height = $imgInfo[1];
		
		switch($imgInfo[2]){
			case IMAGETYPE_GIF:
				$src = imagecreatefromgif($img);
				break;
			case IMAGETYPE_JPEG:
				$src = imagecreatefromjpeg($img);
				break;
			case IMAGETYPE_PNG:
				$src = imagecreatefrompng($img);
				break;
			default:
				die("Unknown filetype");
		}
		
		$tmp = imagecreatetruecolor($width, $height);
		imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
		imagejpeg($tmp, $this->getPath() . $this->getName());
	}
	public function upload(){
		$file = CUploadedFile::getInstance($this, 'image');
		$this->image = $file;
		if($this->validate()){
			exec("rm -rf " . $this->repo . '/' . $this->id . '/' . $this->type);
			$this->openPath($this->repo, $this->id, $this->type, $this->size);
			copy($file->tempName, $this->getPath() . $file->name);
			$this->convertToJpeg($file->tempName); // store raw jpg
		}
	}
	public static function pathExists($path){
		$elements = explode('/', $path);
		$newPath = '/';
		foreach($elements as $element){
			if(isset($element) && !empty($element)){
				$newPath = $newPath . $element;
				if(!file_exists($newPath)){return false;}
				$newPath = $newPath . '/';
			}
		}
		return true;
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return BrokerSettings the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
}
