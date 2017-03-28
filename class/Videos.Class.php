<?php
include("DataBase.class.php");
class Videos extends DataBase {

  /**
   * Busca si existe un libro centralizado segun su ISBN
   * @return Array
   */
  public function insertar_video($youtube_code, $youtube_title, $youtube_descripcion) {
      $this->query = "SELECT * FROM ".$this->prefix."videos WHERE code=".$this->sanitizar($youtube_code);
      return $this->ejecutar_consulta($this->query);
  }

  public function obtener_videos_from_db($limite) {
      $this->query = "SELECT ".$this->sanitizar($columnas)." FROM ".$this->prefix."videos order by ID desc LIMIT 0,".$this->sanitizar($limite);
      $this->obtener_consulta($this->query);
      return $this->rows;
  }

  public function obtener_video_from_youtube($id) {
    if(empty($id)) {
      return "El campo ID no puede quedar vacio";
    }
    $videoTitle = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=".$id."&key=AIzaSyAqDaBmB-cCMD8E1aQkwHpdJ970A7oIOlQ&fields=items(id,snippet(title,description),statistics)&part=snippet,statistics");
    if ($videoTitle) {
      $json = json_decode($videoTitle, true);
      return $json['items'][0];
    }
    else {
      return false;
      }
  }


}
