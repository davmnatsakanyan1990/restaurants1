<div ng-controller="MapCtrl">
    <div class="content">
        <div class="sliderSection">
            <h1 class="headTitle">
                <span class="titleFirstPart">Choose your favorite</span>
                <span class="titleSecondPart">- all in same place</span>
            </h1>
            <p class="headBody uppercase">
                Best of <span ng-bind="city"></span>
            </p>
            <div class="slider">

                <div class=""><!--slider-->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div id="Carousel" class="carus2 carousel slide carouselTop">
                                <!-- Carousel items -->
                                <div class="carousel-inner">

                                    <div class="item active">
                                        <div class="row">
                                            <div class="col-md-<%cal%> col-xs-<%cal%> col-sm-<%cal%>"
                                                 ng-repeat="image in myNewArr[0] track by $index">
                                                <a class="thumbnail"
                                                   style="width: 60px; height: 70px; margin: 0 auto; border: none;">
                                                    <img src="<%image%>" style="max-width:100%;">
                                                    <div class="text"
                                                         style="font-size: 11px; color: #3c3e51; margin-top: 5px;">
                                                        someText
                                                    </div>
                                                </a>
                                            </div>
                                        </div><!--.row-->
                                    </div><!--.item-->
                                    <div class="item" ng-repeat="img in myNewArr track by $index">
                                        <div class="row">
                                            <div class="col-md-<%cal%> col-xs-<%cal%> col-sm-<%cal%>"
                                                 ng-repeat="image in img track by $index">
                                                <a class="thumbnail"
                                                   style="width: 60px; height: 70px; margin: 0 auto;  border: none;">
                                                    <img src="<%image%>" style="max-width:100%;">
                                                    <div class="text"
                                                         style="font-size: 11px; color: #3c3e51; margin-top: 5px;">
                                                        someText
                                                    </div>
                                                </a>
                                            </div>

                                        </div><!--.row-->
                                    </div><!--.item-->
                                </div><!--.carousel-inner-->
                                <a data-slide="prev" href=".carus2" class="carousel-control left cont"
                                   style="left: -42px; top: -41px; height: inherit;  width: inherit; background: none; font-size: 90px; color: #3c3e51; font-weight: 100;">‹</a>
                                <a data-slide="next" href=".carus2" class="carousel-control right cont"
                                   style="right: -42px; top: -41px; height: inherit;  width: inherit; background: none; font-size: 90px; color: #3c3e51; font-weight: 100;">›</a>
                            </div><!--.Carousel-->
                        </div>
                    </div>
                </div><!--.container-->


            </div>
            <div class="secondNav" id="secondNav" scroll
                 ng-class="{'closeSecondNav': !animateSecondMenuVar && visibleLittleMenu, 'fixedNavigation': visibleLittleMenu}">
                <div class="mobile-menu-icon" ng-click="toggleSecondMenu()" ng-class="{'animate': animateSecondMenuVar}"
                     ng-if="visibleLittleMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul class="NavButtons clear ">
                    <li class="navSecond capitalize" ng-click="displayElement('f1')">mode
                        <div class="forBefore displayNone" id="f1">
                            <div class="filters ">
                                <span class="triangle"></span>
                                <div class="filtersAll">
                                    <p ng-repeat="mode in drowMode track by $index">

                                        <input type="checkbox" id="test<% $index %>" ng-model="checkboxModel.checkboxModelF1[mode.pass.id][mode.pass.name]"/>
                                        <label for="test<% $index %>" ng-bind="mode.display.name"></label>
                                    </p>
                                </div>
                                <div class="twoButtons">
                                    <button class=" filterButtons capitalize">cancel</button>
                                    <button class="filterButtons capitalize"
                                            ng-click="pushElementInFilter(checkboxModel.checkboxModelF1, 'Mode')">
                                        ok
                                    </button>
                                </div>

                            </div>
                        </div>
                    </li>
                    <li class="navSecond capitalize" ng-click="displayElement('f2')">cost
                        <div class="forBefore displayNone" id="f2">
                            <div class="filters">
                                <span class="triangle"></span>
                                <div class="filtersAll">
                                    <p>
                                        <input type="checkbox" id="test12" ng-model="checkboxModel.checkboxModelF2[1]['$']"/>
                                        <label for="test12">$</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" id="test22" ng-model="checkboxModel.checkboxModelF2[2]['$$']"/>
                                        <label for="test22">$$</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" id="test32" ng-model="checkboxModel.checkboxModelF2[3]['$$$']"/>
                                        <label for="test32">$$$</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" id="test42" ng-model="checkboxModel.checkboxModelF2[4]['$$$$']"/>
                                        <label for="test42">$$$$</label>
                                    </p>
                                </div>
                                <div class="twoButtons">
                                    <button class=" filterButtons capitalize">cancel</button>
                                    <button class="filterButtons capitalize" ng-click="pushElementInFilter(checkboxModel.checkboxModelF2, 'Cost')">ok</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navSecond capitalize" ng-click="displayElement('f3')">Sort by
                        <div class="forBefore displayNone" id="f3">
                            <div class="filters">
                                <span class="triangle"></span>
                                <div class="filtersAll">
                                    <p ng-repeat="sortBy in drowSort track by $index">
                                        <input type="checkbox" id="test<% $index %>3" ng-model="checkboxModel.checkboxModelF3[sortBy.pass.id][sortBy.pass.name]"/>
                                        <label for="test<% $index %>3" ng-bind="sortBy.display.name">Popularity - high to low</label>
                                    </p>
                                </div>
                                <div class="twoButtons">
                                    <button class=" filterButtons capitalize">cancel</button>
                                    <button class="filterButtons capitalize"
                                            ng-click="pushElementInFilter(checkboxModel.checkboxModelF3, 'Sort By')">
                                        ok
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navSecond capitalize" ng-click="displayElement('f4')">cuisine
                        <div class="forBefore displayNone" id="f4">
                            <div class="filters">
                                <span class="triangle"></span>
                                <div class="filtersAll">
                                    <p ng-repeat="cuisin in drowCuisine track by $index">
                                        <input type="checkbox" id="test<% $index %>4" ng-model="checkboxModel.checkboxModelF4[cuisin.pass.id][cuisin.pass.name]"/>
                                        <label for="test<% $index %>4" ng-bind="cuisin.display.name"></label>
                                    </p>
                                </div>
                                <div class="twoButtons">
                                    <button class=" filterButtons capitalize">cancel</button>
                                    <button class="filterButtons capitalize" ng-click="pushElementInFilter(checkboxModel.checkboxModelF4, 'Cuisine')">ok</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navSecond capitalize" ng-click="displayElement('f5')">type of restaurants
                        <div class="forBefore displayNone" id="f5">
                            <div class="filters">
                                <span class="triangle"></span>
                                <div class="filtersAll">
                                    <p ng-repeat="type in drowType track by $index">
                                        <input type="checkbox" id="test<% $index %>5" ng-model="checkboxModel.checkboxModelF5[type.pass.id][type.pass.name]"/>
                                        <label for="test<% $index %>5" ng-bind="type.display.name"></label>
                                    </p>
                                </div>
                                <div class="twoButtons">
                                    <button class=" filterButtons capitalize">cancel</button>
                                    <button class="filterButtons capitalize"
                                            ng-click="pushElementInFilter(checkboxModel.checkboxModelF5, 'Type')">
                                        ok
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="navSecond capitalize" ng-click="displayElement('f6')">Location
                        <div class="forBefore displayNone" id="f6">
                            <div class="filters">
                                <span class="triangle"></span>
                                <div class="filtersAll">
                                    <p ng-repeat="location in drowCLocation track by $index">
                                        <input type="checkbox" id="test<% $index %>6" ng-model="checkboxModel.checkboxModelF6[location.pass.id][location.pass.name]"/>
                                        <label for="test<% $index %>6" ng-bind="location.display.name"></label>
                                    </p>
                                </div>
                                <div class="filtersAll">
                                    <button class=" filterButtons capitalize">cancel</button>
                                    <button class="filterButtons capitalize"
                                            ng-click="pushElementInFilter(checkboxModel.checkboxModelF6, 'Location')">
                                        ok
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>

                    <div class="toTop" ng-if="visibleLittleMenu"
                         onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                    </div>

                </ul>
            </div>
            <div class="filterSection clearElement">
                <div ng-repeat="(k, v) in filters">
                    <div  class="currentFilter" ng-repeat="filter in v" >
                        <div ng-bind="filter.name"></div>
                        <i class="fa fa-times" aria-hidden="true"  ng-click="deleteElementFromFilter(filter, k)"></i>
                    </div>
                </div>
            </div>
            <!--second nav fixed-->

            <!--end fixed nav-->
        </div>
        <div class="pageSection">
            {{-- <div class="headSection">
                 <ul>
                     <li class="capitalize" data-toggle="modal" data-target="#myModal2">area</li>
                     <li class="capitalize" data-toggle="modal" data-target="#myModal3">metro</li>
                     <li class="capitalize" data-toggle="modal" data-target="#myModal4" ng-click="openDrop()">sorting
                         <i class="fa fa-angle-down" aria-hidden="true"></i>
                         <div class="dropdown2" ng-if="openDropMenu">
                             <div class="options"><i class="fa fa-check" aria-hidden="true"></i>
                                 for default
                             </div>
                             <div class="options"><i class="fa fa-check" aria-hidden="true"></i>
                                 for rating
                             </div>
                         </div>
                     </li>
                 </ul>
             </div>--}}
            <div class="cont">
                <div class="infoContent">
                    <div class="info" ng-repeat="info in markers track by $index" ng-class="{'active': clichedElementId == info.id}"
                         ng-click="currentRest(info.id)" ng-mouseenter="openInfoWindow($event, info)">
                        <a href="#current">
                            <div class="imageSection">
                                <img src="images/restaurantImages/<% info.image %>">
                            </div>
                            <div class="textSection">
                                <div class="title" ng-bind="info.title"></div>

                                <div class="text" ng-bind="info.service"></div>
                                <div class="rate" ng-if="info.rating <=1">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="rate" ng-if="info.rating <=2 && info.rating >1">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="rate" ng-if="info.rating <=3 && info.rating >2">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="rate" ng-if="info.rating <=4 && info.rating >3">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="rate" ng-if="info.rating <=5 && info.rating >4">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="explanation" ng-bind="info.explane"></div>
                            </div>
                        </a>

                    </div>
                    <button class="showMoreButton" ng-click="addMorePoints()" id="active" ng-if="!noMoreInfoToShow">show more</button>
                    {{--<div class="additionalInfo">
                        <div class="additionalTitle">Restaurants in nearby towns</div>
                        <div class="imageAndInfo" ng-repeat="adInfo in additionalInfo">
                            <img src="<% adInfo.image %>"/>
                            <div class="info">
                                <div class="infoTitle" ng-bind="adInfo.title"></div>
                                <div class="moreInfo" ng-bind="adInfo.more"></div>
                            </div>
                        </div>
                    </div>--}}
                </div>
                <footer>
                    <div class="footerText">
                        <div class="footerSec">
                            <div class="footerText" data-toggle="modal" data-target="#myModalLocation">add location
                            </div>
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

        </div>
    </div>

    <!-- popups-->

    <!--choose area popup-->
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content fixedPopupContent">
                <div class="modal-header popupHeader">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title capitalize">choose area</h4>
                </div>
                <div class="modal-body popupBody leftContent">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer popupFooter">
                    <div class="leftButtonsArea">
                        <button type="button" class="capitalize greyButton" data-dismiss="modal">cancel</button>
                        <button type="button" class="capitalize greyButton">ok</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!---->

    <!--choose metro station popup-->
    <div class="modal fade" id="myModal3" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header popupHeader">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title capitalize">metro stations</h4>
                </div>
                <div class="modal-body popupBody leftContent">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer popupFooter">
                    <div class="leftButtonsArea">
                        <button type="button" class="capitalize greyButton" data-dismiss="modal">cancel</button>
                        <button type="button" class="capitalize greyButton">ok</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!---->

    <div class="maps">
        <div id="map" style="width:100%;height:100%"></div>
    </div>

</div>

