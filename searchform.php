<form class="navbar-form navbar-right" role="search" action="<?php echo home_url(); ?>">
  <div class="form-group">
    <input type="text" name="s" value="<?php the_search_query(); ?>" class="form-control" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
</form>
