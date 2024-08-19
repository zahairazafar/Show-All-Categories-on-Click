<div class="container-fluid">
    <div class="inner-container cat-list-container">
        <!-- Begin unordered list for displaying categories -->
        <ul id="category-list">
            <?php
            // Retrieve all categories, including empty ones
            $categories = get_categories(array(
              // Order categories by ID
                'orderby' => 'id', 
              // Show even empty categories
                'hide_empty' => false, 
            ));

            // Initialize a counter to limit the visible categories
            $count = 0;
            foreach ($categories as $category) {
               // Assign the 'hidden' class to categories after the fourth one.
              // Categories with a position number greater than or equal to 4 will be hidden by default.
                $class = ($count >= 4) ? 'hidden' : '';
                echo '<li class="' . $class . '"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                $count++;
            }
            ?>
        </ul>

        <!-- "Show All" Button to reveal hidden categories -->
        <a href="#" id="show-all-categories">Show All</a>
    </div>
</div>

<script>
    // JavaScript to handle the "Show All" button click event
    document.getElementById('show-all-categories').addEventListener('click', function(event) {
       // Prevent the default link behavior
        event.preventDefault();
        // Select all hidden categories and remove the 'hidden' class
        var hiddenCategories = document.querySelectorAll('#category-list li.hidden');
        hiddenCategories.forEach(function(category) {
            category.classList.remove('hidden');
        });
        // Hide the "Show All" button after revealing categories
        this.style.display = 'none';
    });
</script>

<style>
    /* CSS to hide categories initially beyond the 4th */
    .hidden {
        display: none;
    }
</style>
