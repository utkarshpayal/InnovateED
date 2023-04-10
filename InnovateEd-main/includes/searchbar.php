<?php

function searchbar($search_query = "Search an Innovation")
{
    echo <<<searchbar

				<div class="py-5 text-center d-flex align-items-center overlay-class" style="background-position: center center; background-size: 100%; background-repeat: repeat; height: 60vh;">
				<div class="container">
				<div class="row">
				<div class="mx-auto col-lg-8 col-md-10">
				<h3 class="display-3 text-white mb-0" style="">${search_query}</h3>
				<form class="form-inline justify-content-center" style="" method="get" action="../search.php">
				<div class="input-group border-dark rounded w-100" style=" border-top-left-radius: 15px; border-top-right-radius: 15px;  border-bottom-left-radius: 15px;  border-bottom-right-radius: 15px; height: 50px;">
				<input name="search" type="text" class="searchbar form-control text-white" id="inlineFormInputGroup" placeholder="Search an Innovation" style="	border-top-left-radius: 50px;	border-bottom-left-radius: 50px;	background-position: top left;	background-size: 100%;	background-repeat: repeat;	height: 50px;	background-color: white;	background-image: linear-gradient(to bottom, transparent, transparent);">
				<div class="input-group-append" style=" border-top-left-radius: 15px; border-bottom-left-radius: 15px;"><button class="searchbar btn btn-primary" type="submit" style="	border-top-right-radius: 50px;	border-bottom-right-radius: 50px;	border-left: transparent;	background-image: linear-gradient(to bottom, #12bbad, #12bbad);	background-position: top left;	background-size: 100%;	background-repeat: repeat;"><i class="fa fa-search" style="  border-bottom-right-radius: 15px; color: rgb(225 225 225 / 51%)"></i></button></div>
					</div>
					</form>
					</div>
					</div>
					</div>
					</div>
searchbar;
}
