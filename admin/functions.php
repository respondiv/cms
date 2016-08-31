<?php

	// Add New Category
	function addCategories(){
		global $connection;
		 if (isset($_POST['submit'])) {
            $cat_title = $_POST['cat_title'];

            if ($cat_title =="" || empty($cat_title)) {
                echo "<div class='alert alert-danger'>";
                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                echo "Please Enter Category Name";
                echo "</div>";
            }
            else{
                $query = "INSERT INTO categories(cat_title) ";
                $query .= "VALUE('{$cat_title}') ";

                $create_category = mysqli_query($connection, $query);
            
                // Check if the query is good
                querryCheck($create_category);
            }
        }
	}
	


	// Update Category: 
	function updateCategory(){
		global $connection;
        global $cat_title;
		//Step - 1: First Display the edit box with category name to make changes
		if (isset($_GET['edit'])) {
		    $cat_id_update = $_GET['edit'];
		    $query = "SELECT * FROM categories WHERE cat_id = $cat_id_update ";
		    $edit_category = mysqli_query($connection,$query);

		    // Check if the query is good
            querryCheck($edit_category);

		    while($row = mysqli_fetch_assoc($edit_category)){
	        $cat_id = $row['cat_id']; 
	        $cat_title = $row['cat_title'];

	    	}

		} 

		// Step - 2: When Update button is clicked, update the category name
		if (isset($_POST['update'])) {
		    $cat_title_update = $_POST['cat_title_update'];
		    $query = "UPDATE categories SET cat_title = '{$cat_title_update}' WHERE cat_id = {$cat_id_update} ";
		    $update_category = mysqli_query($connection, $query);
		    // Check if the query is good
            querryCheck($update_category);
            header("Location: categories.php");
		}
	}


	// View Category List
	function viewCategories(){
		global $connection;
	 	$query = "SELECT * FROM categories ";
        $select_all_categories = mysqli_query($connection,$query);

        // Check if the query is good
        querryCheck($select_all_categories);

        while($row = mysqli_fetch_assoc($select_all_categories)){
            $cat_id = $row['cat_id']; 
            $cat_title = $row['cat_title'];
            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit </a> | ";
            echo "<a href='categories.php?delete={$cat_id}'> Delete </a></td>";
            
            echo "</tr>";
        }
    }


    //  Delete Selected Category
    function deleteCategory(){
    	global $connection;
        // Delete Selected Categories
        if (isset($_GET['delete'])) {
            
            $cat_id_delete = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id = {$cat_id_delete}";
            $detele_category = mysqli_query($connection, $query);
            // Check if the query is good
            querryCheck($detele_category);
            header("Location: categories.php");
        }
	}


    // Return Category name when Category ID is provided
    function categoryName($cat_id){
        global $connection;
        $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
        $category_name = mysqli_query($connection,$query);

        // Check if the query is good
        querryCheck($category_name);

        while($row = mysqli_fetch_assoc($category_name)){
        $cat_title = $row['cat_title'];
        return $cat_title;
        }

    }

    // Query all the posts
    function queryAllPosts(){
        global $connection;
        $query = "SELECT * FROM posts";
        $select_all_posts = mysqli_query($connection,$query);

        querryCheck($select_all_posts);

        while($row = mysqli_fetch_assoc($select_all_posts)){
            $post_id = $row['post_id']; 
            $post_category_id = $row['post_category_id']; 
            $post_title = $row['post_title']; 
            $post_author = $row['post_author']; 
            $post_date = $row['post_date']; 
            $post_image = $row['post_image']; 
            $post_content = $row['post_content']; 
            $post_content = mb_substr($post_content, 0, 25);
            $post_tags = $row['post_tags'];
            $post_status = $row['post_status'];
            $post_comment_count = $row['post_comment_count'];
            $post_category_name = categoryName($post_category_id);

            
            $rows[] = compact('post_id','post_status','post_title','post_content','post_category_id','post_author','post_tags','post_image','post_date','post_comment_count','post_category_name');
            
        }
            if (empty($rows)) {     // return empty array if no results found
                $rows = array ();
            }

            return $rows;       
     }


    // View All Posts
    function viewPosts(){
         $new_array = queryAllPosts();

        if (empty($new_array)) {
            echo "<div class='alert alert-danger'>";
            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
            echo "No Posts Found. Try adding some posts first !!";
            echo "</div>";
        }
        else{
            $new_array = arraySort($new_array, 'post_date', SORT_DESC);
            foreach ($new_array as $key => $value) {
                echo "<tr>";
                echo "<td class='hide-m'>{$value['post_id']}</td>";
                echo "<td><a href='../post.php?p_id={$value['post_id']}' target='_blank'>{$value['post_title']}</a></td>";
                echo "<td>{$value['post_author']}</td>";
                echo "<td class='hide-m'>{$value['post_category_name']}</td>";
                echo "<td class='hide-m'><img src='../images/{$value['post_image']}' width='90em'></td>";
                echo "<td class='hide-m'>{$value['post_content']}...</td>";
                echo "<td class='hide-m'>{$value['post_tags']}</td>";
                echo "<td class='hide-m'>{$value['post_date']}</td>";
                echo "<td>{$value['post_status']}</td>";
                echo "<td class='hide-m'>{$value['post_comment_count']}</td>";
                echo "<td><a href='posts.php?source=edit_post&post_id={$value['post_id']}'> Edit</a> | ";
                echo "<a href='posts.php?delete={$value['post_id']}'> Delete </a></td>";
                echo "</tr>";
            }
        }
    }


    // Add New Posts
    function addPosts(){
        global $connection;
        if (isset($_POST['create_post'])) {
           $post_status = $_POST['post_status'];
           $post_title = $_POST['post_title'];
           $post_content = $_POST['post_content'];
           $post_category_id = $_POST['post_category_id'];
           $post_author = $_POST['post_author'];
           $post_tags = $_POST['post_tags'];
           $post_image = basename($_FILES['post_image']['name']);
           $post_image_temp = $_FILES['post_image']['tmp_name'];
           $post_date_if_empty = date('d-m-y');               // this format's the date into MySQL acceptable format
           $post_date = $_POST['post_date'];            
           $post_comment_count = 0;

           // move uploaded file from temp location to images folder of CMS
           move_uploaded_file($post_image_temp, "../images/{$post_image}");

           if (empty($post_date)) {     // If $post_date is empty, set current date as $post_date
               $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status, post_comment_count) ";
               $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}', {$post_comment_count}) ";  
           }
           else{
               $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status, post_comment_count) ";
               $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', '{$post_date}', '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}', {$post_comment_count}) ";
            }

           $add_new_post = mysqli_query($connection,$query);

           // Check if the query is good
           querryCheck($add_new_post);

           $post_id = mysqli_insert_id($connection);

           header("Location: posts.php?source=edit_post&post_id={$post_id}");

        }
    }


    // Delete Posts
    function deletePosts(){
        global $connection;
        if (isset($_GET['delete'])) {
            $delete_post_id = $_GET['delete'];
            $query = "DELETE FROM posts WHERE post_id = {$delete_post_id} ";
            $delete_selected_post = mysqli_query($connection,$query);
            // Check if the query is good
           querryCheck($delete_selected_post);
           header("Location: posts.php");

        }
    }


    // Edit Posts

    // Step 1: First Display the edit page with existing content to make changes
    function editPostsStep1(){
        global $connection;
        if (isset($_GET['post_id'])) {
            $post_id_update = $_GET['post_id'];
            $query = "SELECT * FROM posts WHERE post_id = $post_id_update ";
            $edit_post_by_id = mysqli_query($connection, $query);

            // Check if the query is good
            querryCheck($edit_post_by_id);

            while($row = mysqli_fetch_assoc($edit_post_by_id)){
                $post_id = $row['post_id'];
                $post_status = $row['post_status'];
                $post_title = $row['post_title'];
                $post_content = $row['post_content'];
                $post_category_id = $row['post_category_id'];
                $post_author = $row['post_author'];
                $post_tags = $row['post_tags'];
                $post_image_current = $row['post_image'];
                $post_date = $row['post_date'];            
                $post_comment_count = $row['post_comment_count'];
                return compact('post_id','post_status','post_title','post_content','post_category_id','post_author','post_tags','post_image_current','post_date','post_comment_count');                              
            }
        }

    }

    // Step 2: Update the entered post content when Update button is pressed
    function editPostsStep2(){
        global $connection;

        // retriving couple values from editPostsStep1() to resuse here 
        $get_val = editPostsStep1();
        $post_id = $get_val['post_id'];
        $post_image_current = $get_val['post_image_current'];
       
        if (isset($_POST['update_post'])) {
            $post_id = $post_id;
            $post_status = $_POST['post_status'];
            $post_title = $_POST['post_title'];
            $post_content = $_POST['post_content'];
            $post_category_id = $_POST['post_category_id'];
            $post_author = $_POST['post_author'];
            $post_tags = $_POST['post_tags'];
            $post_image = basename($_FILES['post_image']['name']);
            $post_image_temp = $_FILES['post_image']['tmp_name'];
            $post_date = $_POST['post_date'];
            $post_date_if_empty = date('d-m-y');        // this format's the date into MySQL acceptable format

            if ($post_image_temp = "" || empty($post_image_temp)) {
                $post_image = $post_image_current; 
            }else{
                $post_image = $post_image;
            }

            // move uploaded file from temp location to images folder of CMS
            move_uploaded_file($post_image_temp, "../images/{$post_image}");

            $query = "UPDATE posts SET ";
            $query .= "post_status = '{$post_status}', ";
            $query .= "post_title = '{$post_title}', ";
            $query .= "post_content = '{$post_content}', ";
            $query .= "post_category_id = '{$post_category_id}', ";
            $query .= "post_author = '{$post_author}', ";
            $query .= "post_tags = '{$post_tags}', ";
            $query .=  "post_image = '{$post_image}', ";
            
            // adjust query depending upon the $post_date
            if (empty($post_date)) {    // If $post_date is empty, set current date as $post_date
                $query .= "post_date = now() ";
            }
            else{
                $query .= "post_date = '{$post_date}' "; 
            }

            $query .= "WHERE post_id = {$post_id} ";

            $update_post = mysqli_query($connection, $query);
            // Check if the query is good
            querryCheck($update_post);

            header("Location: posts.php?source=edit_post&post_id={$post_id}");
        }
    }
    

     // Select Categories Dynamically for Add / Edit Posts
    function selectCategories(){
        global $connection;
        $query = "SELECT * FROM categories ";
        $select_categories = mysqli_query($connection,$query);

        // Check if the query is good
        querryCheck($select_categories);


        while($row = mysqli_fetch_assoc($select_categories)){
            $cat_id = $row['cat_id']; 
            $cat_title = $row['cat_title'];

             // retriving current post_category_id. 
            $get_val = editPostsStep1();
            $post_category_id = $get_val['post_category_id'];

            if ($cat_id == $post_category_id) {             // if editing an existing post, make the existing post category selected by default
                echo "<option value='{$cat_id}' selected>{$cat_title}</option>";
            }
            else{       // display the rest (all) of the post category in list when adding / editing post
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
        }

    }




    // Display different CRUD pages / forms in posts.php depending upon user's interaction
    function diffCrudInPosts (){

        //  get the value from URL to check what user's want to do
        if (isset($_GET['source'])) {
            $source = $_GET['source'];
        }
        else{
            $source = "";
        }

        // Check various Case and display the correct CRUD page request 

        switch ($source) {
            case 'add_post':
                include "includes/add_posts.php";      // Include add_posts
                break;

            case 'edit_post':
                include "includes/edit_posts.php";      // Include edit_posts
                break;
            
            default:
                include "includes/view_all_posts.php";      // Include view_all_posts by default
                break;
        }


    }


    // Check Query and display a meaningfull error message if there is an error.
    function querryCheck($myQuerry){
        global $connection;
        if (!$myQuerry) {
                die("Query FAILED " . mysqli_error($connection));
            }
    }


    // Sort Array
    function arraySort($array, $on, $order=SORT_ASC){
        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                break;
                case SORT_DESC:
                    arsort($sortable_array);
                break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }


    // Display different CRUD pages / forms in comments.php depending upon user's interaction
    function diffCrudInComments(){

        //  get the value from URL to check what user's want to do
        if (isset($_GET['source'])) {
            $source = $_GET['source'];
        }
        else{
            $source = "";
        }

        // Check various Case and display the correct CRUD page request 

        switch ($source) {

            case 'edit_comment':
                include "includes/edit_comments.php";      // Include edit_comments
                break;
            
            default:
                include "includes/view_all_comments.php";      // Include view_all_comments by default
                break;
        }
    }


    // Return Post Title when Post ID is provided
    function PostNameFromID($post_id){
        global $connection;
        $query = "SELECT * FROM posts WHERE post_id = $post_id ";
        $post_name = mysqli_query($connection,$query);

        // Check if the query is good
        querryCheck($post_name);

        while($row = mysqli_fetch_assoc($post_name)){
        $post_title = $row['post_title'];
        return $post_title;
        }

    }

    // Query all the comments
    function queryAllComments(){
        global $connection;
        $query = "SELECT * FROM comments ";
        $select_all_posts = mysqli_query($connection,$query);

        querryCheck($select_all_posts);

        while($row = mysqli_fetch_assoc($select_all_posts)){
            $comment_id = $row['comment_id']; 
            $comment_post_id = $row['comment_post_id']; 
            $comment_author = $row['comment_author']; 
            $comment_date = $row['comment_date']; 
            $comment_content = $row['comment_content']; 
            // $comment_content = mb_substr($comment_content, 0, 25);
            $comment_status = $row['comment_status'];
            $comment_email = $row['comment_email'];
            $comment_post_title = PostNameFromID($comment_post_id);

            
            $rows[] = compact('comment_id','comment_post_id','comment_author','comment_date','comment_content','comment_status','comment_email','comment_post_title');
            
        }
            if (empty($rows)) {     // return empty array if no results found
                $rows = array ();
            }

            return $rows;       
     }

     // View all comments
     function viewAllComments(){
         $new_array = queryAllComments();

        if (empty($new_array)) {
            echo "<div class='alert alert-danger'>";
            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
            echo "No Comments Found. Try adding some some Comments first !!";
            echo "</div>";
        }
        else{
            $new_array = arraySort($new_array, 'comment_id', SORT_DESC);
            foreach ($new_array as $key => $value) {
                echo "<tr>";
                echo "<td class='hide-m'>{$value['comment_id']}</td>";
                echo "<td><a href='../post.php?p_id={$value['comment_post_id']}' target='_blank'>{$value['comment_post_title']}</a></td>";
                echo "<td>{$value['comment_content']}</td>";
                echo "<td class='hide-m'>{$value['comment_author']}</td>";
                echo "<td class='hide-m'>{$value['comment_email']}</td>";
                echo "<td>{$value['comment_status']}</td>";
                echo "<td class='hide-m'>{$value['comment_date']}</td>";
                echo "<td><a href='comments.php?source=edit_comment&comment_id={$value['comment_id']}'> Edit </a> | ";
                if ($value["comment_status"] == "approved") {
                    echo "<a href='comments.php?decline={$value['comment_id']}'> Decline </a> | ";
                }
                else{
                    echo "<a href='comments.php?approve={$value['comment_id']}'> Approve </a> | ";
                }
                echo "<a href='comments.php?delete={$value['comment_id']}'> Delete </a></td>";
                echo "</tr>";
            }
        }
    }


    //  Delete Selected Comments
    function deleteComments(){
        global $connection;
        // Delete Selected Categories
        if (isset($_GET['delete'])) {
            
            $comment_id_delete = $_GET['delete'];

            // if comments status is approved then decrease the no of comment in posts.
            $comment_status = geCommentStatusByID($comment_id_delete);
            if ($comment_status == 'approved') {
                // Update comments count by -1 
                $comment_post_id = getPostIDbyCommentID($comment_id_delete);
                $query = "UPDATE POSTS SET post_comment_count = post_comment_count - 1 ";
                $query .= "WHERE post_id = $comment_post_id ";

                $update_post_comment_count = mysqli_query($connection,$query);

               // Check if the query is good
               querryCheck($update_post_comment_count);
            }


            $query = "DELETE FROM comments WHERE comment_id = {$comment_id_delete}";
            $detele_comment = mysqli_query($connection, $query);
            // Check if the query is good
            querryCheck($detele_comment);

            header("Location: comments.php");
        }
    }


    // Edit Comments: Step 1 - Display the existing comments inside the input fields
    function editCommentsStep1(){
        global $connection;
        if (isset($_GET['comment_id'])) {
            $comment_id_update = $_GET['comment_id'];
            $query = "SELECT * FROM comments WHERE comment_id = $comment_id_update ";
            $edit_post_comment_id = mysqli_query($connection, $query);

            // Check if the query is good
            querryCheck($edit_post_comment_id);

            while($row = mysqli_fetch_assoc($edit_post_comment_id)){
                $comment_id = $row['comment_id'];
                $comment_status = $row['comment_status'];
                $comment_content = $row['comment_content'];
                $comment_author = $row['comment_author'];
                $comment_email = $row['comment_email'];
                return compact('comment_id','comment_status','comment_content','comment_author','comment_email');                              
            }
        }

    }

    // Step 2: Update the entered comment content when Update button is pressed
    function editCommentsStep2(){
        global $connection;

        // retriving couple values from editCommentsStep1() to resuse here 
        $get_val = editCommentsStep1();
        $comment_id = $get_val['comment_id'];
        
        if (isset($_POST['update_comment'])) {
            //$comment_status = $_POST['comment_status'];
            $comment_content = $_POST['comment_content'];
            $comment_author = $_POST['comment_author'];
            $comment_email = $_POST['comment_email'];

            $query = "UPDATE comments SET ";
            //$query .= "comment_status = '{$comment_status}', ";
            $query .= "comment_content = '{$comment_content}', ";
            $query .= "comment_author = '{$comment_author}', ";
            $query .= "comment_email = '{$comment_email}' ";
            $query .= "WHERE comment_id = {$comment_id} ";

            $update_comment = mysqli_query($connection, $query);
            // Check if the query is good
            querryCheck($update_comment);


            header("Location: comments.php?source=edit_comment&comment_id={$comment_id}");
        }
    }


    // Approve / Decline Comments

    function approveDeclineComments(){
        global $connection;
        // Decline Selected Comments
        if (isset($_GET['decline'])) {
            
            $comment_id_decline = $_GET['decline'];
            $query = "UPDATE comments SET comment_status = 'decline' WHERE comment_id = {$comment_id_decline}";
            $decline_comment = mysqli_query($connection, $query);
            // Check if the query is good
            querryCheck($decline_comment);

            // Update comments count by -1 
            $comment_post_id = getPostIDbyCommentID($comment_id_decline);
            $query = "UPDATE POSTS SET post_comment_count = post_comment_count - 1 ";
            $query .= "WHERE post_id = $comment_post_id ";

            $update_post_comment_count = mysqli_query($connection,$query);

           // Check if the query is good
           querryCheck($update_post_comment_count);

            header("Location: comments.php");
        }

        // Approve Selected Comments
        if (isset($_GET['approve'])) {
            
            $comment_id_approve = $_GET['approve'];
            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$comment_id_approve}";
            $approve_comment = mysqli_query($connection, $query);
            // Check if the query is good
            querryCheck($approve_comment);

            // Update comments count by +1
            $comment_post_id = getPostIDbyCommentID($comment_id_approve);
            $query = "UPDATE POSTS SET post_comment_count = post_comment_count + 1 ";
            $query .= "WHERE post_id = $comment_post_id ";

            $update_post_comment_count = mysqli_query($connection,$query);

           // Check if the query is good
           querryCheck($update_post_comment_count);

            header("Location: comments.php");
        }

    }


    // Get Associated Post ID by providing comment ID
    function getPostIDbyCommentID($comment_id){
        global $connection;
        $query = "SELECT * FROM comments WHERE comment_id = $comment_id ";
        $find_post_id = mysqli_query($connection,$query);

        querryCheck($find_post_id);

        while($row = mysqli_fetch_assoc($find_post_id)){
            $post_id = $row['comment_post_id']; 
            return $post_id;
        }

    }


    // Get comment Status by providing comment ID
    function geCommentStatusByID($comment_id){
        global $connection;
        $query = "SELECT * FROM comments WHERE comment_id = $comment_id ";
        $comment_status = mysqli_query($connection,$query);

        querryCheck($comment_status);

        while($row = mysqli_fetch_assoc($comment_status)){
            $comment_current_status = $row['comment_status']; 
            return $comment_current_status;
        }

    }


    // Query all the users
    function queryAllUsers(){
        global $connection;
        $query = "SELECT * FROM users";
        $select_all_users = mysqli_query($connection,$query);

        querryCheck($select_all_users);

        while($row = mysqli_fetch_assoc($select_all_users)){
            $user_id = $row['user_id']; 
            $username = $row['username']; 
            $password = $row['password']; 
            $user_firstname = $row['user_firstname']; 
            $user_lastname = $row['user_lastname']; 
            $user_image = $row['user_image']; 
            $user_email = $row['user_email']; 
            $user_role = $row['user_role'];
            $user_status = $row['user_status'];
            $user_randSalt = $row['user_randSalt'];

            
            $rows[] = compact('user_id','username','password','user_firstname','user_lastname','user_image','user_email','user_role','user_status','user_randSalt');
            
        }
            if (empty($rows)) {     // return empty array if no results found
                $rows = array ();
            }

            return $rows;       
     }


    // View All Users
    function viewUsers(){
         $new_array = queryAllUsers();

        if (empty($new_array)) {
            echo "<div class='alert alert-danger'>";
            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
            echo "No Users Found. Try adding some users first !!";
            echo "</div>";
        }
        else{
            $new_array = arraySort($new_array, 'user_firstname', SORT_ASC);
            foreach ($new_array as $key => $value) {
                echo "<tr>";
                echo "<td class='hide-m'>{$value['user_id']}</td>";
                echo "<td>{$value['username']}</td>";
                echo "<td class='hide-m'>{$value['user_firstname']}</td>";
                echo "<td class='hide-m'>{$value['user_lastname']}</td>";
                echo "<td>{$value['user_email']}</td>";
                echo "<td class='hide-m'>{$value['user_role']}</td>";
                echo "<td class='hide-m'>{$value['user_status']}</td>";
                echo "<td><a href='users.php?source=edit_users&user_id={$value['user_id']}'> Edit</a> | ";
                if ($value["user_status"] == "approved") {
                    echo "<a href='users.php?decline={$value['user_id']}'> Decline </a> | ";
                }
                else{
                    echo "<a href='users.php?approve={$value['user_id']}'> Approve </a> | ";
                }
                echo "<a href='users.php?delete={$value['user_id']}'> Delete </a></td>";
                echo "</tr>";
            }
        }
    }

    // Add New Users
    function addUsers(){
        global $connection;
        if (isset($_POST['create_users'])) {
            $username = $_POST['username']; 
            $password = $_POST['password']; 
            $user_firstname = $_POST['user_firstname']; 
            $user_lastname = $_POST['user_lastname']; 
            $user_email = $_POST['user_email']; 
            $user_role = $_POST['user_role'];
            $user_status = $_POST['user_status'];
            // $user_randSalt = $_POST['user_randSalt'];
            $user_randSalt = 0;
            $user_image = basename($_FILES['user_image']['name']);
            $user_image_temp = $_FILES['user_image']['tmp_name'];

           // move uploaded file from temp location to images folder of CMS
           move_uploaded_file($user_image_temp, "images/users/{$user_image}");

         
           $query = "INSERT INTO users(username, password, user_firstname, user_lastname, user_image, user_email, user_role, user_status,user_randSalt ) ";
           $query .= "VALUES('{$username}','{$password}','{$user_firstname}','{$user_lastname}','{$user_image}','{$user_email}','{$user_role}','{$user_status}',{$user_randSalt}) ";


           //  $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status, post_comment_count) ";
           // $query .= "VALUES('{$post_title}', '{$post_author}', '{$post_date}', '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";


           $add_new_user = mysqli_query($connection,$query);

           // Check if the query is good
           querryCheck($add_new_user);

           $user_id = mysqli_insert_id($connection);

           header("Location: users.php?source=edit_users&user_id={$user_id}");

        }
    }

    // Edit users: Step 1 - Display the existing users inside the input fields
    function editUsersStep1(){
        global $connection;
        if (isset($_GET['user_id'])) {
            $user_id_update = $_GET['user_id'];
            $query = "SELECT * FROM users WHERE user_id = $user_id_update ";
            $edit_user = mysqli_query($connection, $query);

            // Check if the query is good
            querryCheck($edit_user);

            while($row = mysqli_fetch_assoc($edit_user)){
                $user_id = $row['user_id']; 
                $username = $row['username']; 
                $password = $row['password']; 
                $user_firstname = $row['user_firstname']; 
                $user_lastname = $row['user_lastname']; 
                $user_image = $row['user_image']; 
                $user_email = $row['user_email']; 
                $user_role = $row['user_role'];
                $user_status = $row['user_status'];
                $user_randSalt = $row['user_randSalt'];
                return compact('user_id','username','password','user_firstname','user_lastname','user_image','user_email','user_role','user_status','user_randSalt');                              
            }
        }

    }

    // Step 2: Update the entered comment content when Update button is pressed
    function editUsersStep2(){
        global $connection;

        $get_val = editUsersStep1();
        $user_id = $get_val['user_id'];
        $user_image_current = $get_val['user_image'];
       
        if (isset($_POST['update_users'])) {
            $username = $_POST['username']; 
            $password = $_POST['password']; 
            $user_firstname = $_POST['user_firstname']; 
            $user_lastname = $_POST['user_lastname']; 
            $user_email = $_POST['user_email']; 
            $user_role = $_POST['user_role'];
            $user_status = $_POST['user_status'];
            // $user_randSalt = $_POST['user_randSalt'];
            $user_image = basename($_FILES['user_image']['name']);
            $user_image_temp = $_FILES['user_image']['tmp_name'];

            if ($user_image_temp = "" || empty($user_image_temp)) {
                $user_image = $user_image_current; 
            }else{
                $user_image = $user_image;
            }

            // move uploaded file from temp location to images folder of CMS
            move_uploaded_file($user_image_temp, "/images/users/{$user_image}");

            $query = "UPDATE users SET ";
            $query .= "username = '{$username}', ";
            $query .= "password = '{$password}', ";
            $query .= "user_firstname = '{$user_firstname}', ";
            $query .= "user_lastname = '{$user_lastname}', ";
            $query .= "user_email = '{$user_email}', ";
            $query .= "user_role = '{$user_role}', ";
            $query .=  "user_status = '{$user_status}', ";
            $query .=  "user_image = '{$user_image}' ";
            $query .= "WHERE user_id = {$user_id} ";

            $update_user = mysqli_query($connection, $query);
            // Check if the query is good
            querryCheck($update_user);

            header("Location: users.php?source=edit_users&user_id={$user_id}");
        }
    }

    // Delete Users
    function deleteUsers(){
        global $connection;
        if (isset($_GET['delete'])) {
            $delete_user_id = $_GET['delete'];
            $query = "DELETE FROM users WHERE user_id = {$delete_user_id} ";
            $delete_selected_user = mysqli_query($connection,$query);
            // Check if the query is good
           querryCheck($delete_selected_user);
           header("Location: users.php");

        }
    }

    // Approve / Decline users

    function approveDeclineUsers(){
        global $connection;
        // Decline Selected users
        if (isset($_GET['decline'])) {
            
            $user_id_decline = $_GET['decline'];
            $query = "UPDATE users SET user_status = 'declined' WHERE user_id = {$user_id_decline}";
            $decline_user = mysqli_query($connection, $query);
            // Check if the query is good
            querryCheck($decline_user);

            header("Location: users.php");
        }

        // Approve Selected users
        if (isset($_GET['approve'])) {
            
            $user_id_approve = $_GET['approve'];
            $query = "UPDATE users SET user_status = 'approved' WHERE user_id = {$user_id_approve}";
            $approve_user = mysqli_query($connection, $query);
            // Check if the query is good
            querryCheck($approve_user);

            header("Location: users.php");
        }

    }


    // Display different CRUD pages / forms in users.php depending upon user's interaction
    function diffCrudInUsers(){

        //  get the value from URL to check what user's want to do
        if (isset($_GET['source'])) {
            $source = $_GET['source'];
        }
        else{
            $source = "";
        }

        // Check various Case and display the correct CRUD page request 

        switch ($source) {
            case 'add_users':
                include "includes/add_users.php";      // Include edit_users
                break;

            case 'edit_users':
                include "includes/edit_users.php";      // Include edit_users
                break;
            
            default:
                include "includes/view_all_users.php";      // Include view_all_users by default
                break;
        }
    }




?>