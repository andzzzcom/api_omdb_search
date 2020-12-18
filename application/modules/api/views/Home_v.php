<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Engine IMDB</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/css/font-icons.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/css/style.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/css/colors/red.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/theme/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/theme/img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/theme/img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/theme/img/apple-touch-icon-114x114.png">

  <!-- Lazyload (must be placed in head in order to work) -->
  <script src="<?php echo base_url();?>assets/theme/js/lazysizes.min.js"></script>

  <style>
  * {
  box-sizing: border-box;
}

/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>

<body class="home style-politics">


  <!-- Bg Overlay -->
  <div class="content-overlay"></div>


  <main class="main oh" id="main">    
    
    <!-- Navigation -->
    <header class="nav nav--1">
      <div class="nav__holder nav--sticky">
        <div class="container relative">
          <div class="flex-parent">

            <div class="flex-child"></div>            

            <!-- Nav-wrap -->
            <nav class="flex-child nav__wrap d-none d-lg-block">              
              <ul class="nav__menu">
                <li>
                  <a href="#">Search Engine Movie in IMDB</a>
                </li>
              </ul> <!-- end menu -->
            </nav> <!-- end nav-wrap -->

            <!-- Logo Mobile -->
            <a href="#" class="logo logo-mobile d-lg-none"> </a>

            <!-- Nav Right -->
            <div class="flex-child">
              <div class="nav__right"></div> <!-- end nav right -->
            </div>            
          
          </div> <!-- end flex-parent -->

        </div>          
      </div>
    </header> <!-- end navigation -->

    <div class="main-container container" id="main-container">   
      <!-- Carousel posts -->
      <section class="section mb-24">
        <div class="">
			<center>
			<div class="col-md-7 col-xs-12">
				<center>
					<p><h3>Find movie in IMDB</h3></p>
				</center>
				<form class="example" action="<?php echo base_url();?>api" method="get">
				  <input required value="" type="text" name="q" placeholder="Search Movie in IMDB" name="search">
				  <button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
			</center>
        </div>
		<br>
		
        <!-- Slider -->
        <div class="row col-md-12">
		
		<?php
			$response = '';
			if($data == '')
				$response = 'start';
			else
				$response = $data->Response;
			if($response == 'True')
			{
				$i=0;
				foreach($data->Search as $d)
				{
		?>
					<div class="col-md-3">
					  <article class="entry">
						<div class="entry__img-holder">
							<div class="thumb-container thumb-65">
							  <img data-src="<?php echo $d->Poster;?>" src="<?php echo $d->Poster;?>" class="entry__img lazyload" alt="">
							</div>
						</div>
						<div class="entry__body text-center">
						  <div class="entry__header">  
							<div style="height:180px">						  
								<h2 class="entry__title" style="height:70px">
								  <?php echo $d->Title; ?>
								</h2>          
								<ul class="entry__meta" style="height:20px">
								  <li>
									( <?php echo $d->Year;?> )
								  </li>
								</ul>      
								<br>
								<button data-toggle="modal" data-target="#movie-<?php echo $i;?>" class="btn btn-lg btn-color btn-button">Detail</button>           
							</div>
						  </div>
						</div>
					  </article>
					</div>

					<?php
						foreach($array_movie as $a)
						{
							if($a["detail"]->imdbID == $d->imdbID)
							{
					?>
								<!-- Modal -->
								<div id="movie-<?php echo $i;?>" class="modal fade" role="dialog">
								  <div class="modal-dialog">

									 <div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title"><?php echo $d->Title; ?></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body row">
										<div class="col-md-3 col-xs-3">
											<b>Country:</b> 
										</div>
										<div class="col-md-9 col-xs-9">
											<?php echo $a["detail"]->Country;?>
										</div>
										
										<div class="col-md-3 col-xs-3">
											<b>Language: </b>
										</div>
										<div class="col-md-9 col-xs-9">
											<?php echo $a["detail"]->Language;?>
										</div>
										
										<div class="col-md-3 col-xs-3">
											<b>Genre: </b>
										</div>
										<div class="col-md-9 col-xs-9">
											<?php echo $a["detail"]->Genre;?>
										</div>
										
										<div class="col-md-3 col-xs-3">
											<b>Runtime: </b>
										</div>
										<div class="col-md-9 col-xs-9">
											<?php echo $a["detail"]->Runtime;?>
										</div>
										
										<div class="col-md-3 col-xs-3">
											<b>Director: </b>
										</div>
										<div class="col-md-9 col-xs-9">
											<?php echo $a["detail"]->Director;?>
										</div>
										
										<div class="col-md-3 col-xs-3">
											<b>Writer: </b>
										</div>
										<div class="col-md-9 col-xs-9">
											<?php echo $a["detail"]->Writer;?>
										</div>
										
										<div class="col-md-3 col-xs-3">
											<b>Actors: </b>
										</div>
										<div class="col-md-9 col-xs-9">
											<?php echo $a["detail"]->Actors;?>
										</div>
										
										<div class="col-md-3 col-xs-3">
											<b>IMDB Rating: </b>
										</div>
										<div class="col-md-9 col-xs-9">
											<?php echo $a["detail"]->imdbRating;?>
										</div>
										
										<div class="col-md-3 col-xs-3">
											<b>IMDB Votes: </b>
										</div>
										<div class="col-md-9 col-xs-9">
											<?php echo $a["detail"]->imdbVotes;?>
										</div>
										
										<div class="col-md-3 col-xs-3">
											<b>Type: </b>
										</div>
										<div class="col-md-9 col-xs-9">
											<?php echo $a["detail"]->Type;?>
										</div>
										
										<div class="col-md-3 col-xs-3">
											<b>Plot: </b>
										</div>
										<div class="col-md-9 col-xs-9">
											<?php echo $a["detail"]->Plot;?>
										</div>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary btn-button btn-lg" data-dismiss="modal">Close</button>
									  </div>
									</div>

								  </div>
								</div>
		<?php
							}
						}
					$i++;
				}
			}elseif($response == 'start')
			{
				
			}else
			{
				echo"<h3> Movie Not Found</h3>";
			}
		?>
		  
        </div> 
		<!-- end slider -->
      </section> <!-- end carousel posts -->

    </div> <!-- end main container -->

    <!-- Footer -->
    <footer class="footer footer--1">
      <div class="container">
        <div class="footer__widgets footer__widgets--short top-divider">
          <div class="row">

            <div class="col-lg-6">
              <p class="copyright">
                © 2019 Made by Andreas Hermawan
              </p>              
            </div>

            <div class="col-lg-6">
            </div>

          </div>
        </div>    
      </div> <!-- end container -->
    </footer> <!-- end footer -->

    <div id="back-to-top">
      <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
    </div>

  </main> <!-- end main-wrapper -->

  
  <!-- jQuery Scripts -->
  <script src="<?php echo base_url();?>assets/theme/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/theme/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/theme/js/easing.min.js"></script>
  <script src="<?php echo base_url();?>assets/theme/js/owl-carousel.min.js"></script>
  <script src="<?php echo base_url();?>assets/theme/js/flickity.pkgd.min.js"></script>
  <script src="<?php echo base_url();?>assets/theme/js/twitterFetcher_min.js"></script>
  <script src="<?php echo base_url();?>assets/theme/js/jquery.newsTicker.min.js"></script>  
  <script src="<?php echo base_url();?>assets/theme/js/modernizr.min.js"></script>
  <script src="<?php echo base_url();?>assets/theme/js/scripts.js"></script>

</body>
</html>