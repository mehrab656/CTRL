<?php

namespace Order\CTRL;


class EndPointList {


    private static $instance;
    public static function get_instance(){
        if (null=== self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {

    }


	public function render_endpoint_teable(){
		?>
		<div class="wrap">
			<h1 class="wp-heading-inline">
				Users</h1>

			<a href="http://wp-project.test/wp-admin/user-new.php" class="page-title-action">Add New</a>

			<hr class="wp-header-end">

			<h2 class="screen-reader-text">Filter users list</h2><ul class="subsubsub">
				<li class="all"><a href="users.php" class="current" aria-current="page">All <span class="count">(1)</span></a> |</li>
				<li class="administrator"><a href="users.php?role=administrator">Administrator <span class="count">(1)</span></a></li>
			</ul>
			<form method="get">

				<p class="search-box">
					<label class="screen-reader-text" for="user-search-input">Search Users:</label>
					<input type="search" id="user-search-input" name="s" value="">
					<input type="submit" id="search-submit" class="button" value="Search Users"></p>


				<input type="hidden" id="_wpnonce" name="_wpnonce" value="8f067abd70"><input type="hidden" name="_wp_http_referer" value="/wp-admin/users.php">	<div class="tablenav top">

					<div class="alignleft actions bulkactions">
						<label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label><select name="action" id="bulk-action-selector-top">
							<option value="-1">Bulk actions</option>
							<option value="delete">Delete</option>
							<option value="resetpassword">Send password reset</option>
						</select>
						<input type="submit" id="doaction" class="button action" value="Apply">
					</div>
					<div class="alignleft actions">
						<label class="screen-reader-text" for="new_role">Change role to…</label>
						<select name="new_role" id="new_role">
							<option value="">Change role to…</option>

							<option value="subscriber">Subscriber</option>
							<option value="contributor">Contributor</option>
							<option value="author">Author</option>
							<option value="editor">Editor</option>
							<option value="administrator">Administrator</option>			<option value="none">— No role for this site —</option>
						</select>
						<input type="submit" name="changeit" id="changeit" class="button" value="Change">		</div>
					<div class="tablenav-pages one-page"><span class="displaying-num">1 item</span>
						<span class="pagination-links"><span class="tablenav-pages-navspan button disabled" aria-hidden="true">«</span>
<span class="tablenav-pages-navspan button disabled" aria-hidden="true">‹</span>
<span class="paging-input"><label for="current-page-selector" class="screen-reader-text">Current Page</label><input class="current-page" id="current-page-selector" type="text" name="paged" value="1" size="1" aria-describedby="table-paging"><span class="tablenav-paging-text"> of <span class="total-pages">1</span></span></span>
<span class="tablenav-pages-navspan button disabled" aria-hidden="true">›</span>
<span class="tablenav-pages-navspan button disabled" aria-hidden="true">»</span></span></div>
					<br class="clear">
				</div>
				<h2 class="screen-reader-text">Users list</h2><table class="wp-list-table widefat fixed striped table-view-list users">
					<thead>
					<tr>
						<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox"></td><th scope="col" id="username" class="manage-column column-username column-primary sortable desc"><a href="http://wp-project.test/wp-admin/users.php?orderby=login&amp;order=asc"><span>Username</span><span class="sorting-indicator"></span></a></th><th scope="col" id="name" class="manage-column column-name">Name</th><th scope="col" id="email" class="manage-column column-email sortable desc"><a href="http://wp-project.test/wp-admin/users.php?orderby=email&amp;order=asc"><span>Email</span><span class="sorting-indicator"></span></a></th><th scope="col" id="role" class="manage-column column-role">Role</th><th scope="col" id="posts" class="manage-column column-posts num">Posts</th>	</tr>
					</thead>

					<tbody id="the-list" data-wp-lists="list:user">

					<tr id="user-1"><th scope="row" class="check-column"><label class="screen-reader-text" for="user_1">Select admin</label><input type="checkbox" name="users[]" id="user_1" class="administrator" value="1"></th><td class="username column-username has-row-actions column-primary" data-colname="Username"><img alt="" src="http://2.gravatar.com/avatar/b7c4adaab510e77bec63d70e543ad487?s=32&amp;d=mm&amp;r=g" srcset="http://2.gravatar.com/avatar/b7c4adaab510e77bec63d70e543ad487?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="32" width="32" loading="lazy"> <strong><a href="http://wp-project.test/wp-admin/profile.php?wp_http_referer=%2Fwp-admin%2Fusers.php">admin</a></strong><br><div class="row-actions"><span class="edit"><a href="http://wp-project.test/wp-admin/profile.php?wp_http_referer=%2Fwp-admin%2Fusers.php">Edit</a> | </span><span class="view"><a href="http://wp-project.test/author/admin/" aria-label="View posts by admin">View</a></span></div><button type="button" class="toggle-row"><span class="screen-reader-text">Show more details</span></button></td><td class="name column-name" data-colname="Name"><span aria-hidden="true">—</span><span class="screen-reader-text">Unknown</span></td><td class="email column-email" data-colname="Email"><a href="mailto:hossainmehraab@gmail.com">hossainmehraab@gmail.com</a></td><td class="role column-role" data-colname="Role">Administrator</td><td class="posts column-posts num" data-colname="Posts"><a href="edit.php?author=1" class="edit"><span aria-hidden="true">1</span><span class="screen-reader-text">1 post by this author</span></a></td></tr>	</tbody>

					<tfoot>
					<tr>
						<td class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-2">Select All</label><input id="cb-select-all-2" type="checkbox"></td><th scope="col" class="manage-column column-username column-primary sortable desc"><a href="http://wp-project.test/wp-admin/users.php?orderby=login&amp;order=asc"><span>Username</span><span class="sorting-indicator"></span></a></th><th scope="col" class="manage-column column-name">Name</th><th scope="col" class="manage-column column-email sortable desc"><a href="http://wp-project.test/wp-admin/users.php?orderby=email&amp;order=asc"><span>Email</span><span class="sorting-indicator"></span></a></th><th scope="col" class="manage-column column-role">Role</th><th scope="col" class="manage-column column-posts num">Posts</th>	</tr>
					</tfoot>

				</table>
				<div class="tablenav bottom">

					<div class="alignleft actions bulkactions">
						<label for="bulk-action-selector-bottom" class="screen-reader-text">Select bulk action</label><select name="action2" id="bulk-action-selector-bottom">
							<option value="-1">Bulk actions</option>
							<option value="delete">Delete</option>
							<option value="resetpassword">Send password reset</option>
						</select>
						<input type="submit" id="doaction2" class="button action" value="Apply">
					</div>
					<div class="alignleft actions">
						<label class="screen-reader-text" for="new_role2">Change role to…</label>
						<select name="new_role2" id="new_role2">
							<option value="">Change role to…</option>

							<option value="subscriber">Subscriber</option>
							<option value="contributor">Contributor</option>
							<option value="author">Author</option>
							<option value="editor">Editor</option>
							<option value="administrator">Administrator</option>			<option value="none">— No role for this site —</option>
						</select>
						<input type="submit" name="changeit2" id="changeit2" class="button" value="Change">		</div>
					<div class="tablenav-pages one-page"><span class="displaying-num">1 item</span>
						<span class="pagination-links"><span class="tablenav-pages-navspan button disabled" aria-hidden="true">«</span>
<span class="tablenav-pages-navspan button disabled" aria-hidden="true">‹</span>
<span class="screen-reader-text">Current Page</span><span id="table-paging" class="paging-input"><span class="tablenav-paging-text">1 of <span class="total-pages">1</span></span></span>
<span class="tablenav-pages-navspan button disabled" aria-hidden="true">›</span>
<span class="tablenav-pages-navspan button disabled" aria-hidden="true">»</span></span></div>
					<br class="clear">
				</div>
			</form>

			<div class="clear"></div>
		</div>
<?php
	}
}