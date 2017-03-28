<?php
require_once('class/Videos.class.php');
$youtube = new Videos();

if(isset($_POST['accion'])) {
  $accion = $_POST['accion'];

  if($accion == "buscar_video") {
    $youtube_info = $youtube->obtener_video_from_youtube($_POST['codigo_youtube']);
    //var_dump($youtube_info);
    echo '<br><br>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/'.$_POST['codigo_youtube'].'?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      <h1>'.$youtube_info['snippet']['title'].'</h1>
      <h3>'.$youtube_info['id'].'</h3>
      <p>'.$youtube_info['snippet']['description'].'</p>
      <span>Visitas: '.$youtube_info['statistics']['viewCount'].'</span>
      <input id="guardar-video" type="button" data-videoid="'.$youtube_info['id'].'" data-videotitle="'.$youtube_info['snippet']['title'].'" data-videodescripcion="'.$youtube_info['snippet']['description'].'" value="Guardar Video" />
      ';
  }
  if($accion == "guardar_video") {
    var_dump($_POST);
  }
}
else {
  echo "sin accion recibida";
}
?>
