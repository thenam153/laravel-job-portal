<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 d-flex flex-column">
                <div class="contact-btns" style="margin-bottom: 19px;padding: 14px 10px;">Tên dự án</div>
                <div class="contact-btns" style="margin-bottom: 19px;padding: 14px 10px;">Thể loại</div>
                <div class="contact-btns" style="margin-bottom: 19px;padding: 14px 10px;">Giá (VNĐ)</div>
                <div class="contact-btns" style="margin-bottom: 19px;padding: 14px 10px;">Tệp đính kèm</div>
                <div class="contact-btns" style="margin-bottom: 19px;padding: 14px 10px;">Nội dung</div>
            </div>
            <div class="col-lg-8">
                <form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right">
                    <div class="row">	
                        <div class="col-lg-12 form-group">
                            <input name="name" placeholder="Enter your name" class="common-input mb-20 form-control" required="" type="text">
                            <input name="subject" placeholder="Enter your subject" class="common-input mb-20 form-control" required="" type="text">
                            <input name="subject" placeholder="Enter your subject"  class="common-input mb-20 form-control" required="" type="number" multiple>
                            <input name="subject" placeholder="Enter your subject"  class="common-input mb-20 form-control" required="" type="file" multiple>
                            <textarea class="common-textarea mt-10 form-control mb-20" name="message" placeholder="Nội dung dự án" required=""></textarea>
                            <button class="primary-btn mt-20 text-white" style="float: right;">Đăng bài</button>
                            <div class="mt-20 alert-msg" style="text-align: left;"></div>
                        </div>
                    </div>
                </form>	
            </div>
        </div>
    </div>	
</section>