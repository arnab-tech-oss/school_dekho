@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
    <div class="container">
        <h4 class="dashboard-title">My Schools</h4>
        <!-- Dashboard My Courses Start -->
        <!-- Dashboard My Courses End -->
        <div class="contentbar" ng-app="myApp" ng-controller="myCtrl">
            {{-- <div class="col-md-6"> --}}
            <div class="card m-b-10">
                <div class="card-header">
                    <h5 class="card-title">Add Application Form</h5>
                    <div>
                        <input type="hidden" id="school_id" value="{{ $school_id }}" />
                        <input type="hidden" id="id" />
                        @if ($is_verified && sizeof($payment_status) > 0)
                            <button class="btb btn-primary" ng-click="popUpWindowSection()">Add</button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        {{ csrf_field() }}
                        <div ng-repeat="(sectionIndex, section) in list">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <h3 for="inputEmail4">@{{ section.section }}</h3>
                                </div>
                                <div class="form-group col-md-6">
                                    <div style="display: flex;align-items:center;padding-top:35px;">
                                        @if ($is_verified && sizeof($payment_status) > 0)
                                            <button type="button" class="btn" ng-click="popUpWindow(sectionIndex)"><i
                                                    class="fa fa-plus text-primary"></i></button>
                                            <button type="button" class="btn"
                                                ng-click="popUpWindowSection(sectionIndex,section)"><i
                                                    class="fa fa-pencil text-primary"></i></button>
                                            <button type="button" class="btn"
                                                ng-click="removeElementSection(sectionIndex)"><i
                                                    class="fa fa-trash text-danger"></i></button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form_custom" ng-repeat="data in section.elements track by $index">
                                <div
                                    ng-if="data.type=='text' ||data.type=='email'||data.type=='number'||data.type=='file'||data.type=='date'">
                                    <!-- <input type="text" name="@{{ data.name }}" /> -->
                                    <div class="form-row" style="display: flex;">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">@{{ data.label }}</label>
                                            <input type="@{{ data.type }}" class="form-control"
                                                name="@{{ data.name }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div style="display: flex;align-items:center;padding-top:35px;">
                                                @if ($is_verified && sizeof($payment_status) > 0)
                                                    <button type="button" class="btn"
                                                        ng-click="popUpWindow(sectionIndex,$index, data)"><i
                                                            class="fa fa-pencil text-primary"></i></button>
                                                    <button type="button" class="btn"
                                                        ng-click="removeElement(sectionIndex,$index)"><i
                                                            class="fa fa-trash text-danger"></i></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div ng-if="data.type=='textarea'">
                                    <div class="form-row" style="display: flex;">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">@{{ data.label }}</label>
                                            <textarea class="form-control" name="@{{ data.name }}"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div style="display: flex;align-items:center;padding-top:35px;">
                                                @if ($is_verified && sizeof($payment_status) > 0)
                                                    <button type="button" class="btn"
                                                        ng-click="popUpWindow(sectionIndex,$index,data)"><i
                                                            class="fa fa-pencil text-primary"></i></button>
                                                    <button type="button" class="btn"
                                                        ng-click="removeElement(sectionIndex,$index)"><i
                                                            class="fa fa-trash text-danger"></i></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div ng-if="data.type=='radio'">
                                    <div class="form-row" style="display: flex;">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">@{{ data.label }}</label>
                                            <div class="form-control">
                                                <span ng-repeat="radio in data.menu">
                                                    <input type="radio" name="@{{ data.name }}"
                                                        value="@{{ radio }}" /> @{{ radio }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div style="display: flex;align-items:center;padding-top:35px;">
                                                @if ($is_verified && sizeof($payment_status) > 0)
                                                    <button type="button" class="btn"
                                                        ng-click="popUpWindow(sectionIndex,$index,data)"><i
                                                            class="fa fa-pencil text-primary"></i></button>
                                                    <button type="button" class="btn"
                                                        ng-click="removeElement(sectionIndex,$index)"><i
                                                            class="fa fa-trash text-danger"></i></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div ng-if="data.type=='select'">
                                    <div class="form-row" style="display: flex;">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">@{{ data.label }}</label>
                                            <select name="@{{ data.name }}" class="form-control">
                                                <option value="@{{ select }}" ng-repeat="select in data.menu">
                                                    @{{ select }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div style="display: flex;align-items:center;padding-top:35px;">
                                                @if ($is_verified && sizeof($payment_status) > 0)
                                                    <button type="button" class="btn"
                                                        ng-click="popUpWindow(sectionIndex,$index,data)"><i
                                                            class="fa fa-pencil text-primary"></i></button>
                                                    <button type="button" class="btn"
                                                        ng-click="removeElement(sectionIndex,$index)"><i
                                                            class="fa fa-trash text-danger"></i></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div ng-if="data.type=='checkbox'" style="display: flex;">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">@{{ data.label }}</label>
                                            <div class="form-control">
                                                <span ng-repeat="checkbox in data.menu">
                                                    <input type="checkbox" name="@{{ data.name }}[]"
                                                        value="@{{ checkbox }}" /> @{{ checkbox }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div style="display: flex;align-items:center;padding-top:35px;">
                                                @if ($is_verified && sizeof($payment_status) > 0)
                                                    <button type="button" class="btn"
                                                        ng-click="popUpWindow(sectionIndex,$index,data)"><i
                                                            class="fa fa-pencil text-primary"></i></button>
                                                    <button type="button" class="btn"
                                                        ng-click="removeElement(sectionIndex,$index)"><i
                                                            class="fa fa-trash text-danger"></i></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                @if ($is_verified && sizeof($payment_status) > 0)
                                    <button type="button" ng-click="ApplicationSubmit()" class=" btn btn-primary">
                                        <span ng-if="!id">Save</span>
                                        <span ng-if="id">Update</span>
                                        &raquo;</button>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form ng-submit="controlSubmit()">
                                        <div class="form-row">
                                            <!-- <div class="form-group col-md-6">
                                                                                                                                                                    <label for="inputEmail4">Name of The Field</label>
                                                                                                                                                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Enter name of the field" ng-model="name">
                                                                                                                                                                </div> -->
                                            <div class="form-group col-md-6">
                                                <label>Name of Field Label</label>
                                                <input type="text" class="form-control" id="inputEmail4"
                                                    placeholder="Name of Field Label" ng-model="label">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Select Field Type</label>
                                                <select id="inputState" class="form-control" ng-model="type">
                                                    <option selected>Choose...</option>
                                                    <option value="text">Text</option>
                                                    <option value="email">Email</option>
                                                    <option value="number">Number</option>
                                                    <option value="select">Dropdown</option>
                                                    <option value="checkbox">Checkbox</option>
                                                    <option value="radio">Radio</option>
                                                    <option value="textarea">Text Area</option>
                                                    <option value="date">Date</option>
                                                    <option value="file">File</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6" style="padding-top: 20px;">
                                                <label>Is Required</label>
                                                <input type="checkbox" ng-model="is_required">
                                            </div>
                                        </div>
                                        <div class="form-row" ng-if="type=='number'">
                                            <div class="form-group col-md-6">
                                                <label>Max Length</label>
                                                <input type="text" class="form-control" id="inputEmail4"
                                                    ng-model="max_length" placeholder="Enter Max length of field">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Min Length</label>
                                                <input type="text" class="form-control" id="inputEmail4"
                                                    ng-model="min_length" placeholder="Enter Min length of field">
                                            </div>
                                        </div>
                                        <div class="form-row"
                                            ng-show="type=='select' || type=='checkbox' || type=='radio'">
                                            <div class="form-group col-md-12">
                                                <label>Menu</label>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="menu_name"
                                                            placeholder="Menu Name" ng-model="menu_name">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button type="button" class="btn btn-primary"
                                                            ng-click="addmenu()">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <span ng-repeat="x in menu track by $index"><strong>@{{ x }}&nbsp;<i
                                                            class="fa fa-trash text-danger"
                                                            ng-click="deleteMenu($index)"></i></strong></span> &nbsp;
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">
                                        <span ng-if="element_index>=0">Update</span>
                                        <span ng-if="element_index==null || element_index==undefined">Save</span>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="mySectionModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" id="close-modal" class="close"
                                        data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form ng-submit="controlSubmitSection()">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">Name of The Section</label>
                                                <input type="text" class="form-control" id="inputEmail4"
                                                    placeholder="Enter name of the field" ng-model="section">
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">
                                        <span ng-if="element_index_section>=0">Update</span>
                                        <span ng-if="element_index_section==null || element_index==undefined">Save</span>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                                        id="close-modal-button">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $('#close-modal').on('click', function() {
            $("#mySectionModal").hide();
            $(".modal-backdrop").hide();
            location.reload();
        });
        $('#close-modal-button').on('click', function() {
            $("#mySectionModal").hide();
            $(".modal-backdrop").hide();
            location.reload();
        });
    </script>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push('js')
@endpush
<script src="{{ asset('assets') }}/js/angular.min.js"></script>
<script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope, $http) {
        $scope.list = [];
        $scope.element_index = null;
        $scope.element_index_section = null;
        $scope.id = "";
        bindData();

        function bindData(model) {
            if (!model) {
                model = {};
            }
            $scope.name = model.name ?? "";
            $scope.label = model.label ?? "";
            $scope.is_required = model.option?.is_required ?? false;
            $scope.pattern = model.option?.pattern ?? "";
            $scope.max_length = model.option?.max_length ?? "";
            $scope.min_length = model.option?.min_length ?? "";
            $scope.menu = model.menu ?? [];
            $scope.type = model.type ?? "text";
            $scope.menu_name = "";
        }
        $scope.popUpWindow = function(secion_index, index, data) {
            $scope.element_index_section = secion_index;
            $scope.element_index = index;
            bindData(data);
            $('#myModal').modal('show');
        }
        $scope.popUpWindowSection = function(index, data) {
            $scope.element_index_section = index;
            bindSectionData(data);
            $('#mySectionModal').modal('show');
            $("#mySectionModal").show();
            $(".modal-backdrop").show();
        }

        function bindSectionData(model) {
            if (!model) {
                model = {};
            }
            $scope.section = model.section ?? "";
        }
        $scope.addmenu = function() {
            let menu = $scope.menu;
            menu.push($scope.menu_name);
            $scope.menu = menu;
            $scope.menu_name = "";
        }
        $scope.deleteMenu = function(index) {
            var menu = $scope.menu;
            menu.splice(index, 1);
            $scope.menu = menu;
        }
        $scope.saveElement = function() {
            var list = $scope.list;
            var section = list[$scope.element_index_section];
            var element = {};
            element.name = $scope.label.replace(/[`~!@#$%^&*()\-+=\[\]{};:'"\\|\/,.<>?\s]/g, '_')
                .toLowerCase();
            element.label = $scope.label;
            element.type = $scope.type;
            var option = {};
            option.is_required = $scope.is_required;
            option.min_length = $scope.min_length;
            option.max_length = $scope.max_length;
            element.option = option;
            element.menu = $scope.menu;
            section.elements.push(element);
            $scope.list = list;
        }
        $scope.removeElement = function(section_index, index) {
            if (!confirm("Are you sure?")) {
                return;
            }
            var list = $scope.list;
            list[section_index].elements.splice(index, 1);
            $scope.list = list;
        }
        $scope.removeElementSection = function(index) {
            if (!confirm("Are you sure?")) {
                return;
            }
            debugger
            var list = $scope.list;
            list.splice(index, 1);
            $scope.list = list;
        }
        $scope.controlSubmit = function() {
            if ($scope.element_index >= 0) {
                $scope.updateElement();
            } else {
                $scope.saveElement();
            }
            $('#myModal').modal('hide');
        }
        $scope.updateElement = function() {
            var list = $scope.list;
            var section = list[$scope.element_index_section];
            var element = section.elements[$scope.element_index];
            element.name = $scope.label.replace(/[`~!@#$%^&*()\-+=\[\]{};:'"\\|\/,.<>?\s]/g, '_')
                .toLowerCase();
            element.label = $scope.label;
            element.type = $scope.type;
            var option = {};
            option.is_required = $scope.is_required;
            option.min_length = $scope.min_length;
            option.max_length = $scope.max_length;
            element.option = option;
            element.menu = $scope.menu;
            $scope.list = list;
            $scope.element_index_section = -1;
            $scope.element_index = -1;
        }
        $scope.controlSubmitSection = function() {
            if ($scope.element_index_section >= 0) {
                $scope.updateSectionElement();
            } else {
                $scope.saveSectionElement();
            }
            $('#mySectionModal').modal('hide');
        }
        $scope.updateSectionElement = function() {
            var list = $scope.list;
            var element = list[$scope.element_index_section];
            element.section = $scope.section;
            $scope.list = list;
            $scope.element_index_section = -1;
            $scope.element_index = -1;
        }
        $scope.saveSectionElement = function() {
            var list = $scope.list;
            var section = {};
            section.section = $scope.section;
            section.elements = [];
            list.push(section);
            $scope.list = list;
        }
        ApplicationDetails();

        function ApplicationDetails() {
            var school_id = document.getElementById('school_id').value;
            $http({
                method: 'GET',
                url: `/school/application/form/details/${school_id}`
            }).then(res => {
                var data = res.data;
                if (!data.is_success) {
                    return;
                }
                $scope.id = data.data.id;
                $scope.list = data.data.fields;
                //console.log(JSON.stringify($scope.list));
            })
        }
        $scope.ApplicationSubmit = function() {
            var id = $scope.id;
            var url = "";
            if (id > 0) {
                url = "/school/application/form/update"
            } else {
                url = "/school/application/form/create";
            }
            var list = $scope.list;
            var model = {
                school_id: document.getElementById("school_id").value,
                fields: list,
                id: id
            };
            $http({
                method: 'POST',
                url: url,
                data: model
            }).then(res => {
                //alert(res.data.data?.message)
                //console.log(res.data);
                window.location.reload();
            })
        }
    });
</script>
