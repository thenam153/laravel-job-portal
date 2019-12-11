
<div class="animated fadeIn" ng-app="appme" ng-controller="projectController">  
  <div class="row" ng-init="csrf ='{{csrf_token()}}'">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <strong class="card-title"> </strong>
        </div>
        <div class="card-body">
          <table id="table-project" ng-table='project' class="table table-striped table-bordered">
          <colgroup>
            <col width="5%" />
            <col width="20%" />
            <col width="5%" />
            <col width="15%" />
            <col width="20%" />
            <col width="10%" />
            <col width="15%" />
            <col width="5%" />
            <col width="5%" />
          </colgroup>
              <tr ng-repeat="data in $data" ng-init="data.show=true;"> 
                <td style="text-align:center">
                        {%$index+ 1%}
                </td>
                <td title="'Tên dự án'" style="text-align:center" filter="{ name: 'text'}" sortable="'name'">
                       {%data.name%}
                </td>
                <td title="'Id'" style="text-align:center" filter="{ id: 'number'}" sortable="'id'">
                    {%data.id%}
                </td>
                <td title="'Tên người dùng'" style="text-align:center" filter="{ nameUser: 'text'}" sortable="'nameUser'">
                    {%data.nameUser%}
                </td>
                <td title="'Nội dung'" style="text-align:center" filter="{ content: 'text'}" sortable="'content'">
                    {%data.content%}
                </td>
                <td title="'Kĩ năng'" style="text-align:center" filter="{ skills: 'text'}" sortable="'skills'">
                    {%data.skills%}
                </td>
                <td title="'Giá '" style="text-align:center" filter="{ price: 'number'}" sortable="'price'">
                    {%data.price%}
                </td>
                <td title="'Trạng thái'" style="text-align:center" filter="{ status: 'text'}" sortable="'status'">
                    {%data.status%}
                </td>
                <td style="text-align:center;color:red"><i ng-click="delete(data)" style="cursor: pointer;font-size: 25px" class="menu-icon ti-trash"></i></td>
              </tr>
            
          </table>
        </div>
      </div>
    </div>


  </div>
</div><!-- .animated -->