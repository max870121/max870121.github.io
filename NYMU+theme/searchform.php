<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url('/');?>">
		<!-- Search form -->
    	 <div class="col-lg-12">
                <div class="input-group">
                    <input type="text" class="form-control" value="" name="s" id="s" placeholder="<?php the_search_query();?>" >
                        <button type="submit"class="btn btn-primary">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                </div>
        </div>
</form>