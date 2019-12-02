<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 d-flex flex-column">
                <div class="contact-btns" style="margin-bottom: 19px;padding: 14px 10px;">Tên dự án</div>
                <div class="contact-btns" style="margin-bottom: 19px;padding: 14px 10px;">Thể loại</div>
                <div class="contact-btns" style="margin-bottom: 19px;padding: 14px 10px;">Ký năng</div>
                <div class="contact-btns" style="margin-bottom: 19px;padding: 14px 10px;">Giá (VNĐ)</div>
                <div class="contact-btns" style="margin-bottom: 19px;padding: 14px 10px;">Tệp đính kèm</div>
                <div class="contact-btns" style="margin-bottom: 19px;padding: 14px 10px;">Nội dung</div>
            </div>
            <div class="col-lg-8">
                <form class="form-area " action="{{ route('postproject') }}" method="post" enctype='multipart/form-data' class="contact-form text-right">
                    @csrf
                    <div class="row">	
                        <div class="col-lg-12 form-group">
                            <input name="name" placeholder="Tên" class="common-input mb-20 form-control"  required type="text">
                            <!-- <input name="category" placeholder="Loại" class="common-input mb-20 form-control"  type="text"> -->
                                <select name="category" class="common-input mb-20 form-control" style="height: 50px;">
                                    @foreach($categorys as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            <input name="skills" placeholder="Ký năng (ngăn cách bởi dấu ' , ' (phẩy) )"  class="common-input mb-20 form-control"  required type="text">
                            <input name="price" placeholder="Giá"  class="common-input mb-20 form-control"  required type="number" multiple min="1">
                            <input name="files[]" placeholder="Tệp"  class="common-input mb-20 form-control" required  type="file" multiple>
                            <textarea class="common-textarea mt-10 form-control mb-20" name="content" required placeholder="Nội dung dự án" ></textarea>
                            <button class="primary-btn mt-20 text-white" style="float: right;">Đăng bài</button>
                            <div class="mt-20 alert-msg" style="text-align: left;"></div>
                        </div>
                    </div>
                </form>	
            </div>
        </div>
    </div>	
</section>