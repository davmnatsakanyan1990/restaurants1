<!DOCTYPE html>
<html lang="en">
<head>
    @include("layouts.partials.htmlheader")
    @include("layouts.partials.scripts")
</head>
<body ng-app="myApp" ng-controller="rootController">
    @include("layouts.partials.menu")
    <ng-view></ng-view>

    <div class="confirmation confirm">
        <i class="fa fa-check" aria-hidden="true"></i>
        <div class="text">Your registration is success</div>
    </div>
    <div class="confirmation error" id="error">
        <i class="fa fa-times" aria-hidden="true"></i>
        <div class="text">Something went wrong</div>
    </div>
    <!--logIn popup-->
    {{--<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header popupHeader">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title capitalize">log in</h4>
                </div>
                <div class="modal-body popupBody">
                    <input class="capitalize lightInput" type="text" placeholder="name"/>
                    <input class="capitalize lightInput" type="text" placeholder="E-mail"/>
                    <input class="capitalize lightInput" type="password" placeholder="password"/>
                </div>
                <div class="modal-footer popupFooter">
                    <button type="button" class="filterButtons popupButton capitalize" data-dismiss="modal">Close</button>
                    <button type="button" class="filterButtons popupButton capitalize">log in</button>
                </div>
            </div>
        </div>
    </div>--}}


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header popupHeader">
                    <button type="button" class="close" data-dismiss="modal" ng-click="reset()">&times;</button>
                    <h4 class="modal-title capitalize">log in or register</h4>
                </div>
                <div class="modal-body popupBody registerPopup littleInputs">
                    <div class="clearElement">
                        <div class="loginPart elementLeft">
							<form name="loginForm" class="css-form" novalidate>

								<div class="loginRegister">
                                    log in
								</div>
                                <div class="loginUsing facebook" ng-click="loginFacebook()">
                                    <div class="elementLeft"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                    <div class="elementLeft">facebook</div>
                                </div>
                                <div class="loginUsing googlePlus" ng-click="loginGoogle()">
                                    <div class="elementLeft"><i class="fa fa-google" aria-hidden="true"></i></div>
                                    <div class="elementLeft">google</div>
                                </div>
								<div class="restLogin">
                                    <div class="relativeElement">
                                        <input class="capitalize lightInput blockElement" type="text" placeholder="E-mail" name = "uName" ng-model="user.email" required/>
                                       <div ng-show="loginForm.$submitted || loginForm.uName.$touched">
                                           <div class="tooltips" ng-show="loginForm.uName.$error.email || loginForm.uName.$error.required">
                                               wrong email
                                           </div>
                                       </div>
                                    </div>
									<div class="marginTop10 relativeElement">
                                        <input class="capitalize lightInput blockElement" type="password" name ="pass" placeholder="password" ng-model="user.password" required/>
                                        <div ng-show="loginForm.$submitted || loginForm.pass.$touched">
                                            <div class="tooltips" ng-show="loginForm.pass.$error.required">
                                                wrong password
                                            </div>
                                        </div>
                                    </div>

								</div>

								<button class="loginUsingBut" ng-click="loginUser(user)" data-dismiss="modal">log in</button>

                                {{--<div class="loginusingSistem capitalize">
                                    log in
                                </div>--}}

                                {{--<button class="loginUsing twitter">
                                    <div class="elementLeft"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                    <div class="elementLeft">twitter</div>
                                </button>--}}
                                {{--<div class="moreSoc">
                                    <i class="fa fa-google-plus-square" aria-hidden="true"></i>
                                    <i class="fa fa-vk" aria-hidden="true"></i>
                                    <i class="fa fa-pinterest-square" aria-hidden="true"></i>
                                </div>--}}
							</form>
                        </div>
                        <div class="registerPart elementRight">
							<form name="registerForm" class="css-form" novalidate>
								<div class="loginRegister capitalize">
                                registration
								</div>
                                <div class="relativeElement">
                                    <input class="capitalize lightInput blockElement" type="text" name="name" placeholder="name" ng-model = "currentUser.name" required/>
                                    <div ng-show="registerForm.$submitted || registerForm.name.$touched">
                                        <div class="rightTooltips" ng-show="registerForm.name.$error.required">
                                            type your name
                                        </div>
                                    </div>
                                </div>
                                <div class="relativeElement marginTop10">
                                    <input class="capitalize lightInput blockElement" type="text" name="email" placeholder="E-mail" ng-model = "currentUser.email" required/>
                                    <div ng-show="registerForm.$submitted || registerForm.email.$touched">
                                        <div class="rightTooltips" ng-show="registerForm.email.$error.required">
                                            type your email
                                        </div>
                                    </div>
                                </div>
                                <div class="relativeElement marginTop10">
                                    <input class="capitalize lightInput blockElement" type="password" name="password" placeholder="password" ng-model = "currentUser.password" required/>
                                    <div ng-show="registerForm.$submitted || registerForm.password.$touched">
                                        <div class="rightTooltips" ng-show="registerForm.password.$error.required">
                                            type your password
                                        </div>
                                    </div>
                                </div>
								<div class="relativeElement marginTop10">
                                    <input class="capitalize lightInput blockElement" type="password" name="confirm" placeholder="confirm password" ng-model = "currentUser.confirmPassword" required/>
                                    <div ng-show="registerForm.$submitted || registerForm.confirm.$touched">
                                        <div class="rightTooltips" ng-show="registerForm.confirm.$error.required">
                                            retype your password
                                        </div>
                                    </div>
                                </div>

								<button class="loginUsing googlePlus marginTop10" ng-click = "register(currentUser)" data-dismiss="modal">register</button>
							</form>
                           
                        </div>
                    </div>
                </div>
                {{--<div class="modal-footer popupFooter">
                    <div class="leftButtonsArea">
                        <button type="button" class="capitalize greyButton" data-dismiss="modal">cancel</button>
                        <button type="button" class="capitalize greyButton">ok</button>
                    </div>
                </div>--}}
            </div>

        </div>
    </div>
    <!---->

    <!--add location popup-->
    <div class="modal fade" id="myModalLocation" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header popupHeader">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title capitalize">add location</h4>
                </div>
                <div class="modal-body popupBody leftContent littleInputs">
                    <div class="inputsBlocks">
                        <div class="inputBlock">
                            <div class="titleInput">Name</div>
                            <input class="capitalize lightInput" type="text" placeholder="name"/>
                        </div>
                        <div class="inputBlock">
                            <div class="titleInput">address</div>
                            <input class="capitalize lightInput" type="text" placeholder="address"/>
                        </div>
                        <div class="inputBlock">
                            <div class="titleInput">phone number</div>
                            <input class="capitalize lightInput" type="text" placeholder="phone number"/>
                        </div>
                        <div class="inputBlock">
                            <div class="titleInput">description</div>
                            <textarea placeholder="description"></textarea>
                        </div>
                        <div class="inputBlock">
                            <div class="titleInput">website</div>
                            <input class="capitalize lightInput" type="text" placeholder="website"/>
                        </div>
                        <div class="inputBlock">
                            <div class="titleInput">e-mail</div>
                            <input class="capitalize lightInput" type="text" placeholder="e-mail"/>
                        </div>
                    </div>
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

    <!--add master popup-->
    <div class="modal fade" id="myModalMaster" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header popupHeader">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title capitalize">add master</h4>
                </div>
                <form>
                    <div class="modal-body popupBody leftContent littleInputs">
                        <div class="inputsBlocks">
                            <div class="inputBlock">
                                <div class="titleInput">Name</div>
                                <input class="capitalize lightInput" type="text" placeholder="name"/>
                            </div>
                            <div class="inputBlock">
                                <div class="titleInput">sureName</div>
                                <input class="capitalize lightInput" type="text" placeholder="sureName"/>
                            </div>
                            <div class="inputBlock">
                                <div class="titleInput">gender</div>
                                <div class="genderInputs">
                                    <div class="genderSection">
                                        <span class="male">male</span>
                                        <input class="capitalize lightInput" type="radio" name="gender" value="male"/>
                                    </div>
                                    <div class="genderSection">
                                        <span class="female">female</span>
                                        <input class="capitalize lightInput" type="radio" name="gender" value="female"/>
                                    </div>
                                </div>
                            </div>
                            <div class="inputBlock">
                                <div class="titleInput">phone number</div>
                                <input class="capitalize lightInput" type="text" placeholder="phoneNumber"/>
                            </div>
                            <div class="inputBlock">
                                <div class="titleInput">description</div>
                                <textarea placeholder="description"></textarea>
                            </div>
                            <div class="inputBlock">
                                <div class="titleInput">website</div>
                                <input class="capitalize lightInput" type="text" placeholder="website"/>
                            </div>
                            <div class="inputBlock">
                                <div class="titleInput">e-mail</div>
                                <input class="capitalize lightInput" type="text" placeholder="e-mail"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer popupFooter">
                        <div class="leftButtonsArea">
                            <button type="button" class="capitalize greyButton" data-dismiss="modal">cancel</button>
                            <button type="button" class="capitalize greyButton">ok</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            $(".fancybox").fancybox();
        });
    </script>
    <!---->
</body>
</html>