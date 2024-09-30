@extends('layouts.frontend.app')
@push('css') 
  <META NAME = "robots" CONTENT = "noindex,nofollow"/>
@endpush
@section('content')<style>
    .section-padding-02 {
        margin-top: 0 !important;
    }

    .h-margin {
        margin-top: 65px;
    }

    .myApp {
        background: #fff;
    }

    form-row {
        display: flex;
        flex-wrap: wrap;
    }
</style>
<div class="tutor-course-top-info section-padding-40 section-padding-02  bg-color-11">
    <div class="container h-margin custom-container">
        <div class="row">
            <div class="col-lg-12">
                <div style="background: #fff" class="account-card alert fade show">
                    <div ng-app="myApp" ng-controller="myCtrl" style="margin: 10px;width:100%;margin:auto auto;">
                        <ng-template ng-show="fields.length>0">
                            <form ng-submit="submitData()">
                                <input type="hidden" name="school_id" value="{{ $school_id }}" />
                                <div style="display :flex ;justify-content: center;margin-bottom: 28px;
                                padding-bottom: 4px;
                                border-bottom: 2px solid #fbfbfb;">
                                    <div style="gap:8px"
                                        class="dash-header-left mt-4 p-4 d-flex justify-content-around ">
                                        <div style="height: 75px;
                                        width: 75px;" class="dash-avatar">
                                            <a href="#"><img src="{{ $schooldetails->school_logo }}"
                                                    alt="{{ $schooldetails->name }}"></a>
                                        </div>
                                        <div class=""
                                            style="text-align: left; margin-top:auto;margin-bottom:auto; margin-right: auto">
                                            <h4><a href="#">{{ $schooldetails->name }}</a></h4>
                                            <p class="gcolor">
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $schooldetails['address']->address }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center ">
                                    <div class="dash-avatar">
                                        <h3 class="mb-2">Enquiry Form</h3>
                                    </div>
                                </div>
                                <div ng-repeat="(sectionIndex, section) in fields" style="">
                                    <!--<h5>@{{ section.section }}</h5>-->
                                    <div style="display: flex; flex-wrap: wrap; " class="form-row">
                                        <div class="form-group col-md-6 p-2"
                                            ng-repeat="(elementIndex, element) in section.elements">
                                            <label for="inputAddress">@{{ element.label }} <sup
                                                    ng-if="element.option.is_required">*</sup>
                                            </label>
                                            <ng-template
                                                ng-if="(element.type=='text') || (element.type=='email')||(element.type=='date') ||(element.type=='number')">
                                                <input type="@{{ element.type }}" class="form-control"
                                                    name="@{{ element.name }}" ng-model="element.value"
                                                    required="@{{ element.option.is_required }}"
                                                    placeholder="@{{ element.label }}">
                                            </ng-template>
                                            <ng-template ng-if="element.type=='file'">
                                                <input type="file" class="form-control" name="@{{ element.name }}"
                                                    file-model="element.value"
                                                    required="@{{ element.option.is_required }}">
                                            </ng-template>
                                            <ng-template ng-if="(element.type=='textarea')">
                                                <textarea class="form-control" name="@{{ element.name }}"
                                                    required="@{{ element.option.is_required }}"
                                                    ng-model="element.value"> </textarea>
                                            </ng-template>
                                            <ng-template ng-if="element.type=='radio'">
                                                <div class="form-control" style="align-items: center;display:flex">
                                                    <span ng-repeat="menu in element.menu" style="margin: 5px;">
                                                        <input type="radio" value="@{{ menu }}"
                                                            name="@{{ element.name }}"
                                                            required="@{{ element.option.is_required }}"
                                                            ng-model="element.value">@{{ menu }}
                                                    </span>
                                                </div>
                                            </ng-template>
                                            <ng-template ng-if="element.type=='checkbox'">
                                                <div class="form-control" style="align-items: center;display:flex">
                                                    <span ng-repeat="menu in element.menu" style="margin: 5px;">
                                                        <input type="checkbox"
                                                            ng-checked="@{{ GetSelectedStatus(element.value, menu) }}"
                                                            ng-click="SetSelectedItem(sectionIndex,elementIndex,menu)">@{{
                                                        menu }}
                                                    </span>
                                                </div>
                                            </ng-template>
                                            <ng-template ng-if="element.type=='select'">
                                                <select name="@{{ element.name }}" class="form-control"
                                                    required="@{{ element.option.is_required }}"
                                                    ng-model="element.value">
                                                    <option value="">Select</option>
                                                    <option value="@{{ menu }}" ng-repeat="menu in element.menu">
                                                        @{{ menu }}</option>
                                                </select>
                                            </ng-template>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:  flex;;margin-bottom:10px ;margin-top:10px" class="col-6 p-2">
                                    <button class="btn btn-md btn-primary" type="submit">SUBMIT</button>
                                </div>
                            </form>
                        </ng-template>
                        <!--                <div ng-show="fields.length==0"-->
                        <!--                    style="margin: 10px;display:flex;-->
                        <!--align-items:center;justify-content:center;border:1px solid red;height:150px;color:red">-->
                        <!--                    <h3 style="color: red">Application form not available</h3>-->
                        <!--                </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/front/js/vendor/angular.min.js') }}"></script>
@if ($message = Session::get('msg'))
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
@endpush