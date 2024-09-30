<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="email" content="">
    <meta name="profile" content="">
    <meta name="name" content="School Dekho">
    <meta name="type" content="School Search Portal">
    <meta name="title" content="School Dekho - India's First Search Engine for School Admissions">
    <meta name="keywords" content="">
    <title>
        {{$schooldetails->name}} Application Form | School Dekho | Best School near me | Indias first school search portal | Dekho Phir Chuno
    </title>
    <link rel="icon" href="{{asset('assets')}}/images/favicon.png">
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/font-awesome/fontawesome.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/slick.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/main.css">
    <style>
        div.sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 0;

        }

        .single-banner::before {
            background: #fff;
        }

        .product-title {
            margin-bottom: 0px;
        }

        .product-media::before {

            background: linear-gradient(rgba(0, 0, 0, 0) 100%, rgba(0, 0, 0, 0) 100%) !important;
        }

        @media (max-width: 575px) {
            .single-banner {
                padding: 15px 0px 0px;
            }

            .product-type {
                right: 47px;
            }

            .single-content {
                padding-top: 10px;
                padding-bottom: 20px;

            }

            .match-suggest {
                padding-bottom: 10px;
                text-align: center;
            }
        }

        @media (min-width: 900px) {
            .product-card {
                border-left: 3px solid #007bff;
            }

            .single-content {
                padding-top: 40px;
                padding-bottom: 30px;
                text-align: left;
            }

            .single-banner {
                padding: 10px 0px;
            }

            .inner-section {
                margin-bottom: 30px;
            }

            .ad-standard .product-card.standard .product-img img {
                width: 120px;
            }

            .ad-standard .product-card.standard .product-media {
                margin: 10px 10px;
            }

            .product-type {
                right: 30px;
            }

            .match-suggest {
                padding-bottom: 10px;
                text-align: left;

            }

            .inner-section {
                padding-top: 20px;
                border-top: 1px solid #eee;
            }
        }

        .form-control {
            background-color: #fff;
            border: 1px solid #eee
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    @include('layouts.frontend.partials.header')

    <div ng-app="myApp" ng-controller="myCtrl" style="margin: 10px;width:75%;margin:auto auto">
        <ng-template ng-show="fields.length>0">
            <form ng-submit="submitData()">
                <input type="hidden" name="school_id" value="{{$school_id}}" />

                <div class="justify-aligns-center col-lg-9" style="margin: 30px auto;">
                    <div class="dash-avatar">
                        <a href="#"><img src="{{$schooldetails->school_logo}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                    </div>

                    <div class="dash-intro">
                        <h4><a href="#">{{$schooldetails->name}}</a> <i class="fas fa-check-circle text-primary" title="Verified by School Dekho"></i></h4>
                        <!--h4><a href="#">Loreto Day School(Kolkata)</a> <i class="fas fa-question-circle text-muted"></i> <a href ="#" class = "text-secondary" style = "font-size: .8rem; font-style = "italic">Claim this School</a></h4-->
                        <h5><i class="fas fa-map-marker-alt"></i> {{$schooldetails['address']->address}}</h5>
                    </div>

                </div>

                <div ng-repeat="(sectionIndex, section) in fields" style="border:1px solid #eee;margin:10px;padding:10px">
                    <h3>@{{section.section}}</h3>

                    <div class="form-row">


                        <div class="form-group col-md-6" ng-repeat="(elementIndex, element) in section.elements">
                            <label for="inputAddress">@{{element.label}} <sup ng-if="element.option.is_required">*</sup> </label>

                            <ng-template ng-if="(element.type=='text') || (element.type=='email')||(element.type=='date') ||(element.type=='number')">
                                <input type="@{{element.type}}" class="form-control" name="@{{element.name}}" ng-model="element.value" required="@{{element.option.is_required}}" placeholder="@{{element.label}}">
                            </ng-template>

                            <ng-template ng-if="element.type=='file'">
                                <input type="file" class="form-control" name="@{{element.name}}" file-model="element.value" required="@{{element.option.is_required}}">
                            </ng-template>

                            <ng-template ng-if="(element.type=='textarea')">
                                <textarea class="form-control" name="@{{element.name}}" required="@{{element.option.is_required}}" ng-model="element.value">
                            </textarea>
                            </ng-template>
                            <ng-template ng-if="element.type=='radio'">
                                <div class="form-control" style="align-items: center;display:flex">
                                    <span ng-repeat="menu in element.menu" style="margin: 5px;">
                                        <input type="radio" value="@{{menu}}" name="@{{element.name}}" required="@{{element.option.is_required}}" ng-model="element.value">@{{menu}}
                                    </span>
                                </div>
                            </ng-template>
                            <ng-template ng-if="element.type=='checkbox'">
                                <div class="form-control" style="align-items: center;display:flex">
                                    <span ng-repeat="menu in element.menu" style="margin: 5px;">
                                        <input type="checkbox" ng-checked="@{{GetSelectedStatus(element.value,menu)}}" ng-click="SetSelectedItem(sectionIndex,elementIndex,menu)">@{{menu}}
                                    </span>
                                </div>
                            </ng-template>
                            <ng-template ng-if="element.type=='select'">
                                <select name="@{{element.name}}" class="form-control" required="@{{element.option.is_required}}" ng-model="element.value">
                                    <option value="">Select</option>
                                    <option value="@{{menu}}" ng-repeat="menu in element.menu">@{{menu}}</option>
                                </select>
                            </ng-template>


                        </div>

                    </div>

                </div>

                <div style="display: flex;justify-content:center;margin-bottom:10px" class="col-12">
                    <button class="btn btn-md btn-primary" type="submit">SUBMIT</button>
                </div>

            </form>
        </ng-template>
        <div ng-show="fields.length==0" style="margin: 10px;display:flex;
        align-items:center;justify-content:center;border:1px solid red;height:150px;color:red">
            <h3 style="color: red">Application form not available</h3>
        </div>
    </div>
</body>
@include('layouts.frontend.partials.footer')
<div class="modal fade" id="currency">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Choose a Currency</h4>
                <button class="fas fa-times" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <button class="modal-link active">United States Doller (USD) - $</button>
                <button class="modal-link">Euro (EUR) - €</button>
                <button class="modal-link">British Pound (GBP) - £</button>
                <button class="modal-link">Australian Dollar (AUD) - A$</button>
                <button class="modal-link">Canadian Dollar (CAD) - C$</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="language">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Choose a Language</h4>
                <button class="fas fa-times" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <button class="modal-link active">English</button>
                <button class="modal-link">bangali</button>
                <button class="modal-link">arabic</button>
                <button class="modal-link">germany</button>
                <button class="modal-link">spanish</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets')}}/js/vendor/jquery-1.12.4.min.js"></script>
<script src="{{asset('assets')}}/js/vendor/popper.min.js"></script>
<script src="{{asset('assets')}}/js/vendor/bootstrap.min.js"></script>
<script src="{{asset('assets')}}/js/vendor/slick.min.js"></script>
<script src="{{asset('assets')}}/js/custom/slick.js"></script>
<script src="{{asset('assets')}}/js/custom/main.js"></script>
<script src="{{asset('assets')}}/js/angular.min.js"></script>
<script src="{{asset('assets')}}/js/sweetalert.min.js"></script>

@if($message = Session::get("msg"))
<script>
    swal("No School added", "Please add school for comparison", "warning");
</script>

@endif

<script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope, $http) {
        $scope.fields = [];
        var elements = document.getElementsByTagName('input');
        get_fields();

        function get_fields() {
            $http({
                url: `/school/applicationform/fields?school_id=${elements['school_id'].value}`,
                method: 'GET'
            }).then(res => {
                var response = res.data;
                if (response.is_success) {
                    $scope.fields = response.data
                }
            })
        }

        $scope.submitData = function() {
            //console.log($scope.fields);


            $http({
                url: "/school/application/save",
                data: {
                    school_id: elements['school_id'].value,
                    fields: $scope.fields
                },
                method: "POST",

            }).then(res => {
                var response = res.data;
                swal("Success!", response.message, "success");

                setInterval(function() {
                    window.history.go(-1);
                }, 2000)
            }, error => {
                swal("Warning!", error, "warning");
            })
        }

        $scope.GetSelectedStatus = function(items, value) {
            if (!items) {
                return false;
            }
            return items.includes(value);
        }


        $scope.SetSelectedItem = function(selection_index, element_index, value) {

            var fields = $scope.fields;
            var section = fields[selection_index];
            var element = section.elements[element_index];
            var values = (element.value) ? element.value : [];
            var index = values.indexOf(value);
            if (index < 0) {
                values.push(value);
            } else {
                values.splice(index, 1);
            }
            element.value = values;
            $scope.fields = fields;
        }

        $scope.SetFile = function(selected_index, element_index, value) {
            debugger;
            console.log(value);
        }
    });


    app.directive('fileModel', ['$parse', function($parse) {
        return {
            restrict: 'A',
            link: function(scope, element, attrs) {
                var model = $parse(attrs.fileModel);
                var modelSetter = model.assign;

                element.bind('change', function() {
                    scope.$apply(function() {
                        getBase64(element[0].files[0]).then(
                            data => {
                                modelSetter(scope, data);
                            }
                        );

                    });
                });
            }
        };
    }]);


    function getBase64(file) {


        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
        });
    }
</script>
<script>
    $("#search_key_header").keyup(function() {
        var keyword = $(this).val();
        $.ajax({
            type: "GET",
            url: `/school/search?key=${keyword}`,
            success: function(data) {
                if (keyword.length > 0) {
                    $("#suggesstion-box-header").show();
                    $("#suggesstion-box-header").html(data);
                    $("#search-box").css("background", "#FFF");
                } else {
                    $("#suggesstion-box-header").hide();
                }
            }
        });
    })
</script>