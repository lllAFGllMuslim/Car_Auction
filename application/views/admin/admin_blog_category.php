<div class="product-page pt-40 mb-20">
<div class="container">
<div class="row g-xl-4 gy-5">
<div class="col-xl-12 menu_mobile_dash"><a href="#">Click Dashboard Menu</a></div>

<div class="col-xl-3">

<?php $this->load->view('admin/admin_sidebar'); ?>

</div>
<div class="col-xl-9">
<div class="row g-4 mb-20">
<div class="col-lg-12">
<div class="add_new_car_head" style="padding-top:6px;">Blog category</div>
</div>
<div class="col-lg-5">
                <div class="row">
                    <form name="blogcatform" id="blogcatform" >
                    <div class="col-lg-12 add_sty1 mt-2">
                        <label>Type blog category</label>
                        <input id="category_name" name="category_name" value="" type="text" class="form-control">
                    </div>
                    <div class="col-lg-12 mt-0">
                        <div class="form-inner">
                            <button id="add_category" class="primary-btn2 btn btn-primary" type="submit">Add category</button>
                        </div>
                    </div>
                    </form>
                </div>
                <br/>
                <p class="message" ></p>
            </div>

            <div class="col-lg-7">
                <div class="add_admin_user">
                    <table width="100%" cellspacing="0" cellpadding="0" class="">
                       
                            <tr>
                                <th class="head15699">Category name</th>
                                <!-- <th class="head15699">Slug</th> -->
                                <th class="head15699"></th>
                            </tr>
                        <tbody id="categories_list">
                            <!-- Categories will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
            </div>

</div>
</div>
</div>
</div>
</div>