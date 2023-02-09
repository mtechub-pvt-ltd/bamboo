<aside class="sidebar-wrapper">
         
          
          <div class="textmenu">
         
           
            <div class="brand-logo d-flex justify-content-between">
           
              <img src="assets/images/logo-2.png" width="170" alt=""/>
              <div class="nav-toggle-box d-md-none">
              <div class="nav-toggle-icon"><i class="bi bi-x" style="font-size:25px;"></i></div>
           </div>
            </div>
            <div class="tab-content">
              <div class="tab-pane active" id="pills-dashboards">
                <div class="list-group list-group-flush">
                  <a href="index.php" class="list-group-item text-dark">
                     Dashboard
                  </a>
                </div>
                <div class="list-group list-group-flush">
                  <a href="emergency.php" class="list-group-item text-dark active">
                  Emergency
                  </a>
                </div>
                <?php
                $sql = "SELECT * FROM categories WHERE user_id='admin' OR user_id='$_SESSION[id]' AND  movetoTrash=0 ";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                  $id = $row['id'];
                  $name = $row['name'];
                  echo '<div
                  class="list-group list-group-flush"
                  style="cursor:pointer;"
                  >
                  <div class="d-flex   justify-content-between  list-group-item text-dark">
                  <a href="subCategories.php?cat_id='.$id.'&cat_name='.$name.'" class="text-dark">
                  '.$name.'
                  </a>';
                  if($row['user_id']!='admin') {
                    echo '
                    <a onClick="deleteCategory('.$id.')"><i class="bi bi-folder-minus text-danger me-0 pe-0" 
                    data-bs-toggle="tooltip" data-bs-title="Delete Folder"
                   ></i></a>';
                  }
                  
               
                  echo '</div>
                  </div>
                  ';
                }
                ?>
                <div class="list-group list-group-flush">
             

                <div class="d-flex justify-content-left  list-group-item text-dark">
                <i class="bi bi-plus text-success"></i>  
                <a type="button"  data-bs-toggle="modal" 
                onclick="javascript:('#cat_name_main').focus();"
                data-bs-target="#addCategory">Add New Category</a>
              </div>
                <div class="d-flex justify-content-left  list-group-item text-dark">
                <i class="bi bi-trash text-danger"></i>  
                <a type="button" >Trash</a>
              </div>


                
                </div>
              </div>
             
              
            </div>
          </div>
       </aside>
       <script>
/// delete category 
function  deleteCategory(id) {

  event.preventDefault();
        
        swal({
            title: 'Confirm Delete',
            text: 'this will delete all files and folders in this category & Sub Categories',
            icon: 'warning',
          textalign: 'center',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = 'category/delete.php?id='+id;
            }
        });
} 

// javascript preent modal from closing outside click

        </script>