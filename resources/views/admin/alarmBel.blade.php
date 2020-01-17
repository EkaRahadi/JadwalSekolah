<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bunyi Bel</title>
    <script src="./audiojs/audio.min.js"></script>
    <link rel="stylesheet" href="./includes/index.css" media="screen">
    <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
    </script>
  </head>
  <body>
    <header>
      <h1>Bel Sekolah Berbunyi</h1>
    </header>
    @if(Session::has('ringtone'))
    <audio src="https://res.cloudinary.com/harsoft-development/video/upload/{{Session::get('ringtone')}}.mp3" preload="auto" autoplay=""></audio>
    @endif
    <footer>
      <p>This site is ©copyright <a href="http://aestheticallyloyal.com">Anthony Kolber</a>, 2010.</p>
    </footer>
  </body>
</html>
