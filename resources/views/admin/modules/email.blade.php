
<div class="animated fadeIn" ng-app="appme" ng-controller="emailController">  
  <div class="row" ng-init="csrf ='{{csrf_token()}}'">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <strong class="card-title"> </strong>
        </div>
        <div class="card-body">
          <table id="table-email" ng-table='email' class="table table-striped table-bordered">
          <colgroup>
          <col width="5%" />
            <col width="50%" />
            <col width="25%" />
            <col width="20%" />
          </colgroup>
          <tr ng-repeat="data in $data" ng-init="data.show=true;"> 
                <td style="text-align:center">
                        {%$index+ 1%}
                </td>
                <td title="'Email'" style="text-align:center" filter="{ email: 'text'}" sortable="'email'">
                    <div >
                       {%data.email%}
                    </div>
                </td>
                <td style="text-align:center;color:red"><i ng-click="send(data)" style="cursor: pointer;font-size: 25px" class="menu-icon fa fa-step-forward"></i></td>
                <td style="text-align:center;color:red"><i ng-click="delete(data)" style="cursor: pointer;font-size: 25px" class="menu-icon ti-trash"></i></td>
              </tr>
          </table>
        </div>
      </div>
    </div>


  </div>
</div><!-- .animated -->