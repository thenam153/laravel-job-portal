
<div class="animated fadeIn" ng-app="appme" ng-controller="categoryController">  
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Thêm mới danh mục
        </div>
        <div class="card-body">
          <form ng-init="csrf='{{csrf_token()}}'" enctype="multipart/form-data">
            <div class="form-group col-sm-12">
              <label for="name" class=" form-control-label">
                <b>Tên danh mục</b>
              </label>
              <input type="text" id="name" ng-model='name' placeholder="Tên danh mục" class="form-control">
            </div>
            <div class="form-group col-sm-12">
              <label for="id6" class=" form-control-label">
                <b>Nội dung</b>
              </label>
              <textarea name="" id="id6" cols="30" rows="5" ng-model="content" class="form-control" placeholder="Nội dung danh mục"></textarea>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary btn-sm"  ng-click="new()">
            <i class="fa fa-dot-circle-o"></i> Tạo mới
          </button>
          <button type="reset" class="btn btn-danger btn-sm" ng-click="reset()">
            <i class="fa fa-ban"></i> Reset
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="row" ng-init="csrf ='{{csrf_token()}}'">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <strong class="card-title"> </strong>
        </div>
        <div class="card-body">
          <table id="table-category" ng-table='category' class="table table-striped table-bordered">
          <colgroup>
            <col width="5%" />
            <col width="25%" />
            <col width="25%" />
            <col width="25%" />
            <col width="10%" />
            <col width="10%" />

          </colgroup>
              <tr ng-repeat="data in $data" ng-init="data.show=true;"> 
                <td style="text-align:center">
                        {%$index+ 1%}
                </td>
                <td title="'Tên dự án'" style="text-align:center" filter="{ name: 'text'}" sortable="'name'">
                    <div ng-show="data.show && (data.new || data.new == null)" >
                       {%data.name%}
                    </div>
                    <div  ng-hide="data.show && (data.new || data.new == null)" >
                        <input type="text" ng-model="data.name" class="form-control" >
                    </div>
                </td>
                <td title="'Id'" style="text-align:center" filter="{ id: 'number'}" sortable="'id'">
                    {%data.id%}
                </td>
                <td title="'Nội dung'" style="text-align:center" filter="{ content: 'text'}" sortable="'content'">
                    <div ng-show="data.show && (data.new || data.new == null)" >
                       {%data.content%}
                    </div>
                    <div  ng-hide="data.show && (data.new || data.new == null)" >
                        <input type="text" ng-model="data.content" class="form-control" >
                    </div>
                </td>
                <td style="text-align:center;color:red"><i ng-click="change(data)" style="cursor: pointer;font-size: 25px" class="menu-icon " ng-class="{'ti-save-alt':!(data.show && (data.new || data.new == null)),'ti-pencil':data.show && (data.new || data.new == null)}"></i></td>
                <td style="text-align:center;color:red"><i ng-click="delete(data)" style="cursor: pointer;font-size: 25px" class="menu-icon ti-trash"></i></td>
              </tr>
            
          </table>
        </div>
      </div>
    </div>


  </div>
</div><!-- .animated -->