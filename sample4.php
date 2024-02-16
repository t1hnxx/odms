<?php
	require 'class/login_connect.php';
	
	if(isset($_SESSION["facultyID"])){
		$session = $_SESSION["facultyID"];
		$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM sample WHERE facultyID = '$session'"));
    $type = $user['userType'];
    if($type == "Personnel"){
		include("sample.php");}
    elseif($type == "Student"){
      include("sample4.php");
    }
	}  
	else{
		header("Location: optionLogin.php");
	  }
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Documentation and examples for Bootstrap&rsquo;s powerful, responsive navigation header, the navbar. Includes support for branding, navigation, and more, including support for our collapse plugin.">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.115.4">

<meta name="docsearch:language" content="en">
<meta name="docsearch:version" content="5.3">

<title>Navbar · Bootstrap v5.3</title>

<link rel="canonical" href="https://getbootstrap.com/docs/5.3/components/navbar/">

<link rel="preconnect" href="https://AK7KMZKZHQ-dsn.algolia.net" crossorigin>

<script src="/docs/5.3/assets/js/color-modes.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<link href="/docs/5.3/assets/css/docs.css" rel="stylesheet">

<!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@getbootstrap">
<meta name="twitter:creator" content="@getbootstrap">
<meta name="twitter:title" content="Navbar">
<meta name="twitter:description" content="Documentation and examples for Bootstrap&rsquo;s powerful, responsive navigation header, the navbar. Includes support for branding, navigation, and more, including support for our collapse plugin.">
<meta name="twitter:image" content="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-social.png">

<meta property="og:url" content="https://getbootstrap.com/docs/5.3/components/navbar/">
<meta property="og:title" content="Navbar">
<meta property="og:description" content="Documentation and examples for Bootstrap&rsquo;s powerful, responsive navigation header, the navbar. Includes support for branding, navigation, and more, including support for our collapse plugin.">
<meta property="og:type" content="article">
<meta property="og:image" content="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-social.png">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="2000">
<meta property="og:image:height" content="1000">

<script defer src="https://cdn.usefathom.com/script.js" data-site="ITUSEYJG"></script>

<script>
  window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
  ga('create', 'UA-146052-10', 'getbootstrap.com');
  ga('set', 'anonymizeIp', true);
  ga('send', 'pageview');
</script>
<script async src="https://www.google-analytics.com/analytics.js"></script>


  </head>
  <body data-bs-spy="scroll" data-bs-target="#TableOfContents">
    <div class="skippy visually-hidden-focusable overflow-hidden">
  <div class="container-xl">
    <a class="d-inline-flex p-2 m-1" href="#content">Skip to main content</a>
    <a class="d-none d-md-inline-flex p-2 m-1" href="#bd-docs-nav">Skip to docs navigation</a>
  </div>
</div>

    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="arrow-right" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
  </symbol>
  <symbol id="book-half" viewBox="0 0 16 16">
    <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
  </symbol>
  <symbol id="box-seam" viewBox="0 0 16 16">
    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
  </symbol>
  <symbol id="braces" viewBox="0 0 16 16">
    <path d="M2.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C3.25 2 2.49 2.759 2.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6zM13.886 7.9v.163c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456V7.332c-1.114 0-1.49-.362-1.49-1.456V4.352C13.51 2.759 12.75 2 11.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6z"/>
  </symbol>
  <symbol id="braces-asterisk" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M1.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C2.25 2 1.49 2.759 1.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6ZM14.886 7.9v.164c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456v-1.3c-1.114 0-1.49-.362-1.49-1.456V4.352C14.51 2.759 13.75 2 12.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6ZM7.5 11.5V9.207l-1.621 1.621-.707-.707L6.792 8.5H4.5v-1h2.293L5.172 5.879l.707-.707L7.5 6.792V4.5h1v2.293l1.621-1.621.707.707L9.208 7.5H11.5v1H9.207l1.621 1.621-.707.707L8.5 9.208V11.5h-1Z"/>
  </symbol>
  <symbol id="check2" viewBox="0 0 16 16">
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
  </symbol>
  <symbol id="chevron-expand" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z"/>
  </symbol>
  <symbol id="circle-half" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
  </symbol>
  <symbol id="clipboard" viewBox="0 0 16 16">
    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
  </symbol>
  <symbol id="code" viewBox="0 0 16 16">
    <path d="M5.854 4.854a.5.5 0 1 0-.708-.708l-3.5 3.5a.5.5 0 0 0 0 .708l3.5 3.5a.5.5 0 0 0 .708-.708L2.707 8l3.147-3.146zm4.292 0a.5.5 0 0 1 .708-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 0 1-.708-.708L13.293 8l-3.147-3.146z"/>
  </symbol>
  <symbol id="file-earmark-richtext" viewBox="0 0 16 16">
    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
    <path d="M4.5 12.5A.5.5 0 0 1 5 12h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 10h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm1.639-3.708 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V8.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V8s1.54-1.274 1.639-1.208zM6.25 6a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5z"/>
  </symbol>
  <symbol id="globe2" viewBox="0 0 16 16">
    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
  </symbol>
  <symbol id="grid-fill" viewBox="0 0 16 16">
    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z"/>
  </symbol>
  <symbol id="lightning-charge-fill" viewBox="0 0 16 16">
    <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
  </symbol>
  <symbol id="list" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
  </symbol>
  <symbol id="magic" viewBox="0 0 16 16">
    <path d="M9.5 2.672a.5.5 0 1 0 1 0V.843a.5.5 0 0 0-1 0v1.829Zm4.5.035A.5.5 0 0 0 13.293 2L12 3.293a.5.5 0 1 0 .707.707L14 2.707ZM7.293 4A.5.5 0 1 0 8 3.293L6.707 2A.5.5 0 0 0 6 2.707L7.293 4Zm-.621 2.5a.5.5 0 1 0 0-1H4.843a.5.5 0 1 0 0 1h1.829Zm8.485 0a.5.5 0 1 0 0-1h-1.829a.5.5 0 0 0 0 1h1.829ZM13.293 10A.5.5 0 1 0 14 9.293L12.707 8a.5.5 0 1 0-.707.707L13.293 10ZM9.5 11.157a.5.5 0 0 0 1 0V9.328a.5.5 0 0 0-1 0v1.829Zm1.854-5.097a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L8.646 5.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0l1.293-1.293Zm-3 3a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L.646 13.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0L8.354 9.06Z"/>
  </symbol>
  <symbol id="menu-button-wide-fill" viewBox="0 0 16 16">
    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0h-13zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1zm9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
  </symbol>
  <symbol id="moon-stars-fill" viewBox="0 0 16 16">
    <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
    <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
  </symbol>
  <symbol id="palette2" viewBox="0 0 16 16">
    <path d="M0 .5A.5.5 0 0 1 .5 0h5a.5.5 0 0 1 .5.5v5.277l4.147-4.131a.5.5 0 0 1 .707 0l3.535 3.536a.5.5 0 0 1 0 .708L10.261 10H15.5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5H3a2.99 2.99 0 0 1-2.121-.879A2.99 2.99 0 0 1 0 13.044m6-.21 7.328-7.3-2.829-2.828L6 7.188v5.647zM4.5 13a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0zM15 15v-4H9.258l-4.015 4H15zM0 .5v12.495V.5z"/>
    <path d="M0 12.995V13a3.07 3.07 0 0 0 0-.005z"/>
  </symbol>
  <symbol id="plugin" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 2.898 5.673c-.167-.121-.216-.406-.002-.62l1.8-1.8a3.5 3.5 0 0 0 4.572-.328l1.414-1.415a.5.5 0 0 0 0-.707l-.707-.707 1.559-1.563a.5.5 0 1 0-.708-.706l-1.559 1.562-1.414-1.414 1.56-1.562a.5.5 0 1 0-.707-.706l-1.56 1.56-.707-.706a.5.5 0 0 0-.707 0L5.318 5.975a3.5 3.5 0 0 0-.328 4.571l-1.8 1.8c-.58.58-.62 1.6.121 2.137A8 8 0 1 0 0 8a.5.5 0 0 0 1 0Z"/>
  </symbol>
  <symbol id="plus" viewBox="0 0 16 16">
    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
  </symbol>
  <symbol id="sun-fill" viewBox="0 0 16 16">
    <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
  </symbol>
  <symbol id="three-dots" viewBox="0 0 16 16">
    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
  </symbol>
  <symbol id="tools" viewBox="0 0 16 16">
    <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
  </symbol>
  <symbol id="ui-radios" viewBox="0 0 16 16">
    <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zM0 12a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm7-1.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zM3 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0 4.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
  </symbol>
</svg>


    <header class="navbar navbar-expand-lg bd-navbar sticky-top">
  <nav class="container-xxl bd-gutter flex-wrap flex-lg-nowrap" aria-label="Main navigation">
    <div class="bd-navbar-toggle">
      <button class="navbar-toggler p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdSidebar" aria-controls="bdSidebar" aria-label="Toggle docs navigation">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi" fill="currentColor" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg>

        <span class="d-none fs-6 pe-1">Browse</span>
      </button>
    </div>

    <a class="navbar-brand p-0 me-0 me-lg-2" href="/" aria-label="Bootstrap">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="d-block my-1" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"/></svg>
    </a>

    <div class="d-flex">
      <div class="bd-search" id="docsearch" data-bd-docs-version="5.3"></div>

      <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-label="Toggle navigation">
        <svg class="bi" aria-hidden="true"><use xlink:href="#three-dots"></use></svg>
      </button>
    </div>

    <div class="offcanvas-lg offcanvas-end flex-grow-1" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel" data-bs-scroll="true">
      <div class="offcanvas-header px-4 pb-0">
        <h5 class="offcanvas-title text-white" id="bdNavbarOffcanvasLabel">Bootstrap</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
      </div>

      <div class="offcanvas-body p-4 pt-0 p-lg-0">
        <hr class="d-lg-none text-white-50">
        <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2 active" aria-current="true" href="/docs/5.3/getting-started/introduction/" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Docs');">Docs</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="/docs/5.3/examples/" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Examples');">Examples</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="https://icons.getbootstrap.com/" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Icons');" target="_blank" rel="noopener">Icons</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="https://themes.getbootstrap.com/" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Themes');" target="_blank" rel="noopener">Themes</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="https://blog.getbootstrap.com/" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Blog');" target="_blank" rel="noopener">Blog</a>
          </li>
        </ul>

        <hr class="d-lg-none text-white-50">

        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="https://github.com/twbs" target="_blank" rel="noopener">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="navbar-nav-svg" viewBox="0 0 512 499.36" role="img"><title>GitHub</title><path fill="currentColor" fill-rule="evenodd" d="M256 0C114.64 0 0 114.61 0 256c0 113.09 73.34 209 175.08 242.9 12.8 2.35 17.47-5.56 17.47-12.34 0-6.08-.22-22.18-.35-43.54-71.2 15.49-86.2-34.34-86.2-34.34-11.64-29.57-28.42-37.45-28.42-37.45-23.27-15.84 1.73-15.55 1.73-15.55 25.69 1.81 39.21 26.38 39.21 26.38 22.84 39.12 59.92 27.82 74.5 21.27 2.33-16.54 8.94-27.82 16.25-34.22-56.84-6.43-116.6-28.43-116.6-126.49 0-27.95 10-50.8 26.35-68.69-2.63-6.48-11.42-32.5 2.51-67.75 0 0 21.49-6.88 70.4 26.24a242.65 242.65 0 0 1 128.18 0c48.87-33.13 70.33-26.24 70.33-26.24 14 35.25 5.18 61.27 2.55 67.75 16.41 17.9 26.31 40.75 26.31 68.69 0 98.35-59.85 120-116.88 126.32 9.19 7.9 17.38 23.53 17.38 47.41 0 34.22-.31 61.83-.31 70.23 0 6.85 4.61 14.81 17.6 12.31C438.72 464.97 512 369.08 512 256.02 512 114.62 397.37 0 256 0z"/></svg>
              <small class="d-lg-none ms-2">GitHub</small>
            </a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="https://twitter.com/getbootstrap" target="_blank" rel="noopener">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="navbar-nav-svg" viewBox="0 0 512 416.32" role="img"><title>Twitter</title><path fill="currentColor" d="M160.83 416.32c193.2 0 298.92-160.22 298.92-298.92 0-4.51 0-9-.2-13.52A214 214 0 0 0 512 49.38a212.93 212.93 0 0 1-60.44 16.6 105.7 105.7 0 0 0 46.3-58.19 209 209 0 0 1-66.79 25.37 105.09 105.09 0 0 0-181.73 71.91 116.12 116.12 0 0 0 2.66 24c-87.28-4.3-164.73-46.3-216.56-109.82A105.48 105.48 0 0 0 68 159.6a106.27 106.27 0 0 1-47.53-13.11v1.43a105.28 105.28 0 0 0 84.21 103.06 105.67 105.67 0 0 1-47.33 1.84 105.06 105.06 0 0 0 98.14 72.94A210.72 210.72 0 0 1 25 370.84a202.17 202.17 0 0 1-25-1.43 298.85 298.85 0 0 0 160.83 46.92"/></svg>
              <small class="d-lg-none ms-2">Twitter</small>
            </a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="https://opencollective.com/bootstrap" target="_blank" rel="noopener">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" fill-rule="evenodd" class="navbar-nav-svg" viewBox="0 0 40 41" role="img"><title>Open Collective</title><path fill-opacity=".4" d="M32.8 21c0 2.4-.8 4.9-2 6.9l5.1 5.1c2.5-3.4 4.1-7.6 4.1-12 0-4.6-1.6-8.8-4-12.2L30.7 14c1.2 2 2 4.3 2 7z"/><path d="M20 33.7a12.8 12.8 0 0 1 0-25.6c2.6 0 5 .7 7 2.1L32 5a20 20 0 1 0 .1 31.9l-5-5.2a13 13 0 0 1-7 2z"/></svg>
              <small class="d-lg-none ms-2">Open Collective</small>
            </a>
          </li>
          <li class="nav-item py-2 py-lg-1 col-12 col-lg-auto">
            <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-white"></div>
            <hr class="d-lg-none my-2 text-white-50">
          </li>

          

<li class="nav-item dropdown">
  <button type="button" class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
    <span class="d-lg-none" aria-hidden="true">Bootstrap</span><span class="visually-hidden">Bootstrap&nbsp;</span> v5.3 <span class="visually-hidden">(switch to other versions)</span>
  </button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><h6 class="dropdown-header">v5 releases</h6></li>
    <li>
      <a class="dropdown-item d-flex align-items-center justify-content-between active" aria-current="true" href="/docs/5.3/components/navbar/">
        Latest (5.3.x)
        <svg class="bi"><use xlink:href="#check2"></use></svg>
      </a>
    </li>
    <li>
        <a class="dropdown-item" href="https://getbootstrap.com/docs/5.2/components/navbar/">v5.2.3</a>
    </li>
    <li>
        <a class="dropdown-item" href="https://getbootstrap.com/docs/5.1/components/navbar/">v5.1.3</a>
    </li>
    <li>
        <a class="dropdown-item" href="https://getbootstrap.com/docs/5.0/components/navbar/">v5.0.2</a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li><h6 class="dropdown-header">Previous releases</h6></li>
    <li><a class="dropdown-item" href="https://getbootstrap.com/docs/4.6/">v4.6.x</a></li>
    <li><a class="dropdown-item" href="https://getbootstrap.com/docs/3.4/">v3.4.1</a></li>
    <li><a class="dropdown-item" href="https://getbootstrap.com/2.3.2/">v2.3.2</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="/docs/versions/">All versions</a></li>
  </ul>
</li>


          <li class="nav-item py-2 py-lg-1 col-12 col-lg-auto">
            <div class="vr d-none d-lg-flex h-100 mx-lg-2 text-white"></div>
            <hr class="d-lg-none my-2 text-white-50">
          </li>

          <li class="nav-item dropdown">
            <button class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
                    id="bd-theme"
                    type="button"
                    aria-expanded="false"
                    data-bs-toggle="dropdown"
                    data-bs-display="static"
                    aria-label="Toggle theme (auto)">
              <svg class="bi my-1 theme-icon-active"><use href="#circle-half"></use></svg>
              <span class="d-lg-none ms-2" id="bd-theme-text">Toggle theme</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text">
              <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                  <svg class="bi me-2 opacity-50 theme-icon"><use href="#sun-fill"></use></svg>
                  Light
                  <svg class="bi ms-auto d-none"><use href="#check2"></use></svg>
                </button>
              </li>
              <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                  <svg class="bi me-2 opacity-50 theme-icon"><use href="#moon-stars-fill"></use></svg>
                  Dark
                  <svg class="bi ms-auto d-none"><use href="#check2"></use></svg>
                </button>
              </li>
              <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                  <svg class="bi me-2 opacity-50 theme-icon"><use href="#circle-half"></use></svg>
                  Auto
                  <svg class="bi ms-auto d-none"><use href="#check2"></use></svg>
                </button>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>


    
  <div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout">
    <aside class="bd-sidebar">
      <div class="offcanvas-lg offcanvas-start" tabindex="-1" id="bdSidebar" aria-labelledby="bdSidebarOffcanvasLabel">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title" id="bdSidebarOffcanvasLabel">Browse docs</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdSidebar"></button>
        </div>

        <div class="offcanvas-body">
          <nav class="bd-links w-100" id="bd-docs-nav" aria-label="Docs navigation"><ul class="bd-links-nav list-unstyled mb-0 pb-3 pb-md-2 pe-lg-2">
      <li class="bd-links-group py-2">
        <strong class="bd-links-heading d-flex w-100 align-items-center fw-semibold">
            <svg class="bi me-2" style="color: var(--bs-indigo);" aria-hidden="true"><use xlink:href="#book-half"></use></svg>
          Getting started
        </strong>

        <ul class="list-unstyled fw-normal pb-2 small">
            <li><a href="/docs/5.3/getting-started/introduction/" class="bd-links-link d-inline-block rounded">Introduction</a></li>
            <li><a href="/docs/5.3/getting-started/download/" class="bd-links-link d-inline-block rounded">Download</a></li>
            <li><a href="/docs/5.3/getting-started/contents/" class="bd-links-link d-inline-block rounded">Contents</a></li>
            <li><a href="/docs/5.3/getting-started/browsers-devices/" class="bd-links-link d-inline-block rounded">Browsers &amp; devices</a></li>
            <li><a href="/docs/5.3/getting-started/javascript/" class="bd-links-link d-inline-block rounded">JavaScript</a></li>
            <li><a href="/docs/5.3/getting-started/webpack/" class="bd-links-link d-inline-block rounded">Webpack</a></li>
            <li><a href="/docs/5.3/getting-started/parcel/" class="bd-links-link d-inline-block rounded">Parcel</a></li>
            <li><a href="/docs/5.3/getting-started/vite/" class="bd-links-link d-inline-block rounded">Vite</a></li>
            <li><a href="/docs/5.3/getting-started/accessibility/" class="bd-links-link d-inline-block rounded">Accessibility</a></li>
            <li><a href="/docs/5.3/getting-started/rfs/" class="bd-links-link d-inline-block rounded">RFS</a></li>
            <li><a href="/docs/5.3/getting-started/rtl/" class="bd-links-link d-inline-block rounded">RTL</a></li>
            <li><a href="/docs/5.3/getting-started/contribute/" class="bd-links-link d-inline-block rounded">Contribute</a></li>
        </ul>
      </li>
      <li class="bd-links-group py-2">
        <strong class="bd-links-heading d-flex w-100 align-items-center fw-semibold">
            <svg class="bi me-2" style="color: var(--bs-pink);" aria-hidden="true"><use xlink:href="#palette2"></use></svg>
          Customize
        </strong>

        <ul class="list-unstyled fw-normal pb-2 small">
            <li><a href="/docs/5.3/customize/overview/" class="bd-links-link d-inline-block rounded">Overview</a></li>
            <li><a href="/docs/5.3/customize/sass/" class="bd-links-link d-inline-block rounded">Sass</a></li>
            <li><a href="/docs/5.3/customize/options/" class="bd-links-link d-inline-block rounded">Options</a></li>
            <li><a href="/docs/5.3/customize/color/" class="bd-links-link d-inline-block rounded">Color</a></li>
            <li><a href="/docs/5.3/customize/color-modes/" class="bd-links-link d-inline-block rounded">Color modes</a></li>
            <li><a href="/docs/5.3/customize/components/" class="bd-links-link d-inline-block rounded">Components</a></li>
            <li><a href="/docs/5.3/customize/css-variables/" class="bd-links-link d-inline-block rounded">CSS variables</a></li>
            <li><a href="/docs/5.3/customize/optimize/" class="bd-links-link d-inline-block rounded">Optimize</a></li>
        </ul>
      </li>
      <li class="bd-links-group py-2">
        <strong class="bd-links-heading d-flex w-100 align-items-center fw-semibold">
            <svg class="bi me-2" style="color: var(--bs-teal);" aria-hidden="true"><use xlink:href="#grid-fill"></use></svg>
          Layout
        </strong>

        <ul class="list-unstyled fw-normal pb-2 small">
            <li><a href="/docs/5.3/layout/breakpoints/" class="bd-links-link d-inline-block rounded">Breakpoints</a></li>
            <li><a href="/docs/5.3/layout/containers/" class="bd-links-link d-inline-block rounded">Containers</a></li>
            <li><a href="/docs/5.3/layout/grid/" class="bd-links-link d-inline-block rounded">Grid</a></li>
            <li><a href="/docs/5.3/layout/columns/" class="bd-links-link d-inline-block rounded">Columns</a></li>
            <li><a href="/docs/5.3/layout/gutters/" class="bd-links-link d-inline-block rounded">Gutters</a></li>
            <li><a href="/docs/5.3/layout/utilities/" class="bd-links-link d-inline-block rounded">Utilities</a></li>
            <li><a href="/docs/5.3/layout/z-index/" class="bd-links-link d-inline-block rounded">Z-index</a></li>
            <li><a href="/docs/5.3/layout/css-grid/" class="bd-links-link d-inline-block rounded">CSS Grid</a></li>
        </ul>
      </li>
      <li class="bd-links-group py-2">
        <strong class="bd-links-heading d-flex w-100 align-items-center fw-semibold">
            <svg class="bi me-2" style="color: var(--bs-gray);" aria-hidden="true"><use xlink:href="#file-earmark-richtext"></use></svg>
          Content
        </strong>

        <ul class="list-unstyled fw-normal pb-2 small">
            <li><a href="/docs/5.3/content/reboot/" class="bd-links-link d-inline-block rounded">Reboot</a></li>
            <li><a href="/docs/5.3/content/typography/" class="bd-links-link d-inline-block rounded">Typography</a></li>
            <li><a href="/docs/5.3/content/images/" class="bd-links-link d-inline-block rounded">Images</a></li>
            <li><a href="/docs/5.3/content/tables/" class="bd-links-link d-inline-block rounded">Tables</a></li>
            <li><a href="/docs/5.3/content/figures/" class="bd-links-link d-inline-block rounded">Figures</a></li>
        </ul>
      </li>
      <li class="bd-links-group py-2">
        <strong class="bd-links-heading d-flex w-100 align-items-center fw-semibold">
            <svg class="bi me-2" style="color: var(--bs-blue);" aria-hidden="true"><use xlink:href="#ui-radios"></use></svg>
          Forms
        </strong>

        <ul class="list-unstyled fw-normal pb-2 small">
            <li><a href="/docs/5.3/forms/overview/" class="bd-links-link d-inline-block rounded">Overview</a></li>
            <li><a href="/docs/5.3/forms/form-control/" class="bd-links-link d-inline-block rounded">Form control</a></li>
            <li><a href="/docs/5.3/forms/select/" class="bd-links-link d-inline-block rounded">Select</a></li>
            <li><a href="/docs/5.3/forms/checks-radios/" class="bd-links-link d-inline-block rounded">Checks &amp; radios</a></li>
            <li><a href="/docs/5.3/forms/range/" class="bd-links-link d-inline-block rounded">Range</a></li>
            <li><a href="/docs/5.3/forms/input-group/" class="bd-links-link d-inline-block rounded">Input group</a></li>
            <li><a href="/docs/5.3/forms/floating-labels/" class="bd-links-link d-inline-block rounded">Floating labels</a></li>
            <li><a href="/docs/5.3/forms/layout/" class="bd-links-link d-inline-block rounded">Layout</a></li>
            <li><a href="/docs/5.3/forms/validation/" class="bd-links-link d-inline-block rounded">Validation</a></li>
        </ul>
      </li>
      <li class="bd-links-group py-2">
        <strong class="bd-links-heading d-flex w-100 align-items-center fw-semibold">
            <svg class="bi me-2" style="color: var(--bs-cyan);" aria-hidden="true"><use xlink:href="#menu-button-wide-fill"></use></svg>
          Components
        </strong>

        <ul class="list-unstyled fw-normal pb-2 small">
            <li><a href="/docs/5.3/components/accordion/" class="bd-links-link d-inline-block rounded">Accordion</a></li>
            <li><a href="/docs/5.3/components/alerts/" class="bd-links-link d-inline-block rounded">Alerts</a></li>
            <li><a href="/docs/5.3/components/badge/" class="bd-links-link d-inline-block rounded">Badge</a></li>
            <li><a href="/docs/5.3/components/breadcrumb/" class="bd-links-link d-inline-block rounded">Breadcrumb</a></li>
            <li><a href="/docs/5.3/components/buttons/" class="bd-links-link d-inline-block rounded">Buttons</a></li>
            <li><a href="/docs/5.3/components/button-group/" class="bd-links-link d-inline-block rounded">Button group</a></li>
            <li><a href="/docs/5.3/components/card/" class="bd-links-link d-inline-block rounded">Card</a></li>
            <li><a href="/docs/5.3/components/carousel/" class="bd-links-link d-inline-block rounded">Carousel</a></li>
            <li><a href="/docs/5.3/components/close-button/" class="bd-links-link d-inline-block rounded">Close button</a></li>
            <li><a href="/docs/5.3/components/collapse/" class="bd-links-link d-inline-block rounded">Collapse</a></li>
            <li><a href="/docs/5.3/components/dropdowns/" class="bd-links-link d-inline-block rounded">Dropdowns</a></li>
            <li><a href="/docs/5.3/components/list-group/" class="bd-links-link d-inline-block rounded">List group</a></li>
            <li><a href="/docs/5.3/components/modal/" class="bd-links-link d-inline-block rounded">Modal</a></li>
            <li><a href="/docs/5.3/components/navbar/" class="bd-links-link d-inline-block rounded active" aria-current="page">Navbar</a></li>
            <li><a href="/docs/5.3/components/navs-tabs/" class="bd-links-link d-inline-block rounded">Navs &amp; tabs</a></li>
            <li><a href="/docs/5.3/components/offcanvas/" class="bd-links-link d-inline-block rounded">Offcanvas</a></li>
            <li><a href="/docs/5.3/components/pagination/" class="bd-links-link d-inline-block rounded">Pagination</a></li>
            <li><a href="/docs/5.3/components/placeholders/" class="bd-links-link d-inline-block rounded">Placeholders</a></li>
            <li><a href="/docs/5.3/components/popovers/" class="bd-links-link d-inline-block rounded">Popovers</a></li>
            <li><a href="/docs/5.3/components/progress/" class="bd-links-link d-inline-block rounded">Progress</a></li>
            <li><a href="/docs/5.3/components/scrollspy/" class="bd-links-link d-inline-block rounded">Scrollspy</a></li>
            <li><a href="/docs/5.3/components/spinners/" class="bd-links-link d-inline-block rounded">Spinners</a></li>
            <li><a href="/docs/5.3/components/toasts/" class="bd-links-link d-inline-block rounded">Toasts</a></li>
            <li><a href="/docs/5.3/components/tooltips/" class="bd-links-link d-inline-block rounded">Tooltips</a></li>
        </ul>
      </li>
      <li class="bd-links-group py-2">
        <strong class="bd-links-heading d-flex w-100 align-items-center fw-semibold">
            <svg class="bi me-2" style="color: var(--bs-orange);" aria-hidden="true"><use xlink:href="#magic"></use></svg>
          Helpers
        </strong>

        <ul class="list-unstyled fw-normal pb-2 small">
            <li><a href="/docs/5.3/helpers/clearfix/" class="bd-links-link d-inline-block rounded">Clearfix</a></li>
            <li><a href="/docs/5.3/helpers/color-background/" class="bd-links-link d-inline-block rounded">Color &amp; background</a></li>
            <li><a href="/docs/5.3/helpers/colored-links/" class="bd-links-link d-inline-block rounded">Colored links</a></li>
            <li><a href="/docs/5.3/helpers/focus-ring/" class="bd-links-link d-inline-block rounded">Focus ring</a></li>
            <li><a href="/docs/5.3/helpers/icon-link/" class="bd-links-link d-inline-block rounded">Icon link</a></li>
            <li><a href="/docs/5.3/helpers/position/" class="bd-links-link d-inline-block rounded">Position</a></li>
            <li><a href="/docs/5.3/helpers/ratio/" class="bd-links-link d-inline-block rounded">Ratio</a></li>
            <li><a href="/docs/5.3/helpers/stacks/" class="bd-links-link d-inline-block rounded">Stacks</a></li>
            <li><a href="/docs/5.3/helpers/stretched-link/" class="bd-links-link d-inline-block rounded">Stretched link</a></li>
            <li><a href="/docs/5.3/helpers/text-truncation/" class="bd-links-link d-inline-block rounded">Text truncation</a></li>
            <li><a href="/docs/5.3/helpers/vertical-rule/" class="bd-links-link d-inline-block rounded">Vertical rule</a></li>
            <li><a href="/docs/5.3/helpers/visually-hidden/" class="bd-links-link d-inline-block rounded">Visually hidden</a></li>
        </ul>
      </li>
      <li class="bd-links-group py-2">
        <strong class="bd-links-heading d-flex w-100 align-items-center fw-semibold">
            <svg class="bi me-2" style="color: var(--bs-red);" aria-hidden="true"><use xlink:href="#braces-asterisk"></use></svg>
          Utilities
        </strong>

        <ul class="list-unstyled fw-normal pb-2 small">
            <li><a href="/docs/5.3/utilities/api/" class="bd-links-link d-inline-block rounded">API</a></li>
            <li><a href="/docs/5.3/utilities/background/" class="bd-links-link d-inline-block rounded">Background</a></li>
            <li><a href="/docs/5.3/utilities/borders/" class="bd-links-link d-inline-block rounded">Borders</a></li>
            <li><a href="/docs/5.3/utilities/colors/" class="bd-links-link d-inline-block rounded">Colors</a></li>
            <li><a href="/docs/5.3/utilities/display/" class="bd-links-link d-inline-block rounded">Display</a></li>
            <li><a href="/docs/5.3/utilities/flex/" class="bd-links-link d-inline-block rounded">Flex</a></li>
            <li><a href="/docs/5.3/utilities/float/" class="bd-links-link d-inline-block rounded">Float</a></li>
            <li><a href="/docs/5.3/utilities/interactions/" class="bd-links-link d-inline-block rounded">Interactions</a></li>
            <li><a href="/docs/5.3/utilities/link/" class="bd-links-link d-inline-block rounded">Link</a></li>
            <li><a href="/docs/5.3/utilities/object-fit/" class="bd-links-link d-inline-block rounded">Object fit</a></li>
            <li><a href="/docs/5.3/utilities/opacity/" class="bd-links-link d-inline-block rounded">Opacity</a></li>
            <li><a href="/docs/5.3/utilities/overflow/" class="bd-links-link d-inline-block rounded">Overflow</a></li>
            <li><a href="/docs/5.3/utilities/position/" class="bd-links-link d-inline-block rounded">Position</a></li>
            <li><a href="/docs/5.3/utilities/shadows/" class="bd-links-link d-inline-block rounded">Shadows</a></li>
            <li><a href="/docs/5.3/utilities/sizing/" class="bd-links-link d-inline-block rounded">Sizing</a></li>
            <li><a href="/docs/5.3/utilities/spacing/" class="bd-links-link d-inline-block rounded">Spacing</a></li>
            <li><a href="/docs/5.3/utilities/text/" class="bd-links-link d-inline-block rounded">Text</a></li>
            <li><a href="/docs/5.3/utilities/vertical-align/" class="bd-links-link d-inline-block rounded">Vertical align</a></li>
            <li><a href="/docs/5.3/utilities/visibility/" class="bd-links-link d-inline-block rounded">Visibility</a></li>
            <li><a href="/docs/5.3/utilities/z-index/" class="bd-links-link d-inline-block rounded">Z-index</a></li>
        </ul>
      </li>
      <li class="bd-links-group py-2">
        <strong class="bd-links-heading d-flex w-100 align-items-center fw-semibold">
            <svg class="bi me-2" style="color: var(--bs-blue);" aria-hidden="true"><use xlink:href="#tools"></use></svg>
          Extend
        </strong>

        <ul class="list-unstyled fw-normal pb-2 small">
            <li><a href="/docs/5.3/extend/approach/" class="bd-links-link d-inline-block rounded">Approach</a></li>
            <li><a href="/docs/5.3/extend/icons/" class="bd-links-link d-inline-block rounded">Icons</a></li>
        </ul>
      </li>
      <li class="bd-links-group py-2">
        <strong class="bd-links-heading d-flex w-100 align-items-center fw-semibold">
            <svg class="bi me-2" style="color: var(--bs-indigo);" aria-hidden="true"><use xlink:href="#globe2"></use></svg>
          About
        </strong>

        <ul class="list-unstyled fw-normal pb-2 small">
            <li><a href="/docs/5.3/about/overview/" class="bd-links-link d-inline-block rounded">Overview</a></li>
            <li><a href="/docs/5.3/about/team/" class="bd-links-link d-inline-block rounded">Team</a></li>
            <li><a href="/docs/5.3/about/brand/" class="bd-links-link d-inline-block rounded">Brand</a></li>
            <li><a href="/docs/5.3/about/license/" class="bd-links-link d-inline-block rounded">License</a></li>
            <li><a href="/docs/5.3/about/translations/" class="bd-links-link d-inline-block rounded">Translations</a></li>
        </ul>
      </li>
      <li class="bd-links-span-all mt-1 mb-3 mx-4 border-top"></li>
      <li class="bd-links-span-all">
        <a href="/docs/5.3/migration/" class="bd-links-link d-inline-block rounded small ">
          Migration
        </a>
      </li>
  </ul>
</nav>

        </div>
      </div>
    </aside>

    <main class="bd-main order-1">
      <div class="bd-intro pt-2 ps-lg-2">
        <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
          <div class="mb-3 mb-md-0 d-flex text-nowrap"><a class="btn btn-sm btn-bd-light rounded-2" href="https://github.com/twbs/bootstrap/blob/v5.3.1/site/content/docs/5.3/components/navbar.md" title="View and edit this file on GitHub" target="_blank" rel="noopener">
              View on GitHub
            </a>
          </div>
          <h1 class="bd-title mb-0" id="content">Navbar</h1>
        </div>
        <p class="bd-lead">Documentation and examples for Bootstrap&rsquo;s powerful, responsive navigation header, the navbar. Includes support for branding, navigation, and more, including support for our collapse plugin.</p>
        <script async src="https://cdn.carbonads.com/carbon.js?serve=CKYIKKJL&placement=getbootstrapcom" id="_carbonads_js"></script>

      </div>

      
        <div class="bd-toc mt-3 mb-5 my-lg-0 mb-lg-5 px-sm-1 text-body-secondary">
          <button class="btn btn-link p-md-0 mb-2 mb-md-0 text-decoration-none bd-toc-toggle d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#tocContents" aria-expanded="false" aria-controls="tocContents">
            On this page
            <svg class="bi d-md-none ms-2" aria-hidden="true"><use xlink:href="#chevron-expand"></use></svg>
          </button>
          <strong class="d-none d-md-block h6 my-2 ms-3">On this page</strong>
          <hr class="d-none d-md-block my-2 ms-3">
          <div class="collapse bd-toc-collapse" id="tocContents">
            <nav id="TableOfContents">
  <ul>
    <li><a href="#how-it-works">How it works</a></li>
    <li><a href="#supported-content">Supported content</a>
      <ul>
        <li><a href="#brand">Brand</a>
          <ul>
            <li><a href="#text">Text</a></li>
            <li><a href="#image">Image</a></li>
            <li><a href="#image-and-text">Image and text</a></li>
          </ul>
        </li>
        <li><a href="#nav">Nav</a></li>
        <li><a href="#forms">Forms</a></li>
        <li><a href="#text-1">Text</a></li>
      </ul>
    </li>
    <li><a href="#color-schemes">Color schemes</a></li>
    <li><a href="#containers">Containers</a></li>
    <li><a href="#placement">Placement</a></li>
    <li><a href="#scrolling">Scrolling</a></li>
    <li><a href="#responsive-behaviors">Responsive behaviors</a>
      <ul>
        <li><a href="#toggler">Toggler</a></li>
        <li><a href="#external-content">External content</a></li>
        <li><a href="#offcanvas">Offcanvas</a></li>
      </ul>
    </li>
    <li><a href="#css">CSS</a>
      <ul>
        <li><a href="#variables">Variables</a></li>
        <li><a href="#sass-variables">Sass variables</a></li>
        <li><a href="#sass-loops">Sass loops</a></li>
      </ul>
    </li>
  </ul>
</nav>
          </div>
        </div>
      

      <div class="bd-content ps-lg-2">
        

        <h2 id="how-it-works">How it works <a class="anchor-link" href="#how-it-works" aria-label="Link to this section: How it works"></a></h2>
<p>Here&rsquo;s what you need to know before getting started with the navbar:</p>
<ul>
<li>Navbars require a wrapping <code>.navbar</code> with <code>.navbar-expand{-sm|-md|-lg|-xl|-xxl}</code> for responsive collapsing and <a href="#color-schemes">color scheme</a> classes.</li>
<li>Navbars and their contents are fluid by default. Change the <a href="#containers">container</a> to limit their horizontal width in different ways.</li>
<li>Use our <a href="/docs/5.3/utilities/spacing/">spacing</a> and <a href="/docs/5.3/utilities/flex/">flex</a> utility classes for controlling spacing and alignment within navbars.</li>
<li>Navbars are responsive by default, but you can easily modify them to change that. Responsive behavior depends on our Collapse JavaScript plugin.</li>
<li>Ensure accessibility by using a <code>&lt;nav&gt;</code> element or, if using a more generic element such as a <code>&lt;div&gt;</code>, add a <code>role=&quot;navigation&quot;</code> to every navbar to explicitly identify it as a landmark region for users of assistive technologies.</li>
<li>Indicate the current item by using <code>aria-current=&quot;page&quot;</code> for the current page or <code>aria-current=&quot;true&quot;</code> for the current item in a set.</li>
<li><strong>New in v5.2.0:</strong> Navbars can be themed with CSS variables that are scoped to the <code>.navbar</code> base class. <code>.navbar-light</code> has been deprecated and <code>.navbar-dark</code> has been rewritten to override CSS variables instead of adding additional styles.</li>
</ul>
<div class="bd-callout bd-callout-info">
The animation effect of this component is dependent on the <code>prefers-reduced-motion</code> media query. See the <a href="/docs/5.3/getting-started/accessibility/#reduced-motion">reduced motion section of our accessibility documentation</a>.
</div>

<h2 id="supported-content">Supported content <a class="anchor-link" href="#supported-content" aria-label="Link to this section: Supported content"></a></h2>
<p>Navbars come with built-in support for a handful of sub-components. Choose from the following as needed:</p>
<ul>
<li><code>.navbar-brand</code> for your company, product, or project name.</li>
<li><code>.navbar-nav</code> for a full-height and lightweight navigation (including support for dropdowns).</li>
<li><code>.navbar-toggler</code> for use with our collapse plugin and other <a href="#responsive-behaviors">navigation toggling</a> behaviors.</li>
<li>Flex and spacing utilities for any form controls and actions.</li>
<li><code>.navbar-text</code> for adding vertically centered strings of text.</li>
<li><code>.collapse.navbar-collapse</code> for grouping and hiding navbar contents by a parent breakpoint.</li>
<li>Add an optional <code>.navbar-scroll</code> to set a <code>max-height</code> and <a href="#scrolling">scroll expanded navbar content</a>.</li>
</ul>
<p>Here&rsquo;s an example of all the sub-components included in a responsive light-themed navbar that automatically collapses at the <code>lg</code> (large) breakpoint.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-expand-lg bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;collapse&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#navbarSupportedContent&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;navbarSupportedContent&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;collapse navbar-collapse&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;navbarSupportedContent&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-nav me-auto mb-2 mb-lg-0&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link active&#34;</span> <span class="na">aria-current</span><span class="o">=</span><span class="s">&#34;page&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Home<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Link<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item dropdown&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link dropdown-toggle&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;dropdown&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            Dropdown
</span></span><span class="line"><span class="cl">          <span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-menu&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Action<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Another action<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">hr</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-divider&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Something else here<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link disabled&#34;</span> <span class="na">aria-disabled</span><span class="o">=</span><span class="s">&#34;true&#34;</span><span class="p">&gt;</span>Disabled<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">form</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;d-flex&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">input</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;form-control me-2&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;search&#34;</span> <span class="na">placeholder</span><span class="o">=</span><span class="s">&#34;Search&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn btn-outline-success&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;submit&#34;</span><span class="p">&gt;</span>Search<span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">form</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<p>This example uses <a href="/docs/5.3/utilities/background/">background</a> (<code>bg-body-tertiary</code>) and <a href="/docs/5.3/utilities/spacing/">spacing</a> (<code>me-auto</code>, <code>mb-2</code>, <code>mb-lg-0</code>, <code>me-2</code>) utility classes.</p>
<h3 id="brand">Brand <a class="anchor-link" href="#brand" aria-label="Link to this section: Brand"></a></h3>
<p>The <code>.navbar-brand</code> can be applied to most elements, but an anchor works best, as some elements might require utility classes or custom styles.</p>
<h4 id="text">Text <a class="anchor-link" href="#text" aria-label="Link to this section: Text"></a></h4>
<p>Add your text within an element with the <code>.navbar-brand</code> class.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<!-- As a link -->
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
  </div>
</nav>

<!-- As a heading -->
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Navbar</span>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="c">&lt;!-- As a link --&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl"><span class="c">&lt;!-- As a heading --&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand mb-0 h1&#34;</span><span class="p">&gt;</span>Navbar<span class="p">&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h4 id="image">Image <a class="anchor-link" href="#image" aria-label="Link to this section: Image"></a></h4>
<p>You can replace the text within the <code>.navbar-brand</code> with an <code>&lt;img&gt;</code>.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
    </a>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">img</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;/docs/5.3/assets/brand/bootstrap-logo.svg&#34;</span> <span class="na">alt</span><span class="o">=</span><span class="s">&#34;Bootstrap&#34;</span> <span class="na">width</span><span class="o">=</span><span class="s">&#34;30&#34;</span> <span class="na">height</span><span class="o">=</span><span class="s">&#34;24&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h4 id="image-and-text">Image and text <a class="anchor-link" href="#image-and-text" aria-label="Link to this section: Image and text"></a></h4>
<p>You can also make use of some additional utilities to add an image and text at the same time. Note the addition of <code>.d-inline-block</code> and <code>.align-text-top</code> on the <code>&lt;img&gt;</code>.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      Bootstrap
    </a>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">img</span> <span class="na">src</span><span class="o">=</span><span class="s">&#34;/docs/5.3/assets/brand/bootstrap-logo.svg&#34;</span> <span class="na">alt</span><span class="o">=</span><span class="s">&#34;Logo&#34;</span> <span class="na">width</span><span class="o">=</span><span class="s">&#34;30&#34;</span> <span class="na">height</span><span class="o">=</span><span class="s">&#34;24&#34;</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;d-inline-block align-text-top&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      Bootstrap
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h3 id="nav">Nav <a class="anchor-link" href="#nav" aria-label="Link to this section: Nav"></a></h3>
<p>Navbar navigation links build on our <code>.nav</code> options with their own modifier class and require the use of <a href="#toggler">toggler classes</a> for proper responsive styling. <strong>Navigation in navbars will also grow to occupy as much horizontal space as possible</strong> to keep your navbar contents securely aligned.</p>
<p>Add the <code>.active</code> class on <code>.nav-link</code> to indicate the current page.</p>
<p>Please note that you should also add the <code>aria-current</code> attribute on the active <code>.nav-link</code>.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-expand-lg bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;collapse&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#navbarNav&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;navbarNav&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;collapse navbar-collapse&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;navbarNav&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-nav&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link active&#34;</span> <span class="na">aria-current</span><span class="o">=</span><span class="s">&#34;page&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Home<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Features<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Pricing<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link disabled&#34;</span> <span class="na">aria-disabled</span><span class="o">=</span><span class="s">&#34;true&#34;</span><span class="p">&gt;</span>Disabled<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<p>And because we use classes for our navs, you can avoid the list-based approach entirely if you like.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Pricing</a>
        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
      </div>
    </div>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-expand-lg bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;collapse&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#navbarNavAltMarkup&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;navbarNavAltMarkup&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;collapse navbar-collapse&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;navbarNavAltMarkup&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-nav&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link active&#34;</span> <span class="na">aria-current</span><span class="o">=</span><span class="s">&#34;page&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Home<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Features<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Pricing<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link disabled&#34;</span> <span class="na">aria-disabled</span><span class="o">=</span><span class="s">&#34;true&#34;</span><span class="p">&gt;</span>Disabled<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<p>You can also use dropdowns in your navbar. Dropdown menus require a wrapping element for positioning, so be sure to use separate and nested elements for <code>.nav-item</code> and <code>.nav-link</code> as shown below.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-expand-lg bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;collapse&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#navbarNavDropdown&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;navbarNavDropdown&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;collapse navbar-collapse&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;navbarNavDropdown&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-nav&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link active&#34;</span> <span class="na">aria-current</span><span class="o">=</span><span class="s">&#34;page&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Home<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Features<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Pricing<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item dropdown&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link dropdown-toggle&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;dropdown&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            Dropdown link
</span></span><span class="line"><span class="cl">          <span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-menu&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Action<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Another action<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Something else here<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h3 id="forms">Forms <a class="anchor-link" href="#forms" aria-label="Link to this section: Forms"></a></h3>
<p>Place various form controls and components within a navbar:</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">form</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;d-flex&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">input</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;form-control me-2&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;search&#34;</span> <span class="na">placeholder</span><span class="o">=</span><span class="s">&#34;Search&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn btn-outline-success&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;submit&#34;</span><span class="p">&gt;</span>Search<span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">form</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<p>Immediate child elements of <code>.navbar</code> use flex layout and will default to <code>justify-content: space-between</code>. Use additional <a href="/docs/5.3/utilities/flex/">flex utilities</a> as needed to adjust this behavior.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Navbar</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span><span class="p">&gt;</span>Navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">form</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;d-flex&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">input</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;form-control me-2&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;search&#34;</span> <span class="na">placeholder</span><span class="o">=</span><span class="s">&#34;Search&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn btn-outline-success&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;submit&#34;</span><span class="p">&gt;</span>Search<span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">form</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<p>Input groups work, too. If your navbar is an entire form, or mostly a form, you can use the <code>&lt;form&gt;</code> element as the container and save some HTML.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar bg-body-tertiary">
  <form class="container-fluid">
    <div class="input-group">
      <span class="input-group-text" id="basic-addon1">@</span>
      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>
  </form>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">form</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;input-group&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;input-group-text&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;basic-addon1&#34;</span><span class="p">&gt;</span>@<span class="p">&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">input</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;text&#34;</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;form-control&#34;</span> <span class="na">placeholder</span><span class="o">=</span><span class="s">&#34;Username&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Username&#34;</span> <span class="na">aria-describedby</span><span class="o">=</span><span class="s">&#34;basic-addon1&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">form</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<p>Various buttons are supported as part of these navbar forms, too. This is also a great reminder that vertical alignment utilities can be used to align different sized elements.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar bg-body-tertiary">
  <form class="container-fluid justify-content-start">
    <button class="btn btn-outline-success me-2" type="button">Main button</button>
    <button class="btn btn-sm btn-outline-secondary" type="button">Smaller button</button>
  </form>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">form</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid justify-content-start&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn btn-outline-success me-2&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span><span class="p">&gt;</span>Main button<span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn btn-sm btn-outline-secondary&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span><span class="p">&gt;</span>Smaller button<span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">form</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h3 id="text-1">Text <a class="anchor-link" href="#text-1" aria-label="Link to this section: Text"></a></h3>
<p>Navbars may contain bits of text with the help of <code>.navbar-text</code>. This class adjusts vertical alignment and horizontal spacing for strings of text.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-text">
      Navbar text with an inline element
    </span>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-text&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      Navbar text with an inline element
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<p>Mix and match with other components and utilities as needed.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar w/ text</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>
      <span class="navbar-text">
        Navbar text with an inline element
      </span>
    </div>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-expand-lg bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Navbar w/ text<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;collapse&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#navbarText&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;navbarText&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;collapse navbar-collapse&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;navbarText&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-nav me-auto mb-2 mb-lg-0&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link active&#34;</span> <span class="na">aria-current</span><span class="o">=</span><span class="s">&#34;page&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Home<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Features<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Pricing<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-text&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        Navbar text with an inline element
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h2 id="color-schemes">Color schemes <a class="anchor-link" href="#color-schemes" aria-label="Link to this section: Color schemes"></a></h2>
<div class="bd-callout bd-callout-warning">
<p><strong>New dark navbars in v5.3.0 —</strong> We&rsquo;ve deprecated <code>.navbar-dark</code> in favor of the new <code>data-bs-theme=&quot;dark&quot;</code>. Add <code>data-bs-theme=&quot;dark&quot;</code> to the <code>.navbar</code> to enable a component-specific color mode. <a href="/docs/5.3/customize/color-modes/">Learn more about our color modes.</a></p>
<hr>
<p><strong>New in v5.2.0  —</strong> Navbar theming is now powered by CSS variables and <code>.navbar-light</code> has been deprecated. CSS variables are applied to <code>.navbar</code>, defaulting to the &ldquo;light&rdquo; appearance, and can be overridden with <code>.navbar-dark</code>.</p>

</div>

<p>Navbar themes are easier than ever thanks to Bootstrap&rsquo;s combination of Sass and CSS variables. The default is our &ldquo;light navbar&rdquo; for use with light background colors, but you can also apply <code>data-bs-theme=&quot;dark&quot;</code> to the <code>.navbar</code> parent for dark background colors. Then, customize with <code>.bg-*</code> and additional utilities.</p>
<div class="bd-example">
  <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;" data-bs-theme="light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</div>
<div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-dark border-bottom border-body&#34;</span> <span class="na">data-bs-theme</span><span class="o">=</span><span class="s">&#34;dark&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="c">&lt;!-- Navbar content --&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-primary&#34;</span> <span class="na">data-bs-theme</span><span class="o">=</span><span class="s">&#34;dark&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="c">&lt;!-- Navbar content --&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar&#34;</span> <span class="na">style</span><span class="o">=</span><span class="s">&#34;background-color: #e3f2fd;&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="c">&lt;!-- Navbar content --&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span>
</span></span></code></pre></div><h2 id="containers">Containers <a class="anchor-link" href="#containers" aria-label="Link to this section: Containers"></a></h2>
<p>Although it&rsquo;s not required, you can wrap a navbar in a <code>.container</code> to center it on a page–though note that an inner container is still required. Or you can add a container inside the <code>.navbar</code> to only center the contents of a <a href="#placement">fixed or static top navbar</a>.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<div class="container">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
    </div>
  </nav>
</div>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-expand-lg bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<p>Use any of the responsive containers to change how wide the content in your navbar is presented.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-md">
    <a class="navbar-brand" href="#">Navbar</a>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-expand-lg bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-md&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h2 id="placement">Placement <a class="anchor-link" href="#placement" aria-label="Link to this section: Placement"></a></h2>
<p>Use our <a href="/docs/5.3/utilities/position/">position utilities</a> to place navbars in non-static positions. Choose from fixed to the top, fixed to the bottom, stickied to the top (scrolls with the page until it reaches the top, then stays there), or stickied to the bottom (scrolls with the page until it reaches the bottom, then stays there).</p>
<p>Fixed navbars use <code>position: fixed</code>, meaning they&rsquo;re pulled from the normal flow of the DOM and may require custom CSS (e.g., <code>padding-top</code> on the <code>&lt;body&gt;</code>) to prevent overlap with other elements.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Default</a>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Default<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar fixed-top bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Fixed top</a>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar fixed-top bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Fixed top<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar fixed-bottom bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Fixed bottom</a>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar fixed-bottom bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Fixed bottom<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar sticky-top bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sticky top</a>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar sticky-top bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Sticky top<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar sticky-bottom bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sticky bottom</a>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar sticky-bottom bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Sticky bottom<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h2 id="scrolling">Scrolling <a class="anchor-link" href="#scrolling" aria-label="Link to this section: Scrolling"></a></h2>
<p>Add <code>.navbar-nav-scroll</code> to a <code>.navbar-nav</code> (or other navbar sub-component) to enable vertical scrolling within the toggleable contents of a collapsed navbar. By default, scrolling kicks in at <code>75vh</code> (or 75% of the viewport height), but you can override that with the local CSS custom property <code>--bs-navbar-height</code> or custom styles. At larger viewports when the navbar is expanded, content will appear as it does in a default navbar.</p>
<p>Please note that this behavior comes with a potential drawback of <code>overflow</code>—when setting <code>overflow-y: auto</code> (required to scroll the content here), <code>overflow-x</code> is the equivalent of <code>auto</code>, which will crop some horizontal content.</p>
<p>Here&rsquo;s an example navbar using <code>.navbar-nav-scroll</code> with <code>style=&quot;--bs-scroll-height: 100px;&quot;</code>, with some extra margin utilities for optimum spacing.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar scroll</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Link</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-expand-lg bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Navbar scroll<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;collapse&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#navbarScroll&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;navbarScroll&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;collapse navbar-collapse&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;navbarScroll&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll&#34;</span> <span class="na">style</span><span class="o">=</span><span class="s">&#34;--bs-scroll-height: 100px;&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link active&#34;</span> <span class="na">aria-current</span><span class="o">=</span><span class="s">&#34;page&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Home<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Link<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item dropdown&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link dropdown-toggle&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;dropdown&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            Link
</span></span><span class="line"><span class="cl">          <span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-menu&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Action<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Another action<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">hr</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-divider&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Something else here<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link disabled&#34;</span> <span class="na">aria-disabled</span><span class="o">=</span><span class="s">&#34;true&#34;</span><span class="p">&gt;</span>Link<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">form</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;d-flex&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">input</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;form-control me-2&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;search&#34;</span> <span class="na">placeholder</span><span class="o">=</span><span class="s">&#34;Search&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn btn-outline-success&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;submit&#34;</span><span class="p">&gt;</span>Search<span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">form</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h2 id="responsive-behaviors">Responsive behaviors <a class="anchor-link" href="#responsive-behaviors" aria-label="Link to this section: Responsive behaviors"></a></h2>
<p>Navbars can use <code>.navbar-toggler</code>, <code>.navbar-collapse</code>, and <code>.navbar-expand{-sm|-md|-lg|-xl|-xxl}</code> classes to determine when their content collapses behind a button. In combination with other utilities, you can easily choose when to show or hide particular elements.</p>
<p>For navbars that never collapse, add the <code>.navbar-expand</code> class on the navbar. For navbars that always collapse, don&rsquo;t add any <code>.navbar-expand</code> class.</p>
<h3 id="toggler">Toggler <a class="anchor-link" href="#toggler" aria-label="Link to this section: Toggler"></a></h3>
<p>Navbar togglers are left-aligned by default, but should they follow a sibling element like a <code>.navbar-brand</code>, they&rsquo;ll automatically be aligned to the far right. Reversing your markup will reverse the placement of the toggler. Below are examples of different toggle styles.</p>
<p>With no <code>.navbar-brand</code> shown at the smallest breakpoint:</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Hidden brand</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-expand-lg bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;collapse&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#navbarTogglerDemo01&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;navbarTogglerDemo01&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;collapse navbar-collapse&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;navbarTogglerDemo01&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Hidden brand<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-nav me-auto mb-2 mb-lg-0&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link active&#34;</span> <span class="na">aria-current</span><span class="o">=</span><span class="s">&#34;page&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Home<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Link<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link disabled&#34;</span> <span class="na">aria-disabled</span><span class="o">=</span><span class="s">&#34;true&#34;</span><span class="p">&gt;</span>Disabled<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">form</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;d-flex&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">input</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;form-control me-2&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;search&#34;</span> <span class="na">placeholder</span><span class="o">=</span><span class="s">&#34;Search&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn btn-outline-success&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;submit&#34;</span><span class="p">&gt;</span>Search<span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">form</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<p>With a brand name shown on the left and toggler on the right:</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-expand-lg bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;collapse&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#navbarTogglerDemo02&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;navbarTogglerDemo02&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;collapse navbar-collapse&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;navbarTogglerDemo02&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-nav me-auto mb-2 mb-lg-0&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link active&#34;</span> <span class="na">aria-current</span><span class="o">=</span><span class="s">&#34;page&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Home<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Link<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link disabled&#34;</span> <span class="na">aria-disabled</span><span class="o">=</span><span class="s">&#34;true&#34;</span><span class="p">&gt;</span>Disabled<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">form</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;d-flex&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">input</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;form-control me-2&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;search&#34;</span> <span class="na">placeholder</span><span class="o">=</span><span class="s">&#34;Search&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn btn-outline-success&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;submit&#34;</span><span class="p">&gt;</span>Search<span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">form</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<p>With a toggler on the left and brand name on the right:</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-expand-lg bg-body-tertiary&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;collapse&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#navbarTogglerDemo03&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;navbarTogglerDemo03&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;collapse navbar-collapse&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;navbarTogglerDemo03&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-nav me-auto mb-2 mb-lg-0&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link active&#34;</span> <span class="na">aria-current</span><span class="o">=</span><span class="s">&#34;page&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Home<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Link<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link disabled&#34;</span> <span class="na">aria-disabled</span><span class="o">=</span><span class="s">&#34;true&#34;</span><span class="p">&gt;</span>Disabled<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">form</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;d-flex&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">input</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;form-control me-2&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;search&#34;</span> <span class="na">placeholder</span><span class="o">=</span><span class="s">&#34;Search&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn btn-outline-success&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;submit&#34;</span><span class="p">&gt;</span>Search<span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">form</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h3 id="external-content">External content <a class="anchor-link" href="#external-content" aria-label="Link to this section: External content"></a></h3>
<p>Sometimes you want to use the collapse plugin to trigger a container element for content that structurally sits outside of the <code>.navbar</code> . Because our plugin works on the <code>id</code> and <code>data-bs-target</code> matching, that&rsquo;s easily done!</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
  <div class="bg-dark p-4">
    <h5 class="text-body-emphasis h4">Collapsed content</h5>
    <span class="text-body-secondary">Toggleable via the navbar brand.</span>
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;collapse&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;navbarToggleExternalContent&#34;</span> <span class="na">data-bs-theme</span><span class="o">=</span><span class="s">&#34;dark&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;bg-dark p-4&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">h5</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;text-body-emphasis h4&#34;</span><span class="p">&gt;</span>Collapsed content<span class="p">&lt;/</span><span class="nt">h5</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;text-body-secondary&#34;</span><span class="p">&gt;</span>Toggleable via the navbar brand.<span class="p">&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-dark bg-dark&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;collapse&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#navbarToggleExternalContent&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;navbarToggleExternalContent&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<p>When you do this, we recommend including additional JavaScript to move the focus programmatically to the container when it is opened. Otherwise, keyboard users and users of assistive technologies will likely have a hard time finding the newly revealed content - particularly if the container that was opened comes <em>before</em> the toggler in the document&rsquo;s structure. We also recommend making sure that the toggler has the <code>aria-controls</code> attribute, pointing to the <code>id</code> of the content container. In theory, this allows assistive technology users to jump directly from the toggler to the container it controls–but support for this is currently quite patchy.</p>
<h3 id="offcanvas">Offcanvas <a class="anchor-link" href="#offcanvas" aria-label="Link to this section: Offcanvas"></a></h3>
<p>Transform your expanding and collapsing navbar into an offcanvas drawer with the <a href="/docs/5.3/components/offcanvas/">offcanvas component</a>. We extend both the offcanvas default styles and use our <code>.navbar-expand-*</code> classes to create a dynamic and flexible navigation sidebar.</p>
<p>In the example below, to create an offcanvas navbar that is always collapsed across all breakpoints, omit the <code>.navbar-expand-*</code> class entirely.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Offcanvas navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar bg-body-tertiary fixed-top&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Offcanvas navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;offcanvas&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#offcanvasNavbar&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;offcanvasNavbar&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;offcanvas offcanvas-end&#34;</span> <span class="na">tabindex</span><span class="o">=</span><span class="s">&#34;-1&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;offcanvasNavbar&#34;</span> <span class="na">aria-labelledby</span><span class="o">=</span><span class="s">&#34;offcanvasNavbarLabel&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;offcanvas-header&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">h5</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;offcanvas-title&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;offcanvasNavbarLabel&#34;</span><span class="p">&gt;</span>Offcanvas<span class="p">&lt;/</span><span class="nt">h5</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">button</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn-close&#34;</span> <span class="na">data-bs-dismiss</span><span class="o">=</span><span class="s">&#34;offcanvas&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Close&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;offcanvas-body&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-nav justify-content-end flex-grow-1 pe-3&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link active&#34;</span> <span class="na">aria-current</span><span class="o">=</span><span class="s">&#34;page&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Home<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Link<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item dropdown&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link dropdown-toggle&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;dropdown&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">              Dropdown
</span></span><span class="line"><span class="cl">            <span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-menu&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">              <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Action<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">              <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Another action<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">              <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">                <span class="p">&lt;</span><span class="nt">hr</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-divider&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">              <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">              <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Something else here<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">form</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;d-flex mt-3&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">input</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;form-control me-2&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;search&#34;</span> <span class="na">placeholder</span><span class="o">=</span><span class="s">&#34;Search&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn btn-outline-success&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;submit&#34;</span><span class="p">&gt;</span>Search<span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">form</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<p>To create an offcanvas navbar that expands into a normal navbar at a specific breakpoint like <code>lg</code>, use <code>.navbar-expand-lg</code>.</p>
<div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-expand-lg bg-body-tertiary fixed-top&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Offcanvas navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;offcanvas&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#navbarOffcanvasLg&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;navbarOffcanvasLg&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;offcanvas offcanvas-end&#34;</span> <span class="na">tabindex</span><span class="o">=</span><span class="s">&#34;-1&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;navbarOffcanvasLg&#34;</span> <span class="na">aria-labelledby</span><span class="o">=</span><span class="s">&#34;navbarOffcanvasLgLabel&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    ...
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span>
</span></span></code></pre></div><p>When using offcanvas in a dark navbar, be aware that you may need to have a dark background on the offcanvas content to avoid the text becoming illegible. In the example below, we add <code>.navbar-dark</code> and <code>.bg-dark</code> to the <code>.navbar</code>, <code>.text-bg-dark</code> to the <code>.offcanvas</code>, <code>.dropdown-menu-dark</code> to <code>.dropdown-menu</code>, and <code>.btn-close-white</code> to <code>.btn-close</code> for proper styling with a dark offcanvas.</p>
<div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Offcanvas dark navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
</div><div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-0 border-top border-bottom">
        <small class="font-monospace text-body-secondary text-uppercase">html</small>
        <div class="d-flex ms-auto">
          <button type="button" class="btn-edit text-nowrap" title="Try it on StackBlitz">
            <svg class="bi" aria-hidden="true"><use xlink:href="#lightning-charge-fill"/></svg>
          </button>
          <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
            <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
          </button>
        </div>
      </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-html" data-lang="html"><span class="line"><span class="cl"><span class="p">&lt;</span><span class="nt">nav</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar navbar-dark bg-dark fixed-top&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;container-fluid&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-brand&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Offcanvas dark navbar<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;offcanvas&#34;</span> <span class="na">data-bs-target</span><span class="o">=</span><span class="s">&#34;#offcanvasDarkNavbar&#34;</span> <span class="na">aria-controls</span><span class="o">=</span><span class="s">&#34;offcanvasDarkNavbar&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Toggle navigation&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">span</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-toggler-icon&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">span</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;offcanvas offcanvas-end text-bg-dark&#34;</span> <span class="na">tabindex</span><span class="o">=</span><span class="s">&#34;-1&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;offcanvasDarkNavbar&#34;</span> <span class="na">aria-labelledby</span><span class="o">=</span><span class="s">&#34;offcanvasDarkNavbarLabel&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;offcanvas-header&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">h5</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;offcanvas-title&#34;</span> <span class="na">id</span><span class="o">=</span><span class="s">&#34;offcanvasDarkNavbarLabel&#34;</span><span class="p">&gt;</span>Dark offcanvas<span class="p">&lt;/</span><span class="nt">h5</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">button</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn-close btn-close-white&#34;</span> <span class="na">data-bs-dismiss</span><span class="o">=</span><span class="s">&#34;offcanvas&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Close&#34;</span><span class="p">&gt;&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;</span><span class="nt">div</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;offcanvas-body&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;navbar-nav justify-content-end flex-grow-1 pe-3&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link active&#34;</span> <span class="na">aria-current</span><span class="o">=</span><span class="s">&#34;page&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Home<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Link<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">li</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-item dropdown&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;nav-link dropdown-toggle&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;button&#34;</span> <span class="na">data-bs-toggle</span><span class="o">=</span><span class="s">&#34;dropdown&#34;</span> <span class="na">aria-expanded</span><span class="o">=</span><span class="s">&#34;false&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">              Dropdown
</span></span><span class="line"><span class="cl">            <span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;</span><span class="nt">ul</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-menu dropdown-menu-dark&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">              <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Action<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">              <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Another action<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">              <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">                <span class="p">&lt;</span><span class="nt">hr</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-divider&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">              <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">              <span class="p">&lt;</span><span class="nt">li</span><span class="p">&gt;&lt;</span><span class="nt">a</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;dropdown-item&#34;</span> <span class="na">href</span><span class="o">=</span><span class="s">&#34;#&#34;</span><span class="p">&gt;</span>Something else here<span class="p">&lt;/</span><span class="nt">a</span><span class="p">&gt;&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">            <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;/</span><span class="nt">li</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">ul</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;</span><span class="nt">form</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;d-flex mt-3&#34;</span> <span class="na">role</span><span class="o">=</span><span class="s">&#34;search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">input</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;form-control me-2&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;search&#34;</span> <span class="na">placeholder</span><span class="o">=</span><span class="s">&#34;Search&#34;</span> <span class="na">aria-label</span><span class="o">=</span><span class="s">&#34;Search&#34;</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">          <span class="p">&lt;</span><span class="nt">button</span> <span class="na">class</span><span class="o">=</span><span class="s">&#34;btn btn-success&#34;</span> <span class="na">type</span><span class="o">=</span><span class="s">&#34;submit&#34;</span><span class="p">&gt;</span>Search<span class="p">&lt;/</span><span class="nt">button</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">        <span class="p">&lt;/</span><span class="nt">form</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">      <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">    <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl">  <span class="p">&lt;/</span><span class="nt">div</span><span class="p">&gt;</span>
</span></span><span class="line"><span class="cl"><span class="p">&lt;/</span><span class="nt">nav</span><span class="p">&gt;</span></span></span></code></pre></div></div>

<h2 id="css">CSS <a class="anchor-link" href="#css" aria-label="Link to this section: CSS"></a></h2>
<h3 id="variables">Variables <a class="anchor-link" href="#variables" aria-label="Link to this section: Variables"></a></h3>
<small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-success-emphasis bg-success-subtle border border-success-subtle rounded-2">Added in v5.2.0</small>

<p>As part of Bootstrap&rsquo;s evolving CSS variables approach, navbars now use local CSS variables on <code>.navbar</code> for enhanced real-time customization. Values for the CSS variables are set via Sass, so Sass customization is still supported, too.</p>
<div class="bd-example-snippet bd-code-snippet bd-file-ref">
    <div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-bottom">
      <a class="font-monospace link-secondary link-underline-secondary link-underline-opacity-0 link-underline-opacity-100-hover small" href="https://github.com/twbs/bootstrap/blob/v5.3.1/scss/_navbar.scss">scss/_navbar.scss</a>
      <div class="d-flex ms-auto">
        <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
          <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
        </button>
      </div>
    </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-scss" data-lang="scss"><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-padding-x</span><span class="o">:</span> <span class="si">#{</span><span class="nf">if</span><span class="p">(</span><span class="nv">$navbar-padding-x</span> <span class="o">==</span> <span class="n">null</span><span class="o">,</span> <span class="mi">0</span><span class="o">,</span> <span class="nv">$navbar-padding-x</span><span class="p">)</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-padding-y</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-padding-y</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-light-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-hover-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-light-hover-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-disabled-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-light-disabled-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-active-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-light-active-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-brand-padding-y</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-brand-padding-y</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-brand-margin-end</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-brand-margin-end</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-brand-font-size</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-brand-font-size</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-brand-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-light-brand-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-brand-hover-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-light-brand-hover-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-nav-link-padding-x</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-nav-link-padding-x</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-toggler-padding-y</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-toggler-padding-y</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-toggler-padding-x</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-toggler-padding-x</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-toggler-font-size</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-toggler-font-size</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-toggler-icon-bg</span><span class="o">:</span> <span class="si">#{</span><span class="nf">escape-svg</span><span class="p">(</span><span class="nv">$navbar-light-toggler-icon-bg</span><span class="p">)</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-toggler-border-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-light-toggler-border-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-toggler-border-radius</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-toggler-border-radius</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-toggler-focus-width</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-toggler-focus-width</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-toggler-transition</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-toggler-transition</span><span class="si">}</span><span class="p">;</span></span></span></code></pre></div></div>
<p>Some additional CSS variables are also present on <code>.navbar-nav</code>:</p>
<div class="bd-example-snippet bd-code-snippet bd-file-ref">
    <div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-bottom">
      <a class="font-monospace link-secondary link-underline-secondary link-underline-opacity-0 link-underline-opacity-100-hover small" href="https://github.com/twbs/bootstrap/blob/v5.3.1/scss/_navbar.scss">scss/_navbar.scss</a>
      <div class="d-flex ms-auto">
        <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
          <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
        </button>
      </div>
    </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-scss" data-lang="scss"><span class="line"><span class="cl"><span class="na">--#{$prefix}nav-link-padding-x</span><span class="o">:</span> <span class="mi">0</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}nav-link-padding-y</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$nav-link-padding-y</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="k">@include</span><span class="nd"> rfs</span><span class="p">(</span><span class="nv">$nav-link-font-size</span><span class="o">,</span> <span class="o">--</span><span class="si">#{</span><span class="nv">$prefix</span><span class="si">}</span><span class="n">nav-link-font-size</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}nav-link-font-weight</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$nav-link-font-weight</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}nav-link-color</span><span class="o">:</span> <span class="nf">var</span><span class="p">(</span><span class="o">--</span><span class="si">#{</span><span class="nv">$prefix</span><span class="si">}</span><span class="n">navbar-color</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}nav-link-hover-color</span><span class="o">:</span> <span class="nf">var</span><span class="p">(</span><span class="o">--</span><span class="si">#{</span><span class="nv">$prefix</span><span class="si">}</span><span class="n">navbar-hover-color</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}nav-link-disabled-color</span><span class="o">:</span> <span class="nf">var</span><span class="p">(</span><span class="o">--</span><span class="si">#{</span><span class="nv">$prefix</span><span class="si">}</span><span class="n">navbar-disabled-color</span><span class="p">);</span></span></span></code></pre></div></div>
<p>Customization through CSS variables can be seen on the <code>.navbar-dark</code> class where we override specific values without adding duplicate CSS selectors.</p>
<div class="bd-example-snippet bd-code-snippet bd-file-ref">
    <div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-bottom">
      <a class="font-monospace link-secondary link-underline-secondary link-underline-opacity-0 link-underline-opacity-100-hover small" href="https://github.com/twbs/bootstrap/blob/v5.3.1/scss/_navbar.scss">scss/_navbar.scss</a>
      <div class="d-flex ms-auto">
        <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
          <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
        </button>
      </div>
    </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-scss" data-lang="scss"><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-dark-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-hover-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-dark-hover-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-disabled-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-dark-disabled-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-active-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-dark-active-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-brand-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-dark-brand-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-brand-hover-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-dark-brand-hover-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-toggler-border-color</span><span class="o">:</span> <span class="si">#{</span><span class="nv">$navbar-dark-toggler-border-color</span><span class="si">}</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="na">--#{$prefix}navbar-toggler-icon-bg</span><span class="o">:</span> <span class="si">#{</span><span class="nf">escape-svg</span><span class="p">(</span><span class="nv">$navbar-dark-toggler-icon-bg</span><span class="p">)</span><span class="si">}</span><span class="p">;</span></span></span></code></pre></div></div>
<h3 id="sass-variables">Sass variables <a class="anchor-link" href="#sass-variables" aria-label="Link to this section: Sass variables"></a></h3>
<p>Variables for all navbars:</p>
<div class="bd-example-snippet bd-code-snippet bd-file-ref">
    <div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-bottom">
      <a class="font-monospace link-secondary link-underline-secondary link-underline-opacity-0 link-underline-opacity-100-hover small" href="https://github.com/twbs/bootstrap/blob/v5.3.1/scss/_variables.scss">scss/_variables.scss</a>
      <div class="d-flex ms-auto">
        <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
          <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
        </button>
      </div>
    </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-scss" data-lang="scss"><span class="line"><span class="cl"><span class="nv">$navbar-padding-y</span><span class="o">:</span>                  <span class="nv">$spacer</span> <span class="o">*</span> <span class="mf">.5</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-padding-x</span><span class="o">:</span>                  <span class="n">null</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-nav-link-padding-x</span><span class="o">:</span>         <span class="mf">.5</span><span class="kt">rem</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-brand-font-size</span><span class="o">:</span>            <span class="nv">$font-size-lg</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="c1">// Compute the navbar-brand padding-y so the navbar-brand will have the same height as navbar-text and nav-link
</span></span></span><span class="line"><span class="cl"><span class="c1"></span><span class="nv">$nav-link-height</span><span class="o">:</span>                   <span class="nv">$font-size-base</span> <span class="o">*</span> <span class="nv">$line-height-base</span> <span class="o">+</span> <span class="nv">$nav-link-padding-y</span> <span class="o">*</span> <span class="mi">2</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-brand-height</span><span class="o">:</span>               <span class="nv">$navbar-brand-font-size</span> <span class="o">*</span> <span class="nv">$line-height-base</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-brand-padding-y</span><span class="o">:</span>            <span class="p">(</span><span class="nv">$nav-link-height</span> <span class="o">-</span> <span class="nv">$navbar-brand-height</span><span class="p">)</span> <span class="o">*</span> <span class="mf">.5</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-brand-margin-end</span><span class="o">:</span>           <span class="mi">1</span><span class="kt">rem</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-toggler-padding-y</span><span class="o">:</span>          <span class="mf">.25</span><span class="kt">rem</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-toggler-padding-x</span><span class="o">:</span>          <span class="mf">.75</span><span class="kt">rem</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-toggler-font-size</span><span class="o">:</span>          <span class="nv">$font-size-lg</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-toggler-border-radius</span><span class="o">:</span>      <span class="nv">$btn-border-radius</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-toggler-focus-width</span><span class="o">:</span>        <span class="nv">$btn-focus-width</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-toggler-transition</span><span class="o">:</span>         <span class="n">box-shadow</span> <span class="mf">.15</span><span class="kt">s</span> <span class="ni">ease-in-out</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-light-color</span><span class="o">:</span>                <span class="nf">rgba</span><span class="p">(</span><span class="nf">var</span><span class="p">(</span><span class="o">--</span><span class="si">#{</span><span class="nv">$prefix</span><span class="si">}</span><span class="n">emphasis-color-rgb</span><span class="p">)</span><span class="o">,</span> <span class="mf">.65</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-light-hover-color</span><span class="o">:</span>          <span class="nf">rgba</span><span class="p">(</span><span class="nf">var</span><span class="p">(</span><span class="o">--</span><span class="si">#{</span><span class="nv">$prefix</span><span class="si">}</span><span class="n">emphasis-color-rgb</span><span class="p">)</span><span class="o">,</span> <span class="mf">.8</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-light-active-color</span><span class="o">:</span>         <span class="nf">rgba</span><span class="p">(</span><span class="nf">var</span><span class="p">(</span><span class="o">--</span><span class="si">#{</span><span class="nv">$prefix</span><span class="si">}</span><span class="n">emphasis-color-rgb</span><span class="p">)</span><span class="o">,</span> <span class="mi">1</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-light-disabled-color</span><span class="o">:</span>       <span class="nf">rgba</span><span class="p">(</span><span class="nf">var</span><span class="p">(</span><span class="o">--</span><span class="si">#{</span><span class="nv">$prefix</span><span class="si">}</span><span class="n">emphasis-color-rgb</span><span class="p">)</span><span class="o">,</span> <span class="mf">.3</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-light-icon-color</span><span class="o">:</span>           <span class="nf">rgba</span><span class="p">(</span><span class="nv">$body-color</span><span class="o">,</span> <span class="mf">.75</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-light-toggler-icon-bg</span><span class="o">:</span>      <span class="sx">url(&#34;data:image/svg+xml,&lt;svg xmlns=&#39;http://www.w3.org/2000/svg&#39; viewBox=&#39;0 0 30 30&#39;&gt;&lt;path stroke=&#39;</span><span class="si">#{</span><span class="nv">$navbar-light-icon-color</span><span class="si">}</span><span class="sx">&#39; stroke-linecap=&#39;round&#39; stroke-miterlimit=&#39;10&#39; stroke-width=&#39;2&#39; d=&#39;M4 7h22M4 15h22M4 23h22&#39;/&gt;&lt;/svg&gt;&#34;)</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-light-toggler-border-color</span><span class="o">:</span> <span class="nf">rgba</span><span class="p">(</span><span class="nf">var</span><span class="p">(</span><span class="o">--</span><span class="si">#{</span><span class="nv">$prefix</span><span class="si">}</span><span class="n">emphasis-color-rgb</span><span class="p">)</span><span class="o">,</span> <span class="mf">.15</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-light-brand-color</span><span class="o">:</span>          <span class="nv">$navbar-light-active-color</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-light-brand-hover-color</span><span class="o">:</span>    <span class="nv">$navbar-light-active-color</span><span class="p">;</span>
</span></span></code></pre></div></div>
<p>Variables for the <a href="#color-schemes">dark navbar</a>:</p>
<div class="bd-example-snippet bd-code-snippet bd-file-ref">
    <div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-bottom">
      <a class="font-monospace link-secondary link-underline-secondary link-underline-opacity-0 link-underline-opacity-100-hover small" href="https://github.com/twbs/bootstrap/blob/v5.3.1/scss/_variables.scss">scss/_variables.scss</a>
      <div class="d-flex ms-auto">
        <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
          <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
        </button>
      </div>
    </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-scss" data-lang="scss"><span class="line"><span class="cl"><span class="nv">$navbar-dark-color</span><span class="o">:</span>                 <span class="nf">rgba</span><span class="p">(</span><span class="nv">$white</span><span class="o">,</span> <span class="mf">.55</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-dark-hover-color</span><span class="o">:</span>           <span class="nf">rgba</span><span class="p">(</span><span class="nv">$white</span><span class="o">,</span> <span class="mf">.75</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-dark-active-color</span><span class="o">:</span>          <span class="nv">$white</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-dark-disabled-color</span><span class="o">:</span>        <span class="nf">rgba</span><span class="p">(</span><span class="nv">$white</span><span class="o">,</span> <span class="mf">.25</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-dark-icon-color</span><span class="o">:</span>            <span class="nv">$navbar-dark-color</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-dark-toggler-icon-bg</span><span class="o">:</span>       <span class="sx">url(&#34;data:image/svg+xml,&lt;svg xmlns=&#39;http://www.w3.org/2000/svg&#39; viewBox=&#39;0 0 30 30&#39;&gt;&lt;path stroke=&#39;</span><span class="si">#{</span><span class="nv">$navbar-dark-icon-color</span><span class="si">}</span><span class="sx">&#39; stroke-linecap=&#39;round&#39; stroke-miterlimit=&#39;10&#39; stroke-width=&#39;2&#39; d=&#39;M4 7h22M4 15h22M4 23h22&#39;/&gt;&lt;/svg&gt;&#34;)</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-dark-toggler-border-color</span><span class="o">:</span>  <span class="nf">rgba</span><span class="p">(</span><span class="nv">$white</span><span class="o">,</span> <span class="mf">.1</span><span class="p">);</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-dark-brand-color</span><span class="o">:</span>           <span class="nv">$navbar-dark-active-color</span><span class="p">;</span>
</span></span><span class="line"><span class="cl"><span class="nv">$navbar-dark-brand-hover-color</span><span class="o">:</span>     <span class="nv">$navbar-dark-active-color</span><span class="p">;</span>
</span></span></code></pre></div></div>
<h3 id="sass-loops">Sass loops <a class="anchor-link" href="#sass-loops" aria-label="Link to this section: Sass loops"></a></h3>
<p><a href="#responsive-behaviors">Responsive navbar expand/collapse classes</a> (e.g., <code>.navbar-expand-lg</code>) are combined with the <code>$breakpoints</code> map and generated through a loop in <code>scss/_navbar.scss</code>.</p>
<div class="bd-example-snippet bd-code-snippet bd-file-ref">
    <div class="d-flex align-items-center highlight-toolbar ps-3 pe-2 py-1 border-bottom">
      <a class="font-monospace link-secondary link-underline-secondary link-underline-opacity-0 link-underline-opacity-100-hover small" href="https://github.com/twbs/bootstrap/blob/v5.3.1/scss/_navbar.scss">scss/_navbar.scss</a>
      <div class="d-flex ms-auto">
        <button type="button" class="btn-clipboard mt-0 me-0" title="Copy to clipboard">
          <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"/></svg>
        </button>
      </div>
    </div><div class="highlight"><pre tabindex="0" class="chroma"><code class="language-scss" data-lang="scss"><span class="line"><span class="cl"><span class="c1">// Generate series of `.navbar-expand-*` responsive classes for configuring
</span></span></span><span class="line"><span class="cl"><span class="c1">// where your navbar collapses.
</span></span></span><span class="line"><span class="cl"><span class="c1"></span><span class="nc">.navbar-expand</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">  <span class="k">@each</span> <span class="nv">$breakpoint</span> <span class="ow">in</span> <span class="nf">map-keys</span><span class="p">(</span><span class="nv">$grid-breakpoints</span><span class="p">)</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">    <span class="nv">$next</span><span class="o">:</span> <span class="nf">breakpoint-next</span><span class="p">(</span><span class="nv">$breakpoint</span><span class="o">,</span> <span class="nv">$grid-breakpoints</span><span class="p">);</span>
</span></span><span class="line"><span class="cl">    <span class="nv">$infix</span><span class="o">:</span> <span class="nf">breakpoint-infix</span><span class="p">(</span><span class="nv">$next</span><span class="o">,</span> <span class="nv">$grid-breakpoints</span><span class="p">);</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl">    <span class="c1">// stylelint-disable-next-line scss/selector-no-union-class-name
</span></span></span><span class="line"><span class="cl"><span class="c1"></span>    <span class="k">&amp;</span><span class="si">#{</span><span class="nv">$infix</span><span class="si">}</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">      <span class="k">@include</span><span class="nd"> media-breakpoint-up</span><span class="p">(</span><span class="nv">$next</span><span class="p">)</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">        <span class="na">flex-wrap</span><span class="o">:</span> <span class="ni">nowrap</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">        <span class="na">justify-content</span><span class="o">:</span> <span class="ni">flex-start</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl">        <span class="nc">.navbar-nav</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">          <span class="na">flex-direction</span><span class="o">:</span> <span class="ni">row</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl">          <span class="nc">.dropdown-menu</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">            <span class="na">position</span><span class="o">:</span> <span class="ni">absolute</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">          <span class="p">}</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl">          <span class="nc">.nav-link</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">            <span class="na">padding-right</span><span class="o">:</span> <span class="nf">var</span><span class="p">(</span><span class="o">--</span><span class="si">#{</span><span class="nv">$prefix</span><span class="si">}</span><span class="n">navbar-nav-link-padding-x</span><span class="p">);</span>
</span></span><span class="line"><span class="cl">            <span class="na">padding-left</span><span class="o">:</span> <span class="nf">var</span><span class="p">(</span><span class="o">--</span><span class="si">#{</span><span class="nv">$prefix</span><span class="si">}</span><span class="n">navbar-nav-link-padding-x</span><span class="p">);</span>
</span></span><span class="line"><span class="cl">          <span class="p">}</span>
</span></span><span class="line"><span class="cl">        <span class="p">}</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl">        <span class="nc">.navbar-nav-scroll</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">          <span class="na">overflow</span><span class="o">:</span> <span class="ni">visible</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">        <span class="p">}</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl">        <span class="nc">.navbar-collapse</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">          <span class="na">display</span><span class="o">:</span> <span class="ni">flex</span> <span class="k">!important</span><span class="p">;</span> <span class="c1">// stylelint-disable-line declaration-no-important
</span></span></span><span class="line"><span class="cl"><span class="c1"></span>          <span class="na">flex-basis</span><span class="o">:</span> <span class="ni">auto</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">        <span class="p">}</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl">        <span class="nc">.navbar-toggler</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">          <span class="na">display</span><span class="o">:</span> <span class="ni">none</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">        <span class="p">}</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl">        <span class="nc">.offcanvas</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">          <span class="c1">// stylelint-disable declaration-no-important
</span></span></span><span class="line"><span class="cl"><span class="c1"></span>          <span class="na">position</span><span class="o">:</span> <span class="ni">static</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">          <span class="na">z-index</span><span class="o">:</span> <span class="ni">auto</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">          <span class="na">flex-grow</span><span class="o">:</span> <span class="mi">1</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">          <span class="na">width</span><span class="o">:</span> <span class="ni">auto</span> <span class="k">!important</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">          <span class="na">height</span><span class="o">:</span> <span class="ni">auto</span> <span class="k">!important</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">          <span class="na">visibility</span><span class="o">:</span> <span class="ni">visible</span> <span class="k">!important</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">          <span class="na">background-color</span><span class="o">:</span> <span class="ni">transparent</span> <span class="k">!important</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">          <span class="na">border</span><span class="o">:</span> <span class="mi">0</span> <span class="k">!important</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">          <span class="na">transform</span><span class="o">:</span> <span class="ni">none</span> <span class="k">!important</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">          <span class="k">@include</span><span class="nd"> box-shadow</span><span class="p">(</span><span class="ni">none</span><span class="p">);</span>
</span></span><span class="line"><span class="cl">          <span class="k">@include</span><span class="nd"> transition</span><span class="p">(</span><span class="ni">none</span><span class="p">);</span>
</span></span><span class="line"><span class="cl">          <span class="c1">// stylelint-enable declaration-no-important
</span></span></span><span class="line"><span class="cl"><span class="c1"></span>
</span></span><span class="line"><span class="cl">          <span class="nc">.offcanvas-header</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">            <span class="na">display</span><span class="o">:</span> <span class="ni">none</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">          <span class="p">}</span>
</span></span><span class="line"><span class="cl">
</span></span><span class="line"><span class="cl">          <span class="nc">.offcanvas-body</span> <span class="p">{</span>
</span></span><span class="line"><span class="cl">            <span class="na">display</span><span class="o">:</span> <span class="ni">flex</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">            <span class="na">flex-grow</span><span class="o">:</span> <span class="mi">0</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">            <span class="na">padding</span><span class="o">:</span> <span class="mi">0</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">            <span class="na">overflow-y</span><span class="o">:</span> <span class="ni">visible</span><span class="p">;</span>
</span></span><span class="line"><span class="cl">          <span class="p">}</span>
</span></span><span class="line"><span class="cl">        <span class="p">}</span>
</span></span><span class="line"><span class="cl">      <span class="p">}</span>
</span></span><span class="line"><span class="cl">    <span class="p">}</span>
</span></span><span class="line"><span class="cl">  <span class="p">}</span>
</span></span><span class="line"><span class="cl"><span class="p">}</span>
</span></span></code></pre></div></div>

      </div>
    </main>
  </div>


    <footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
  <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
    <div class="row">
      <div class="col-lg-3 mb-3">
        <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none" href="/" aria-label="Bootstrap">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="d-block me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"/></svg>
          <span class="fs-5">Bootstrap</span>
        </a>
        <ul class="list-unstyled small">
          <li class="mb-2">Designed and built with all the love in the world by the <a href="/docs/5.3/about/team/">Bootstrap team</a> with the help of <a href="https://github.com/twbs/bootstrap/graphs/contributors">our contributors</a>.</li>
          <li class="mb-2">Code licensed <a href="https://github.com/twbs/bootstrap/blob/main/LICENSE" target="_blank" rel="license noopener">MIT</a>, docs <a href="https://creativecommons.org/licenses/by/3.0/" target="_blank" rel="license noopener">CC BY 3.0</a>.</li>
          <li class="mb-2">Currently v5.3.1.</li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 offset-lg-1 mb-3">
        <h5>Links</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="/">Home</a></li>
          <li class="mb-2"><a href="/docs/5.3/">Docs</a></li>
          <li class="mb-2"><a href="/docs/5.3/examples/">Examples</a></li>
          <li class="mb-2"><a href="https://icons.getbootstrap.com/">Icons</a></li>
          <li class="mb-2"><a href="https://themes.getbootstrap.com/">Themes</a></li>
          <li class="mb-2"><a href="https://blog.getbootstrap.com/">Blog</a></li>
          <li class="mb-2"><a href="https://cottonbureau.com/people/bootstrap" target="_blank" rel="noopener">Swag Store</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Guides</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="/docs/5.3/getting-started/">Getting started</a></li>
          <li class="mb-2"><a href="/docs/5.3/examples/starter-template/">Starter template</a></li>
          <li class="mb-2"><a href="/docs/5.3/getting-started/webpack/">Webpack</a></li>
          <li class="mb-2"><a href="/docs/5.3/getting-started/parcel/">Parcel</a></li>
          <li class="mb-2"><a href="/docs/5.3/getting-started/vite/">Vite</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Projects</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap" target="_blank" rel="noopener">Bootstrap 5</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap/tree/v4-dev" target="_blank" rel="noopener">Bootstrap 4</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/icons" target="_blank" rel="noopener">Icons</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/rfs" target="_blank" rel="noopener">RFS</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/examples/" target="_blank" rel="noopener">Examples repo</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Community</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap/issues" target="_blank" rel="noopener">Issues</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap/discussions" target="_blank" rel="noopener">Discussions</a></li>
          <li class="mb-2"><a href="https://github.com/sponsors/twbs" target="_blank" rel="noopener">Corporate sponsors</a></li>
          <li class="mb-2"><a href="https://opencollective.com/bootstrap" target="_blank" rel="noopener">Open Collective</a></li>
          <li class="mb-2"><a href="https://stackoverflow.com/questions/tagged/bootstrap-5" target="_blank" rel="noopener">Stack Overflow</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/@docsearch/js@3"></script>

<script src="https://cdn.jsdelivr.net/npm/@stackblitz/sdk@1/bundles/sdk.umd.js"></script>

<script src="/docs/5.3/assets/js/docs.min.js"></script>

<script>
  
  document.querySelectorAll('.btn-edit').forEach(btn => {
    btn.addEventListener('click', event => {
      const htmlSnippet = event.target.closest('.bd-code-snippet').querySelector('.bd-example').innerHTML

      
      const classes = Array.from(event.target.closest('.bd-code-snippet').querySelector('.bd-example').classList).join(' ')

      const jsSnippet = event.target.closest('.bd-code-snippet').querySelector('.btn-edit').getAttribute('data-sb-js-snippet')
      StackBlitzSDK.openBootstrapSnippet(htmlSnippet, jsSnippet, classes)
    })
  })

  StackBlitzSDK.openBootstrapSnippet = (htmlSnippet, jsSnippet, classes) => {
    const markup = `<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https:\/\/cdn.jsdelivr.net\/npm\/bootstrap@5.3.1\/dist\/css\/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <${'script'} src="https:\/\/cdn.jsdelivr.net\/npm\/bootstrap@5.3.1\/dist\/js\/bootstrap.bundle.min.js"></${'script'}>
  </head>
  <body class="p-3 m-0 border-0 ${classes}">

    <!-- Example Code -->
${htmlSnippet.replace(/^/gm, '    ')}
    <!-- End Example Code -->
  </body>
</html>`

    const jsSnippetContent = jsSnippet ? '\/\/ NOTICE!!! Initially embedded in our docs this JavaScript\n\/\/ file contains elements that can help you create reproducible\n\/\/ use cases in StackBlitz for instance.\n\/\/ In a real project please adapt this content to your needs.\n\/\/ \u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\u002b\n\n\/*!\n * JavaScript for Bootstrap\u0027s docs (https:\/\/getbootstrap.com\/)\n * Copyright 2011-2023 The Bootstrap Authors\n * Licensed under the Creative Commons Attribution 3.0 Unported License.\n * For details, see https:\/\/creativecommons.org\/licenses\/by\/3.0\/.\n *\/\n\n\/* global bootstrap: false *\/\n\n(() =\u003e {\n  \u0027use strict\u0027\n\n  \/\/ --------\n  \/\/ Tooltips\n  \/\/ --------\n  \/\/ Instantiate all tooltips in a docs or StackBlitz\n  document.querySelectorAll(\u0027[data-bs-toggle=\u0022tooltip\u0022]\u0027)\n    .forEach(tooltip =\u003e {\n      new bootstrap.Tooltip(tooltip)\n    })\n\n  \/\/ --------\n  \/\/ Popovers\n  \/\/ --------\n  \/\/ Instantiate all popovers in docs or StackBlitz\n  document.querySelectorAll(\u0027[data-bs-toggle=\u0022popover\u0022]\u0027)\n    .forEach(popover =\u003e {\n      new bootstrap.Popover(popover)\n    })\n\n  \/\/ -------------------------------\n  \/\/ Toasts\n  \/\/ -------------------------------\n  \/\/ Used by \u0027Placement\u0027 example in docs or StackBlitz\n  const toastPlacement = document.getElementById(\u0027toastPlacement\u0027)\n  if (toastPlacement) {\n    document.getElementById(\u0027selectToastPlacement\u0027).addEventListener(\u0027change\u0027, function () {\n      if (!toastPlacement.dataset.originalClass) {\n        toastPlacement.dataset.originalClass = toastPlacement.className\n      }\n\n      toastPlacement.className = \u0060${toastPlacement.dataset.originalClass} ${this.value}\u0060\n    })\n  }\n\n  \/\/ Instantiate all toasts in docs pages only\n  document.querySelectorAll(\u0027.bd-example .toast\u0027)\n    .forEach(toastNode =\u003e {\n      const toast = new bootstrap.Toast(toastNode, {\n        autohide: false\n      })\n\n      toast.show()\n    })\n\n  \/\/ Instantiate all toasts in docs pages only\n  \/\/ js-docs-start live-toast\n  const toastTrigger = document.getElementById(\u0027liveToastBtn\u0027)\n  const toastLiveExample = document.getElementById(\u0027liveToast\u0027)\n\n  if (toastTrigger) {\n    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)\n    toastTrigger.addEventListener(\u0027click\u0027, () =\u003e {\n      toastBootstrap.show()\n    })\n  }\n  \/\/ js-docs-end live-toast\n\n  \/\/ -------------------------------\n  \/\/ Alerts\n  \/\/ -------------------------------\n  \/\/ Used in \u0027Show live alert\u0027 example in docs or StackBlitz\n\n  \/\/ js-docs-start live-alert\n  const alertPlaceholder = document.getElementById(\u0027liveAlertPlaceholder\u0027)\n  const appendAlert = (message, type) =\u003e {\n    const wrapper = document.createElement(\u0027div\u0027)\n    wrapper.innerHTML = [\n      \u0060\u003cdiv class=\u0022alert alert-${type} alert-dismissible\u0022 role=\u0022alert\u0022\u003e\u0060,\n      \u0060   \u003cdiv\u003e${message}\u003c\/div\u003e\u0060,\n      \u0027   \u003cbutton type=\u0022button\u0022 class=\u0022btn-close\u0022 data-bs-dismiss=\u0022alert\u0022 aria-label=\u0022Close\u0022\u003e\u003c\/button\u003e\u0027,\n      \u0027\u003c\/div\u003e\u0027\n    ].join(\u0027\u0027)\n\n    alertPlaceholder.append(wrapper)\n  }\n\n  const alertTrigger = document.getElementById(\u0027liveAlertBtn\u0027)\n  if (alertTrigger) {\n    alertTrigger.addEventListener(\u0027click\u0027, () =\u003e {\n      appendAlert(\u0027Nice, you triggered this alert message!\u0027, \u0027success\u0027)\n    })\n  }\n  \/\/ js-docs-end live-alert\n\n  \/\/ --------\n  \/\/ Carousels\n  \/\/ --------\n  \/\/ Instantiate all non-autoplaying carousels in docs or StackBlitz\n  document.querySelectorAll(\u0027.carousel:not([data-bs-ride=\u0022carousel\u0022])\u0027)\n    .forEach(carousel =\u003e {\n      bootstrap.Carousel.getOrCreateInstance(carousel)\n    })\n\n  \/\/ -------------------------------\n  \/\/ Checks \u0026 Radios\n  \/\/ -------------------------------\n  \/\/ Indeterminate checkbox example in docs and StackBlitz\n  document.querySelectorAll(\u0027.bd-example-indeterminate [type=\u0022checkbox\u0022]\u0027)\n    .forEach(checkbox =\u003e {\n      if (checkbox.id.includes(\u0027Indeterminate\u0027)) {\n        checkbox.indeterminate = true\n      }\n    })\n\n  \/\/ -------------------------------\n  \/\/ Links\n  \/\/ -------------------------------\n  \/\/ Disable empty links in docs examples only\n  document.querySelectorAll(\u0027.bd-content [href=\u0022#\u0022]\u0027)\n    .forEach(link =\u003e {\n      link.addEventListener(\u0027click\u0027, event =\u003e {\n        event.preventDefault()\n      })\n    })\n\n  \/\/ -------------------------------\n  \/\/ Modal\n  \/\/ -------------------------------\n  \/\/ Modal \u0027Varying modal content\u0027 example in docs and StackBlitz\n  \/\/ js-docs-start varying-modal-content\n  const exampleModal = document.getElementById(\u0027exampleModal\u0027)\n  if (exampleModal) {\n    exampleModal.addEventListener(\u0027show.bs.modal\u0027, event =\u003e {\n      \/\/ Button that triggered the modal\n      const button = event.relatedTarget\n      \/\/ Extract info from data-bs-* attributes\n      const recipient = button.getAttribute(\u0027data-bs-whatever\u0027)\n      \/\/ If necessary, you could initiate an Ajax request here\n      \/\/ and then do the updating in a callback.\n\n      \/\/ Update the modal\u0027s content.\n      const modalTitle = exampleModal.querySelector(\u0027.modal-title\u0027)\n      const modalBodyInput = exampleModal.querySelector(\u0027.modal-body input\u0027)\n\n      modalTitle.textContent = \u0060New message to ${recipient}\u0060\n      modalBodyInput.value = recipient\n    })\n  }\n  \/\/ js-docs-end varying-modal-content\n\n  \/\/ -------------------------------\n  \/\/ Offcanvas\n  \/\/ -------------------------------\n  \/\/ \u0027Offcanvas components\u0027 example in docs only\n  const myOffcanvas = document.querySelectorAll(\u0027.bd-example-offcanvas .offcanvas\u0027)\n  if (myOffcanvas) {\n    myOffcanvas.forEach(offcanvas =\u003e {\n      offcanvas.addEventListener(\u0027show.bs.offcanvas\u0027, event =\u003e {\n        event.preventDefault()\n      }, false)\n    })\n  }\n})()\n' : null
    const project = {
      files: {
        'index.html': markup,
        'index.js': jsSnippetContent
      },
      title: 'Bootstrap Example',
      description: `Official example from ${window.location.href}`,
      template: jsSnippet ? 'javascript' : 'html',
      tags: ['bootstrap']
    }

    StackBlitzSDK.openProject(project, { openFile: 'index.html' })
  }
</script>


    
  <div class="position-fixed" aria-hidden="true"><input type="text" tabindex="-1"></div>

  </body>
</html>
