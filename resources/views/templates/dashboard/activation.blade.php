<div class="activation">
    <script>
        $('.carousel').carousel();
    </script>

    <div class="infoStatistic">
        <div class="part1">
            <h1><mark>Manage</mark> your page from </br> your place</h1>
            <div class="statisticPart clearElement">
                <div class="statistic elementLeft">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <div>Study the statistics of visits</div>
                </div>
                <div class="statistic elementLeft">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    <div>Edit the description and information about the services</div>
                </div>
                <div class="statistic elementLeft">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <div>Respond to user reviews</div>
                </div>
            </div>
            <button class="getButton" data-toggle="modal" data-target="#myModalGetAccess">get access</button>
        </div>
    </div>
    <div class="sliderAbout">
            <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                    <li data-target="#carousel" data-slide-to="4"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner innerCustom">
                    <div class="active item myCustomItems">
                        <div class="deliveryItem">Customers Delivery </br>Service №1</div>
                        <img class="ItemLogo" src="../images/logoBig.png">
                    </div>
                    <div class="item myCustomItems">
                        <div class="deliveryItem">Customers Delivery </br>Service №1</div>
                        <div class="customText">Lorem ipsum dolor sit amet, consectetur.</div>
                        <img class="ItemLogo" src="../images/find.png">
                        <div class="customTextSmall">Lorem ipsum dolor sit amet, consectetur </br>adipisicing elit. Omnis, quam?</div>
                    </div>
                    <div class="item myCustomItems">
                        <div class="deliveryItem noBold">Lorem ipsum dolor sit amet, consectetur </br>adipisicing elit. Omnis, quam? </br> <span class="bold">40004500</span></div>
                        </br>
                        <div class="deliveryItem noBold">Lorem ipsum dolor sit amet, consectetur </br>adipisicing elit. Omnis, quam? </br> <span class="bold">1000000</span></div>
                        </br>
                        <div class="transparentText">Lorem ipsum dolor sit <span class="markText">amet</span>, consectetur</br> adipisicing <span class="markText">elit</span></div>
                    </div>
                    <div class="item myCustomItems">
                        <div class="deliveryItem">Your page here</div>
                        </br></br>
                        <div class="clearElement contentWithImage">
                            <div class="customTextSmall elementLeft textLeft">Lorem ipsum dolor </br>sit amet, consectetur. </br></br>adipisicing elit. Nisi, recusandae.</div>
                            <img class="" src="../images/yourPage.png">
                        </div>
                    </div>
                    <div class="item myCustomItems">
                        <img class="ItemLogo" src="../images/graf.png">
                        </br></br>
                        <div class="deliveryItem noBold">Lorem ipsum dolor sit amet, consectetur </br>adipisicing elit.</div>
                    </div>

                </div>
                <!-- Carousel nav -->
                <a class="carousel-control left customLeft carouselControlCustom" href=".carousel" data-slide="prev" style="background: transparent">&lsaquo;</a>
                <a class="carousel-control right carouselControlCustom" href=".carousel" data-slide="next" style="background: transparent">&rsaquo;</a>
            </div>
    </div>
    <div class="videoAbout">
        <div class="videoM">
            <div class="videoPart">
                <video width="100%" height="100%" controls>
                    <source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>

    </div>
    <footer style="margin-top: 0">
        <div class="footerText">
            <div class="footerSec">
                <div class="footerText" data-toggle="modal" data-target="#myModalLocation">add location</div>
                <div class="footerText" data-toggle="modal" data-target="#myModalMaster">add master</div>
                <div class="footerText">for organization</div>
            </div>
            <div class="footerSec">
                <div class="footerText">contacts</div>
                <div class="footerText">about project</div>
                <div class="footerText">Noticed a Mistake - let us</div>
            </div>
        </div>
        {{--<div class="socialIco">
            <div class="fb">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </div>
            <div class="twit">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </div>
            <div class="google">
                <i class="fa fa-google-plus" aria-hidden="true"></i>
            </div>

        </div>--}}
    </footer>
</div>





<!--get access popup-->
<div class="modal fade" id="myModalGetAccess" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header popupHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title capitalize">get access</h4>
            </div>
            <div class="modal-body accessPopup">
                <div class="buttonInputGroup">
                    <input type="text" placeholder="Type the name of your restaurant ...">
                    <button class="findButton">Find</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!---->