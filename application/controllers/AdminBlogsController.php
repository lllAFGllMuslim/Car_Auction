<?php

class AdminBlogsController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminBlogs');
        $this->load->helper('url');
          
        $this->load->library('upload');
        $this->load->library('session');
    }

    public function index()
    {

        if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
            redirect(base_url());
            return;
        }

        $this->load->view('admin/admin_header');
        $this->load->view('admin/admin_blog_category');
        $this->load->view('admin/admin_footer');

        // $this->load->view('admin/admin_blog_category');
    }

    public function get_categories()
    {
        $categories = $this->AdminBlogs->get_categories();
        echo json_encode($categories);
    }



    // Add category
    public function add_category()
    {
        $category_name = $this->input->post('category_name');
        $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

        $this->load->model('AdminBlogs');
        if ($this->AdminBlogs->is_unique_category_name($category_name)) {
            if ($this->AdminBlogs->is_unique_slug($category_slug)) {


                $data = array(
     
                    'cat_name' => $this->input->post('category_name'),
                    'cat_slug' => $category_slug
                  
                );
            
                $update_status = $this->AdminBlogs->add_category($data);

                       
            if ($update_status) {
                $response = array('status' => 'success', 'message' => 'Category updated successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to create.');
            }
            } else {
                $response = array('status' => 'error', 'message' => 'Slug already exists');
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Name already exists');
        }

        echo json_encode($response);
    }

    // Update category
    public function update_category()
    {
        $id = $this->input->post('id');
        $category_name = $this->input->post('category_name');
        $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

        $this->load->model('AdminBlogs');
        if ($this->AdminBlogs->is_unique_category_name($category_name, $id)) {
            if ($this->AdminBlogs->is_unique_slug($category_slug, $id)) {

                $data = array(
                    'cat_name' =>  $category_name,
                    'cat_slug' => $category_slug
                  
                );
                $update_status = $this->AdminBlogs->update_category($id,$data);

                 
            if ($update_status) {
                $response = array('status' => 'success', 'message' => 'Category updated successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to create.');
            }
               
            } else {

                $response = array('status' => 'error', 'message' => 'Slug already exists');
            }
        } else {
            
            $response = array('status' => 'error', 'message' => 'Name already exists');
        }
        echo json_encode($response);
    }

    public function delete_category()
    {
        $id = $this->input->post('id');
        $this->AdminBlogs->delete_category($id);
        echo json_encode(['status' => 'success']);
    }


    public function blog_add() {

        if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
            redirect(base_url());
            return;
        }

        $data['categories'] = $this->AdminBlogs->get_categories();
       // print_r( $data['about_page']['about_banner_image_path'] );


       $this->load->view('admin/admin_header');
       $this->load->view('admin/admin_add_blog', $data);
       $this->load->view('admin/admin_footer');
   }
   public function blog_added() {


    $blog_title = $this->input->post('blog_title');
    $blog_slug = url_title($blog_title, 'dash', TRUE); // Generate slug

    $this->load->model('AdminBlogs');
    // if ($this->AdminBlogs->is_unique_blog_name($blog_title)) {
        if ($this->AdminBlogs->is_unique_blog_slug($blog_slug)) { 
             $blog_slug =  $blog_slug;
        }else{
             $blog_slug =  $blog_slug."-".rand(0,1000);
        }
      
          
            $data = array(
     
                'blog_list_image_id' => $this->input->post('blog_list_image_id'),
                'blog_page_image_id' => $this->input->post('blog_page_image_id'),
                'blog_category' => $this->input->post('blog_category'),
                'blog_slug' => $blog_slug,
                'blog_title' => $this->input->post('blog_title'),
                'blog_paragraph' => $this->input->post('blog_paragraph')
            );
        
            $update_status = $this->AdminBlogs->blog_added($data);
        
            if ($update_status) {
                $response = array('status' => 'success', 'message' => 'Blog created successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to create.');
            }


        // } else {
        //     $response = array('status' => 'error', 'message' => 'Slug already exists');
        // }
    // } else {
    //     $response = array('status' => 'error', 'message' => 'Name already exists');
    
    // }

    echo json_encode($response);

   }

   public function blog_edit($id) {

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }

    $data['categories'] = $this->AdminBlogs->get_categories();
    $data['blog'] = $this->AdminBlogs->get_blog_by_id($id);
   // print_r( $data['about_page']['about_banner_image_path'] );


   $this->load->view('admin/admin_header');
   $this->load->view('admin/admin_edit_blog', $data);
   $this->load->view('admin/admin_footer');
}


   // Update category
   public function update_blog()
   {
       $id = $this->input->post('id');
       $blog_title = $this->input->post('blog_title');
       $blog_slug = url_title($blog_title, 'dash', TRUE); // Generate slug

       $this->load->model('AdminBlogs');
       /*if ($this->AdminBlogs->is_unique_blog_name($blog_title, $id)) {*/
           if ($this->AdminBlogs->is_unique_blog_slug($blog_slug, $id)) {
              
            $data = array(
                    'id' => $this->input->post('id'), 
                'blog_list_image_id' => $this->input->post('blog_list_image_id'),
                'blog_page_image_id' => $this->input->post('blog_page_image_id'),
                'blog_category' => $this->input->post('blog_category'),
                'blog_slug' => $blog_slug,
                'blog_title' => $this->input->post('blog_title'),
                'blog_paragraph' => $this->input->post('blog_paragraph')
            );
        
            $update_status = $this->AdminBlogs->update_blog($data);
        
            if ($update_status) {
                $response = array('status' => 'success', 'message' => 'Blog updated successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to update.');
            }

               
           } else {
            $response = array('status' => 'error', 'message' => 'Slug already exists');
           }
       /*} else {
        $response = array('status' => 'error', 'message' => 'Name already exists');
       }*/

       echo json_encode($response);
   }

   public function blog_list($page = 1)
   {

    $limit = 10; // Number of blogs per page
    $offset = ($page - 1) * $limit;

    $blogs = $this->AdminBlogs->get_blogs($limit, $offset);
    $total_blogs = $this->AdminBlogs->get_total_blogs_count();
    $total_pages = ceil($total_blogs / $limit);

    $data = [
        'blogs' => $blogs,
        'total_pages' => $total_pages,
        'current_page' => $page
    ];
    $data['blog_page'] = $this->AdminBlogs->get_blog_page(1);

       $this->load->view('admin/admin_header');
       $this->load->view('admin/admin_blogs',$data); // Your new view file
       $this->load->view('admin/admin_footer');
   }

   public function delete_blog()
   {
       $id = $this->input->post('id');
       $this->AdminBlogs->delete_blog($id);
       echo json_encode(['status' => 'success']);
   }

   
public function update_blog_page() {
    // $data = $this->input->post();
    $data = array(
        'id' => $this->input->post('id'), // Assuming the form has a hidden field for 'id'
        'blog_page_banner_sub_title' => $this->input->post('blog_page_banner_sub_title'),
        'blog_page_banner_main_title' => $this->input->post('blog_page_banner_main_title'),
        'blog_page_banner_image_id' => $this->input->post('blog_page_banner_image_id')
    );

    $update_status = $this->AdminBlogs->update_blog_page($data);

    if ($update_status) {
        $response = array('status' => 'success', 'message' => 'Blog page updated successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update page.');
    }

    echo json_encode($response);
}



public function car_categorys(){

    $data["brand_cat"] = $this->AdminBlogs->get_brand_categories();


    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_brand_categorys',$data); // Your new view file
    $this->load->view('admin/admin_footer');

}

/*** brand ***/

public function brand_add(){


     $category_name = $this->input->post('brand_name');
     $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

     $this->load->model('AdminBlogs');
     if ($this->AdminBlogs->is_unique_brand_category_name($category_name)) {
         if ($this->AdminBlogs->is_unique_brand_slug($category_slug)) {


             $data = array(
  
                 'brand_name' => $this->input->post('brand_name'),
                 'brand_slug' => $category_slug
               
             );
         
             $update_status = $this->AdminBlogs->brand_category($data);

                    
         if ($update_status) {
             $response = array('status' => 'success', 'message' => 'Brand added successfully.');
         } else {
             $response = array('status' => 'error', 'message' => 'Failed to create.');
         }
         } else {
             $response = array('status' => 'error', 'message' => 'Slug already exists');
         }
     } else {
         $response = array('status' => 'error', 'message' => 'Name already exists');
     }

     echo json_encode($response);
 }


 
 public function get_brand_categories()
 {
     $categories = $this->AdminBlogs->get_brand_categories();
     echo json_encode($categories);
 }


    public function update_brand_category()
    {
        $id = $this->input->post('id');
        $category_name = $this->input->post('category_name');
        $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

        $this->load->model('AdminBlogs');
        if ($this->AdminBlogs->is_unique_brand_category_name($category_name, $id)) {
            if ($this->AdminBlogs->is_unique_brand_slug($category_slug, $id)) {

                $data = array(
                    'brand_name' =>  $category_name,
                    'brand_slug' => $category_slug
                  
                );
                $update_status = $this->AdminBlogs->update_brand_category($id,$data);

                 
            if ($update_status) {
                $response = array('status' => 'success', 'message' => 'Brand updated successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to create.');
            }
               
            } else {

                $response = array('status' => 'error', 'message' => 'Slug already exists');
            }
        } else {
            
            $response = array('status' => 'error', 'message' => 'Name already exists');
        }
        echo json_encode($response);
    }

    public function delete_brand_category()
    {
        $id = $this->input->post('id');
        $this->AdminBlogs->delete_brand_category($id);
        echo json_encode(['status' => 'success']);
    }



/***   fuel   ***/

public function fuel_add(){


    $category_name = $this->input->post('fuel_name');
    $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

    $this->load->model('AdminBlogs');
    if ($this->AdminBlogs->is_unique_fuel_category_name($category_name)) {
        if ($this->AdminBlogs->is_unique_fuel_slug($category_slug)) {


            $data = array(
 
                'fuel_name' => $this->input->post('fuel_name'),
                'fuel_slug' => $category_slug
              
            );
        
            $update_status = $this->AdminBlogs->fuel_category($data);

                   
        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'Fuel added successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to create.');
        }
        } else {
            $response = array('status' => 'error', 'message' => 'Slug already exists');
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Name already exists');
    }

    echo json_encode($response);
}



public function get_fuel_categories()
{
    $categories = $this->AdminBlogs->get_fuel_categories();
    echo json_encode($categories);
}


   public function update_fuel_category()
   {
       $id = $this->input->post('id');
       $category_name = $this->input->post('category_name');
       $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

       $this->load->model('AdminBlogs');
       if ($this->AdminBlogs->is_unique_fuel_category_name($category_name, $id)) {
           if ($this->AdminBlogs->is_unique_fuel_slug($category_slug, $id)) {

               $data = array(
                   'fuel_name' =>  $category_name,
                   'fuel_slug' => $category_slug
                 
               );
               $update_status = $this->AdminBlogs->update_fuel_category($id,$data);

                
           if ($update_status) {
               $response = array('status' => 'success', 'message' => 'Fuel updated successfully.');
           } else {
               $response = array('status' => 'error', 'message' => 'Failed to create.');
           }
              
           } else {

               $response = array('status' => 'error', 'message' => 'Slug already exists');
           }
       } else {
           
           $response = array('status' => 'error', 'message' => 'Name already exists');
       }
       echo json_encode($response);
   }

   public function delete_fuel_category()
   {
       $id = $this->input->post('id');
       $this->AdminBlogs->delete_fuel_category($id);
       echo json_encode(['status' => 'success']);
   }


   
/***   model_year   ***/

public function model_year_add(){


    $category_name = $this->input->post('year_name');
    $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

    $this->load->model('AdminBlogs');
    if ($this->AdminBlogs->is_unique_model_year_category_name($category_name)) {
        if ($this->AdminBlogs->is_unique_model_year_slug($category_slug)) {


            $data = array(
 
                'year_name' => $this->input->post('year_name'),
                'year_slug' => $category_slug
              
            );
        
            $update_status = $this->AdminBlogs->model_year_category($data);

                   
        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'Year added successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to create.');
        }
        } else {
            $response = array('status' => 'error', 'message' => 'Slug already exists');
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Name already exists');
    }

    echo json_encode($response);
}



public function get_model_year_categories()
{
    $categories = $this->AdminBlogs->get_model_year_categories();
    echo json_encode($categories);
}


   public function update_model_year_category()
   {
       $id = $this->input->post('id');
       $category_name = $this->input->post('category_name');
       $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

       $this->load->model('AdminBlogs');
       if ($this->AdminBlogs->is_unique_model_year_category_name($category_name, $id)) {
           if ($this->AdminBlogs->is_unique_model_year_slug($category_slug, $id)) {

               $data = array(
                   'year_name' =>  $category_name,
                   'year_slug' => $category_slug
                 
               );
               $update_status = $this->AdminBlogs->update_model_year_category($id,$data);

                
           if ($update_status) {
               $response = array('status' => 'success', 'message' => 'Year updated successfully.');
           } else {
               $response = array('status' => 'error', 'message' => 'Failed to create.');
           }
              
           } else {

               $response = array('status' => 'error', 'message' => 'Slug already exists');
           }
       } else {
           
           $response = array('status' => 'error', 'message' => 'Name already exists');
       }
       echo json_encode($response);
   }

   public function delete_model_year_category()
   {
       $id = $this->input->post('id');
       $this->AdminBlogs->delete_model_year_category($id);
       echo json_encode(['status' => 'success']);
   }



    
/***   buy method   ***/

public function buy_method_add(){


    $category_name = $this->input->post('buy_method_name');
    $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

    $this->load->model('AdminBlogs');
    if ($this->AdminBlogs->is_unique_buy_method_category_name($category_name)) {
        if ($this->AdminBlogs->is_unique_buy_method_slug($category_slug)) {


            $data = array(
 
                'buy_method_name' => $this->input->post('buy_method_name'),
                'buy_method_slug' => $category_slug
              
            );
        
            $update_status = $this->AdminBlogs->buy_method_category($data);

                   
        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'Buy method added successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to create.');
        }
        } else {
            $response = array('status' => 'error', 'message' => 'Slug already exists');
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Name already exists');
    }

    echo json_encode($response);
}



public function get_buy_method_categories()
{
    $categories = $this->AdminBlogs->get_buy_method_categories();
    echo json_encode($categories);
}


   public function update_buy_method_category()
   {
       $id = $this->input->post('id');
       $category_name = $this->input->post('category_name');
       $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug


    

       $this->load->model('AdminBlogs');
       if ($this->AdminBlogs->is_unique_buy_method_category_name($category_name, $id)) {
           if ($this->AdminBlogs->is_unique_buy_method_slug($category_slug, $id)) {

               $data = array(
                   'buy_method_name' =>  $category_name,
                   'buy_method_slug' => $category_slug
                 
               );
               $update_status = $this->AdminBlogs->update_buy_method_category($id,$data);

                
           if ($update_status) {
               $response = array('status' => 'success', 'message' => 'Buy method updated successfully.');
           } else {
               $response = array('status' => 'error', 'message' => 'Failed to create.');
           }
              
           } else {

               $response = array('status' => 'error', 'message' => 'Slug already exists');
           }
       } else {
           
           $response = array('status' => 'error', 'message' => 'Name already exists');
       }
       echo json_encode($response);
   }

   public function delete_buy_method_category()
   {
       $id = $this->input->post('id');
       $this->AdminBlogs->delete_buy_method_category($id);
       echo json_encode(['status' => 'success']);
   }


  
    
/***   body method   ***/

public function body_add(){


    $category_name = $this->input->post('body_name');
    $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

    $this->load->model('AdminBlogs');
    if ($this->AdminBlogs->is_unique_body_category_name($category_name)) {
        if ($this->AdminBlogs->is_unique_body_slug($category_slug)) {


            $data = array(
 
                'body_name' => $this->input->post('body_name'),
                'body_slug' => $category_slug
              
            );
        
            $update_status = $this->AdminBlogs->body_category($data);

                   
        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'Body added successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to create.');
        }
        } else {
            $response = array('status' => 'error', 'message' => 'Slug already exists');
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Name already exists');
    }

    echo json_encode($response);
}



public function get_body_categories()
{
    $categories = $this->AdminBlogs->get_body_categories();
    echo json_encode($categories);
}


   public function update_body_category()
   {
       $id = $this->input->post('id');
       $category_name = $this->input->post('category_name');
       $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug


    

       $this->load->model('AdminBlogs');
       if ($this->AdminBlogs->is_unique_body_category_name($category_name, $id)) {
           if ($this->AdminBlogs->is_unique_body_slug($category_slug, $id)) {

               $data = array(
                   'body_name' =>  $category_name,
                   'body_slug' => $category_slug
                 
               );
               $update_status = $this->AdminBlogs->update_body_category($id,$data);

                
           if ($update_status) {
               $response = array('status' => 'success', 'message' => 'Body updated successfully.');
           } else {
               $response = array('status' => 'error', 'message' => 'Failed to create.');
           }
              
           } else {

               $response = array('status' => 'error', 'message' => 'Slug already exists');
           }
       } else {
           
           $response = array('status' => 'error', 'message' => 'Name already exists');
       }
       echo json_encode($response);
   }

   public function delete_body_category()
   {
       $id = $this->input->post('id');
       $this->AdminBlogs->delete_body_category($id);
       echo json_encode(['status' => 'success']);
   } 


       
/***   Engine   ***/

public function engine_add(){


    $category_name = $this->input->post('engine_name');
    $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

    $this->load->model('AdminBlogs');
    if ($this->AdminBlogs->is_unique_engine_category_name($category_name)) {
        if ($this->AdminBlogs->is_unique_engine_slug($category_slug)) {


            $data = array(
 
                'engine_name' => $this->input->post('engine_name'),
                'engine_slug' => $category_slug
              
            );
        
            $update_status = $this->AdminBlogs->engine_category($data);

                   
        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'Engine added successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to create.');
        }
        } else {
            $response = array('status' => 'error', 'message' => 'Slug already exists');
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Name already exists');
    }

    echo json_encode($response);
}



public function get_engine_categories()
{
    $categories = $this->AdminBlogs->get_engine_categories();
    echo json_encode($categories);
}


   public function update_engine_category()
   {
       $id = $this->input->post('id');
       $category_name = $this->input->post('category_name');
       $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug


    

       $this->load->model('AdminBlogs');
       if ($this->AdminBlogs->is_unique_engine_category_name($category_name, $id)) {
           if ($this->AdminBlogs->is_unique_engine_slug($category_slug, $id)) {

               $data = array(
                   'engine_name' =>  $category_name,
                   'engine_slug' => $category_slug
                 
               );
               $update_status = $this->AdminBlogs->update_engine_category($id,$data);

                
           if ($update_status) {
               $response = array('status' => 'success', 'message' => 'Engine updated successfully.');
           } else {
               $response = array('status' => 'error', 'message' => 'Failed to create.');
           }
              
           } else {

               $response = array('status' => 'error', 'message' => 'Slug already exists');
           }
       } else {
           
           $response = array('status' => 'error', 'message' => 'Name already exists');
       }
       echo json_encode($response);
   }

   public function delete_engine_category()
   {
       $id = $this->input->post('id');
       $this->AdminBlogs->delete_engine_category($id);
       echo json_encode(['status' => 'success']);
   } 


   /***   Equipment   ***/

public function equipment_add(){


    $category_name = $this->input->post('equipment_name');
    $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

    $this->load->model('AdminBlogs');
    if ($this->AdminBlogs->is_unique_equipment_category_name($category_name)) {
        if ($this->AdminBlogs->is_unique_equipment_slug($category_slug)) {


            $data = array(
 
                'equipment_name' => $this->input->post('equipment_name'),
                'equipment_slug' => $category_slug
              
            );
        
            $update_status = $this->AdminBlogs->equipment_category($data);

                   
        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'Equipment added successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to create.');
        }
        } else {
            $response = array('status' => 'error', 'message' => 'Slug already exists');
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Name already exists');
    }

    echo json_encode($response);
}



public function get_equipment_categories()
{
    $categories = $this->AdminBlogs->get_equipment_categories();
    echo json_encode($categories);
}


   public function update_equipment_category()
   {
       $id = $this->input->post('id');
       $category_name = $this->input->post('category_name');
       $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug


    

       $this->load->model('AdminBlogs');
       if ($this->AdminBlogs->is_unique_equipment_category_name($category_name, $id)) {
           if ($this->AdminBlogs->is_unique_equipment_slug($category_slug, $id)) {

               $data = array(
                   'equipment_name' =>  $category_name,
                   'equipment_slug' => $category_slug
                 
               );
               $update_status = $this->AdminBlogs->update_equipment_category($id,$data);

                
           if ($update_status) {
               $response = array('status' => 'success', 'message' => 'Equipment updated successfully.');
           } else {
               $response = array('status' => 'error', 'message' => 'Failed to create.');
           }
              
           } else {

               $response = array('status' => 'error', 'message' => 'Slug already exists');
           }
       } else {
           
           $response = array('status' => 'error', 'message' => 'Name already exists');
       }
       echo json_encode($response);
   }

   public function delete_equipment_category()
   {
       $id = $this->input->post('id');
       $this->AdminBlogs->delete_equipment_category($id);
       echo json_encode(['status' => 'success']);
   }
   
   
      /***   model   ***/

public function model_add(){


    $category_name = $this->input->post('model_name');
    $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug

    $this->load->model('AdminBlogs');
    // if ($this->AdminBlogs->is_unique_model_category_name($category_name)) {
      if ($this->AdminBlogs->is_unique_model_slug($category_slug)) { 
           $category_slug  =  $category_slug;
      }else{
           $category_slug =  $category_slug."-".rand(0,1000);
      }


            $data = array(
 
                'model_name' => $this->input->post('model_name'),
                'model_slug' => $category_slug,
                'brand_id' => $this->input->post('brand_id')
              
            );
        
            $update_status = $this->AdminBlogs->model_category($data);

                   
        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'Model added successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to create.');
        }
    //     } else {
    //         $response = array('status' => 'error', 'message' => 'Slug already exists');
    //     }
    // } else {
    //     $response = array('status' => 'error', 'message' => 'Name already exists');
    // }

    echo json_encode($response);
}



public function get_model_categories()
{
    $categories = $this->AdminBlogs->get_model_categories();
    echo json_encode($categories);
}


   public function update_model_category()
   {
       $id = $this->input->post('id');
       $category_name = $this->input->post('category_name');
       $category_slug = url_title($category_name, 'dash', TRUE); // Generate slug


    

       $this->load->model('AdminBlogs');
       if ($this->AdminBlogs->is_unique_model_category_name($category_name, $id)) {
           if ($this->AdminBlogs->is_unique_model_slug($category_slug, $id)) {

               $data = array(
                   'model_name' =>  $category_name,
                   'model_slug' => $category_slug
                 
               );
               $update_status = $this->AdminBlogs->update_model_category($id,$data);

                
           if ($update_status) {
               $response = array('status' => 'success', 'message' => 'Model updated successfully.');
           } else {
               $response = array('status' => 'error', 'message' => 'Failed to create.');
           }
              
           } else {

               $response = array('status' => 'error', 'message' => 'Slug already exists');
           }
       } else {
           
           $response = array('status' => 'error', 'message' => 'Name already exists');
       }
       echo json_encode($response);
   }

   public function delete_model_category()
   {
       $id = $this->input->post('id');
       $this->AdminBlogs->delete_model_category($id);
       echo json_encode(['status' => 'success']);
   }
   
   

   public function want_to_delete_car($page = 1){

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }

    $search_term = isset($_POST['title']) ? $_POST['title'] : '';

    $limit = 16; // Number of blogs per page
    $offset = ($page - 1) * $limit;

    $blogs = $this->AdminBlogs->get_cars($limit, $offset,$search_term);
    $total_blogs = $this->AdminBlogs->get_total_cars_count($search_term);
    $total_pages = ceil($total_blogs / $limit);

    $data = [
        'cars' => $blogs,
        'total_pages' => $total_pages,
        'current_page' => $page,
        'search_term' => htmlspecialchars($search_term)
    ];

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_want_to_delete_car',$data);
    $this->load->view('admin/admin_footer');
   } 

   public function get_dealer_message_by_brand_id(){

    $categories = $this->AdminBlogs->get_dealer_message_by_brand_id($this->input->post('brand_id'));

 
   
    $response = array('status' => 'success', 'message' => $categories["message"]);

    echo json_encode($response);
}

public function admin_car_delete(){

    $id = $this->input->post('id');
    $this->AdminBlogs->admin_car_delete($id);
    $this->AdminBlogs->admin_car_bid_delete($id);
    echo json_encode(['status' => 'success']);

}



function admin_user_list($page = 1){

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }

     // $search_term = $this->input->post('title');//
     $search_term = isset($_POST['title']) ? $_POST['title'] : '';

    $limit = 16; // Number of blogs per page
    $offset = ($page - 1) * $limit;

    $users = $this->AdminBlogs->get_user_list($limit, $offset,$search_term);
    $total_blogs = $this->AdminBlogs->get_total_user_list_count($search_term);
    $total_pages = ceil($total_blogs / $limit);

    $data = [
        'users' => $users,
        'total_pages' => $total_pages,
        'current_page' => $page,
        'search_term' => htmlspecialchars($search_term)
    ];

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_user_list',$data);
    $this->load->view('admin/admin_footer');

}

function sellyourcar_list($page = 1){

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }

     // $search_term = $this->input->post('title');//
     $search_term = isset($_POST['title']) ? $_POST['title'] : '';

    $limit = 16; // Number of blogs per page
    $offset = ($page - 1) * $limit;

    $users = $this->AdminBlogs->get_sellyourcar_list($limit, $offset,$search_term,"new");
    $total_blogs = $this->AdminBlogs->get_total_sellyourcar_list_count($search_term);
    $total_pages = ceil($total_blogs / $limit);

    $data = [
        'users' => $users,
        'total_pages' => $total_pages,
        'current_page' => $page,
        'search_term' => htmlspecialchars($search_term)
    ];

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_sellyourcar_list',$data);
    $this->load->view('admin/admin_footer');

}

function sellyourcar_list_sold($page = 1){

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }

     // $search_term = $this->input->post('title');//
     $search_term = isset($_POST['title']) ? $_POST['title'] : '';

    $limit = 16; // Number of blogs per page
    $offset = ($page - 1) * $limit;

    $users = $this->AdminBlogs->get_sellyourcar_list($limit, $offset,$search_term,"sold");
    $total_blogs = $this->AdminBlogs->get_total_sellyourcar_list_count($search_term);
    $vendor_list = $this->AdminBlogs->get_dealerlist();
    $total_pages = ceil($total_blogs / $limit);

    $data = [
        'users' => $users,
        'vendor_data' => $vendor_list,
        'total_pages' => $total_pages,
        'current_page' => $page,
        'search_term' => htmlspecialchars($search_term)
    ];

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_sellyourcar_list_sold',$data);
    $this->load->view('admin/admin_footer');

}
function sellyourcar_list_vendor($page = 1){

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }

     // $search_term = $this->input->post('title');//
     $search_term = isset($_POST['title']) ? $_POST['title'] : '';

    $limit = 16; // Number of blogs per page
    $offset = ($page - 1) * $limit;

    $users = $this->AdminBlogs->get_sellyourcar_list($limit, $offset,$search_term,"vendor");
    $total_blogs = $this->AdminBlogs->get_total_sellyourcar_list_count($search_term);
    $vendor_list = $this->AdminBlogs->get_dealerlist();
    $total_pages = ceil($total_blogs / $limit);

    $data = [
        'users' => $users,
        'vendor_data' => $vendor_list,
        'total_pages' => $total_pages,
        'current_page' => $page,
        'search_term' => htmlspecialchars($search_term)
    ];

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_sellyourcar_list_vendor',$data);
    $this->load->view('admin/admin_footer');

}

function sellyourcar_list_profile(){

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }
    // echo "sell your car profile page<br/>";
    $id = $this->input->get('id');
    $car_profile = $this->AdminBlogs->get_sellyourcar_profile($id);
    $vendor_list = $this->AdminBlogs->get_dealerlist();
    // print_r($car_profile);
    // echo "<br />";
    // print_r($vendor_list);
    $data = [
        'users' => $car_profile,
        'vendor_data' => $vendor_list
    ];
    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_sellyourcar_profile',$data);
    $this->load->view('admin/admin_footer');

}

function sellyourcar_profileupdate() {
    if($this->input->post('vendor') == "") {
        $vendor = NULL;
    } else {
        $vendor = $this->input->post('vendor');
    }
    $DT = date("Y-m-d h:i:s");
    if($this->input->post('sell_status') == 1) {
        $data = array(
            'id' => $this->input->post('car_id'),
            'vendor' => $vendor,
            'sold' => $this->input->post('sell_status'),
            'DT_sold' => $DT
        );
    } else {
        $data = array(
            'id' => $this->input->post('car_id'),
            'vendor' => $vendor,
            'sold' => $this->input->post('sell_status'),
            'DT_vendor' => $DT
        );
    }
    // print_r($data);
    $update_status = $this->AdminBlogs->sellyourcar_profileupdate($data);

        if ($update_status) {
            $response = array('status' => 'success', 'message' => 'Car Updated Successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to update.');
        }

        echo json_encode($response);

}

function admin_dealer_list($page = 1){

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }

    
    // $search_term = $this->input->post('title');//
    $search_term = isset($_POST['title']) ? $_POST['title'] : '';

    $limit = 16; // Number of blogs per page
    $offset = ($page - 1) * $limit;

    $users = $this->AdminBlogs->get_dealar_list($limit, $offset,$search_term);
    $total_blogs = $this->AdminBlogs->get_total_dealar_list_count($search_term);
    $total_pages = ceil($total_blogs / $limit);
    

    $data = [
        'users' => $users,
        'total_pages' => $total_pages,
        'current_page' => $page,
        'search_term' => htmlspecialchars($search_term)
    ];

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_dealer_list',$data);
    $this->load->view('admin/admin_footer');

}

function admin_user_delete(){

    $id = $this->input->post('id');
    $this->AdminBlogs->admin_user_delete($id);
    echo json_encode(['status' => 'success']);

}


function admin_aution_cars($page = 1){

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }

    // $search_term = $this->input->post('title');//
    $search_term = isset($_POST['title']) ? $_POST['title'] : '';

    // print_r($search_term);

    $limit = 16; // Number of blogs per page
    $offset = ($page - 1) * $limit;

    $blogs = $this->AdminBlogs->get_auction_cars($limit, $offset,$search_term);
    $total_blogs = $this->AdminBlogs->get_total_auction_cars_count($search_term);
    $total_pages = ceil($total_blogs / $limit);

    $data = [
        'cars' => $blogs,
        'total_pages' => $total_pages,
        'current_page' => $page,
        'search_term' => htmlspecialchars($search_term)
    ];

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_aution_cars',$data);
    $this->load->view('admin/admin_footer');

   } 


function admin_aution_completed($page = 1){

    if (!$this->session->userdata('user_id') and $this->session->userdata('user_role')!='admin') {
        redirect(base_url());
        return;
    }

    // $search_term = $this->input->post('title');//
    $search_term = isset($_POST['title']) ? $_POST['title'] : '';
    
 

    // print_r($search_term);

    $limit = 16; // Number of blogs per page
    $offset = ($page - 1) * $limit;

    $blogs = $this->AdminBlogs->get_aution_completed_cars($limit, $offset,$search_term);
    $total_blogs = $this->AdminBlogs->get_total_aution_completed_cars_count($search_term);
    $total_pages = ceil($total_blogs / $limit);

    $data = [
        'cars' => $blogs,
        'total_pages' => $total_pages,
        'current_page' => $page,
        'search_term' => htmlspecialchars($search_term)
    ];

    $this->load->view('admin/admin_header');
    $this->load->view('admin/admin_aution_completed',$data);
    $this->load->view('admin/admin_footer');

   } 



}
