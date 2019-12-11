
<div class="animated fadeIn" ng-app="appme" ng-controller="userController">  
  <div class="row" ng-init="csrf ='{{csrf_token()}}'">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <strong class="card-title"> </strong>
        </div>
        <div class="card-body">
          <table id="table-user" ng-table='user' class="table table-striped table-bordered">
          <colgroup>
          <col width="5%" />
            <col width="25%" />
            <col width="20%" />
            <col width="5%" />
            <col width="10%" />
            <col width="10%" />
            <col width="5%" />
            <col width="10%" />
            <col width="10%" />
          </colgroup>
          <tr ng-repeat="data in $data" ng-init="data.show=true;"> 
                <td style="text-align:center">
                        {%$index+ 1%}
                </td>
                <td title="'Tên'" style="text-align:center" filter="{ name: 'text'}" sortable="'name'">
                    <div ng-show="data.show && (data.new || data.new == null)" >
                       {%data.name%}
                    </div>
                    <div  ng-hide="data.show && (data.new || data.new == null)" >
                        <input type="text" ng-model="data.name" class="form-control" >
                    </div>
                </td>
                <td title="'Email'" style="text-align:center" filter="{ email: 'text'}" sortable="'email'">
                    <div >
                       {%data.email%}
                    </div>
                </td>
                <td title="'Id'" style="text-align:center" filter="{ id: 'number'}" sortable="'id'">
                    {%data.id%}
                </td>
                <td title="'Số ĐT'" style="text-align:center" filter="{ phone: 'text'}" sortable="'phone'">
                    {%data.phone%}
                </td>
                <td title="'Chức vụ'" style="text-align:center" filter="{ level: 'number'}" sortable="'level'">
                    <div ng-show="data.show">
                       <div ng-show="data.level.value == 2">Admin</div>
                       <div ng-show="data.level.value == 1">Người dùng</div>
                       <div ng-show="data.level.value == 0">Chưa xác nhận</div>
                    </div>
                    <div ng-hide="data.show " >
                        <select class="form-control" id="mySelect"
                                ng-options="option.text for option in taskUser track by option.value"
                                ng-model="data.level"></select>
                    </div>
                </td>
                <td title="'Số dự án'" style="text-align:center" filter="{ phone: 'text'}" sortable="'phone'">
                    {%data.projects.length%}
                </td>
                <td style="text-align:center;color:red"><i ng-click="change(data)" style="cursor: pointer;font-size: 25px" class="menu-icon " ng-class="{'ti-save-alt':!(data.show ),'ti-pencil':data.show }"></i></td>
                <td style="text-align:center;color:red"><i ng-click="delete(data)" style="cursor: pointer;font-size: 25px" class="menu-icon ti-trash"></i></td>
              </tr>
          </table>
        </div>
      </div>
    </div>


  </div>
</div><!-- .animated -->