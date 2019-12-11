
<div class="animated fadeIn" ng-app="appme" ng-controller="commentController">  
  <div class="row" ng-init="csrf ='{{csrf_token()}}'">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <strong class="card-title"> </strong>
        </div>
        <div class="card-body">
          <table id="table-comment" ng-table='comment' class="table table-striped table-bordered">
          <colgroup>
            <col width="5%" />
            <col width="25%" />
            <col width="25%" />
            <col width="35%" />
            <col width="10%" />
          </colgroup>
          <tr ng-repeat="data in $data" ng-init="data.show=true;"> 
                <td style="text-align:center">
                        {%$index+ 1%}
                </td>
                <td title="'Người bình luận'" style="text-align:center" filter="{ email: 'text'}" sortable="'user.name'">
                       {%data.user.name%}
                </td>
                <td title="'Dự án'" style="text-align:center" filter="{ id: 'text'}" sortable="'project.name'">
                    {%data.project.name%}
                </td>
                <td title="'Nội dung'" style="text-align:center" filter="{ phone: 'text'}" sortable="'phone'">
                    {%data.content%}
                </td>
                <td style="text-align:center;color:red"><i ng-click="delete(data)" style="cursor: pointer;font-size: 25px" class="menu-icon ti-trash"></i></td>
              </tr>
          </table>
        </div>
      </div>
    </div>


  </div>
</div><!-- .animated -->