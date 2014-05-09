var rf_shortcode = {
	
	init:function(){
		jQuery('.shortcode_generator select').val('');
		jQuery('.shortcode_generator select').change(function(){
			jQuery(".shortcode_wrap").hide();
			if(this.value !=''){
				var wrap = jQuery("#shortcode_"+this.value).show();
				if(wrap.children('.sub_shortcode_wrap').size() == 0){
					wrap.find('.toggle-button:checkbox').iphoneStyle();
					wrap.find('select.tri-toggle-button').iphoneStyleTriToggle();
				}
			}
		});
		
		jQuery('.shortcode_sub_generator select').val('');
		jQuery('.shortcode_sub_generator select').change(function(){
			jQuery(this).closest('.shortcode_wrap').children('.sub_shortcode_wrap').hide();
			if(this.value !=''){
				sub = jQuery("#sub_shortcode_"+this.value).show();
				sub.find('.toggle-button:checkbox').iphoneStyle();
				sub.find('select.tri-toggle-button').iphoneStyleTriToggle();
			}
		});		
		
		jQuery('#shortcode_send').click(function(){
			rf_shortcode.sendToEditor();
		});
		
		// List Items
		var list_items_number = jQuery('[name="sc_typography_wt_styledList_number"]').val();
		jQuery('#sub_shortcode_wt_styledList table tr').each(function(i){
			if(i>(2+list_items_number*1)){
				jQuery(this).hide();
			}else{
				jQuery(this).show();
			}
		});	
				
		jQuery('[name="sc_typography_wt_styledList_number"]').change(function(){
			var list_items_number = jQuery(this).val();
			jQuery('#sub_shortcode_wt_styledList table tr').each(function(i){
				if(i>(2+list_items_number*1)){
					jQuery(this).hide();
				}else{
					jQuery(this).show();
				}
			});
		});
		
		// Progress Bar
		var progress_number = jQuery('[name="sc_widget_wt_progressBar_progressBar_number"]').val();
		jQuery('#sub_shortcode_wt_progressBar table tr').each(function(i){
			if(i>(1+progress_number*3)){
				jQuery(this).hide();
			}else{
				jQuery(this).show();
			}
		});	
				
		jQuery('[name="sc_widget_wt_progressBar_progressBar_number"]').change(function(){
			var progresr_number = jQuery(this).val();
			jQuery('#sub_shortcode_wt_progressBar table tr').each(function(i){
				if(i>(1+progresr_number*3)){
					jQuery(this).hide();
				}else{
					jQuery(this).show();
				}
			});
		});
		
		// Flex Slideshow
		var flex_images_number = jQuery('[name="sc_wt_slideshow_flex_number"]').val();
		jQuery('#sub_shortcode_flex table tr').each(function(i){
			if(i>(16+flex_images_number*3)){
				jQuery(this).hide();
			}else{
				jQuery(this).show();
			}
		});				
		jQuery('[name="sc_wt_slideshow_flex_number"]').change(function(){
			var flex_images_number = jQuery(this).val();
			jQuery('#sub_shortcode_flex table tr').each(function(i){
				if(i>(16+flex_images_number*3)){
					jQuery(this).hide();
				}else{
					jQuery(this).show();
				}
			});
		});
		
		// Nivo Slideshow
		var nivo_images_number = jQuery('[name="sc_wt_slideshow_nivo_number"]').val();
		jQuery('#sub_shortcode_nivo table tr').each(function(i){
			if(i>(16+nivo_images_number*3)){
				jQuery(this).hide();
			}else{
				jQuery(this).show();
			}
		});				
		jQuery('[name="sc_wt_slideshow_nivo_number"]').change(function(){
			var nivo_images_number = jQuery(this).val();
			jQuery('#sub_shortcode_nivo table tr').each(function(i){
				if(i>(16+nivo_images_number*3)){
					jQuery(this).hide();
				}else{
					jQuery(this).show();
				}
			});
		});
		
		// Rotator Items
		var rotator_number = jQuery('[name="sc_wt_rotator_number"]').val();
		jQuery('#shortcode_wt_rotator table tr').each(function(i){
			if(i>(4+rotator_number*1)){
				jQuery(this).hide();
			}else{
				jQuery(this).show();
			}
		});			
		jQuery('[name="sc_wt_rotator_number"]').change(function(){
			var rotator_number = jQuery(this).val();
			jQuery('#shortcode_wt_rotator table tr').each(function(i){
				if(i>(4+rotator_number*1)){
					jQuery(this).hide();
				}else{
					jQuery(this).show();
				}
			});
		});		
		
		// GMap Markers
		var gmap_markers_number = jQuery('[name="sc_wt_gMap_markers_number"]').val();
		jQuery('#shortcode_wt_gMap table tr').each(function(i){
			if(i>(28+gmap_markers_number*4)){
				jQuery(this).hide();
			}else{
				jQuery(this).show();
			}
		});				
		jQuery('[name="sc_wt_gMap_markers_number"]').change(function(){
			var gmap_markers_number = jQuery(this).val();
			jQuery('#shortcode_wt_gMap table tr').each(function(i){
				if(i>(28+gmap_markers_number*4)){
					jQuery(this).not(".controls, .style_opt").hide();
				}else{
					jQuery(this).not(".controls, .style_opt").show();
				}
			});
		});	
		
		// Social Icons Team Box
			
		jQuery('#sc_wt_box_styles_wt_team_box_icons').change(function(){
			jQuery('.social_icon').hide();
			jQuery('option:selected',this).each(function(){
				jQuery('.'+this.value+'_link').show();
			});
		})
		
		// Social Icons
			
		jQuery('#sc_widget_social_icons').change(function(){
			jQuery('.social_icon').hide();
			jQuery('option:selected',this).each(function(){
				jQuery('.'+this.value+'_link').show();
			});
		});	
		
		// Social Icons Alt
			
		jQuery('#sc_widget_social_alt_icons_alt').change(function(){
			jQuery('.social_icon_alt').hide();
			jQuery('option:selected',this).each(function(){
				jQuery('.'+this.value+'_link_alt').show();
			});
		});		
		
		// Blog Posts Carousel
		
		var blog_carousel = jQuery('[name="sc_wt_blog_posts_posts_slide"]:checked');
		
		jQuery('#shortcode_wt_blog_posts table tr').each(function(i){
			if (blog_carousel.length > 0) {
				if(i>1 && i<4){
					jQuery(this).show();
				}
			}
			else {
				if(i>1 && i<4){
					jQuery(this).hide();
				}
			}
		});					
				
		jQuery('[name="sc_wt_blog_posts_posts_slide"]').change(function(){
			var blog_carousel = jQuery(this.checked);
			jQuery('#shortcode_wt_blog_posts table tr').each(function(i){
				if (blog_carousel.length > 0) {
					if(i>1 && i<4){
						jQuery(this).show();
					}
				}
				else {
					if(i>1 && i<4){
						jQuery(this).hide();
					}
				}				
			});
		});		
		
		// Blog Columns Effect
		
		var blog_cols = jQuery('[name="sc_wt_blog_posts_columns"]').val();
		
		jQuery('#shortcode_wt_blog_posts table tr').each(function(i){
			if (blog_cols != "1") {
				if(i>5 && i<8){
					jQuery(this).show();
				}
			}
			else {
				if(i>5 && i<8){
					jQuery(this).hide();
				}
			}
		});					
				
		jQuery('[name="sc_wt_blog_posts_columns"]').change(function(){
			var blog_cols = jQuery(this).val();
			jQuery('#shortcode_wt_blog_posts table tr').each(function(i){
				if (blog_cols != "1") {
					if(i>5 && i<8){
						jQuery(this).show();
					}
				}
				else {
					if(i>5 && i<8){
						jQuery(this).hide();
					}
				}				
			});
		});		
		
		// Portfolio Posts Carousel
		
		var port_carousel = jQuery('[name="sc_wt_portfolio_port_slide"]:checked');
		
		jQuery('#shortcode_wt_portfolio table tr').each(function(i){
			if (port_carousel.length > 0) {
				if(i>0 && i<3){
					jQuery(this).show();
				}
			}
			else {
				if(i>0 && i<3){
					jQuery(this).hide();
				}
			}
		});	
				
				
		jQuery('[name="sc_wt_portfolio_port_slide"]').change(function(){
			var port_carousel = jQuery(this.checked);
			jQuery('#shortcode_wt_portfolio table tr').each(function(i){
				if (port_carousel.length > 0) {
					if(i>0 && i<3){
						jQuery(this).show();
					}
				}
				else {
					if(i>0 && i<3){
						jQuery(this).hide();
					}
				}				
			});
		});
						
		// Tabs
		var tabs_number = jQuery('[name="sc_wt_tabs_number"]').val();
		jQuery('#shortcode_wt_tabs table tr').each(function(i){
			if(i>(2+tabs_number*2)){
				jQuery(this).hide();
			}else{
				jQuery(this).show();
			}
		});
		var select=jQuery('[name="sc_wt_tabs_initialTab"]');
		for (i=1;i<=tabs_number;i++){
			select.append(jQuery("<option></option>").attr("value",i).text(i)); 
		}
				
		jQuery('[name="sc_wt_tabs_number"]').change(function(){
			var tabs_number = jQuery(this).val();
			jQuery('#shortcode_wt_tabs table tr').each(function(i){
				if(i>(2+tabs_number*2)){
					jQuery(this).hide();
				}else{
					jQuery(this).show();
				}
			});
			var select=jQuery('[name="sc_wt_tabs_initialTab"]');
			var selectedOption = select.val();
			jQuery('option', select).remove();
			for (i=1;i<=tabs_number;i++){
				select.append(jQuery("<option></option>").attr("value",i).text(i)); 
			}
		});
		
		// Accordions
		var accordion_number = jQuery('[name="sc_wt_accordions_number"]').val();
		jQuery('#shortcode_wt_accordions table tr').each(function(i){
			if(i>(2+accordion_number*2)){
				jQuery(this).hide();
			}else{
				jQuery(this).show();
			}
		});
		var select=jQuery('[name="sc_wt_accordions_initialPane"]');
		var options = select.attr('options');
		for (i=1;i<=accordion_number;i++){
			 select.append(jQuery("<option></option>").attr("value",i).text(i)); 
		}
		
		jQuery('[name="sc_wt_accordions_number"]').change(function(){
			var accordion_number = jQuery(this).val();
			jQuery('#shortcode_wt_accordions table tr').each(function(i){
				if(i>(2+accordion_number*2)){
					jQuery(this).hide();
				}else{
					jQuery(this).show();
				}
			});
			var select=jQuery('[name="sc_wt_accordions_initialPane"]');
			var selectedOption = select.val();
			jQuery('option', select).remove();
			for (i=1;i<=accordion_number;i++){
				select.append(jQuery("<option></option>").attr("value",i).text(i)); 
			}
		});	
		
		// GMap
		jQuery('[name="sc_wt_gMap_controls"]').closest('tr').siblings('.controls').hide();
						
		jQuery('[name="sc_wt_gMap_controls"]').change(function(){
			if(this.checked){
				jQuery(this).closest('tr').siblings('.controls').show();
			}else{
				jQuery(this).closest('tr').siblings('.controls').hide();
			}
		});	
		
		jQuery('[name="sc_wt_gMap_styling"]').closest('tr').siblings('.style_opt').hide();
						
		jQuery('[name="sc_wt_gMap_styling"]').change(function(){
			if(this.checked){
				jQuery(this).closest('tr').siblings('.style_opt').show();
			}else{
				jQuery(this).closest('tr').siblings('.style_opt').hide();
			}
		});	
		
	},
generate:function(){
		var type = jQuery('.shortcode_generator select').val();
		switch( type ){
		case 'typography':
			var sub_type = rf_shortcode.getVal('typography','generator');
			switch(sub_type){
			case 'wt_styledList':
				var fontFace = rf_shortcode.getVal('typography','wt_styledList','icon_fontface');
				var style = rf_shortcode.getVal('typography','wt_styledList','style');
				var number = rf_shortcode.getVal('typography','wt_styledList','number');
				var ret = '\n[wt_list';				
				if(fontFace === true){
					ret += ' fontFace="true"';
				}
				if(style !== ''){
					ret += ' style="'+style+'"';
				}	
				ret +=']\n';			
				for(var i=1;i<=number;i++){
					ret += '[li]'+rf_shortcode.getVal('typography','wt_styledList','content_'+i)+'[/li]\n';
				}
				ret += '[/wt_list]\n';
				return ret;
				break;
			case 'wt_icon':
				var type = rf_shortcode.getVal('typography','wt_icon','type');
				var style = rf_shortcode.getVal('typography','wt_icon','style');
				if(type !== ''){
					type= ' type="'+type+'"';
				}
				if(style !== ''){
					style= ' style="'+style+'"';
				}
				return '[wt_icon'+type+style+']'+rf_shortcode.getVal('typography','wt_icon','text')+'[/wt_icon]';					
				break;
			case 'wt_icon_text':
				var fontFace = rf_shortcode.getVal('typography','wt_icon_text','icon_fontface');
				var style = rf_shortcode.getVal('typography','wt_icon_text','style');
				if(fontFace === true){
					fontFace = ' fontFace="true"';
				}else{
					fontFace = '';
				}
				if(style !== ''){
					style= ' style="'+style+'"';
				}
				return '[wt_icon_text'+fontFace+style+']'+rf_shortcode.getVal('typography','wt_icon_text','text')+'[/wt_icon_text]';					
				break;
			case 'wt_icon_link':
				var fontFace = rf_shortcode.getVal('typography','wt_icon_link','icon_fontface');
				var style = rf_shortcode.getVal('typography','wt_icon_link','style');
				var style = rf_shortcode.getVal('typography','wt_icon_link','style');
				var href = rf_shortcode.getVal('typography','wt_icon_link','href');
				var title = rf_shortcode.getVal('typography','wt_icon_link','title');
				var target = rf_shortcode.getVal('typography','wt_icon_link','target');
				if(fontFace === true){
					fontFace = ' fontFace="true"';
				}else{
					fontFace = '';
				}
				if(style !== ''){
					style= ' style="'+style+'"';
				}
				if(href !== ''){
					href= ' href="'+href+'"';
				}
				if(title !== ''){
					title= ' title="'+title+'"';
				}
				if(target!= ''){
					target = ' target="'+target+'"';
				}
				return '[wt_icon_link'+fontFace+style+href+title+target+']'+rf_shortcode.getVal('typography','wt_icon_link','text')+'[/wt_icon_link]';	
				break;
			case 'wt_font_awesome':
				var icon_type = rf_shortcode.getVal('typography','wt_font_awesome','icon_type');
				var icon_style = rf_shortcode.getVal('typography','wt_font_awesome','icon_style');
				var icon_color = rf_shortcode.getVal('typography','wt_font_awesome','icon_color');
				var icon_style_color = rf_shortcode.getVal('typography','wt_font_awesome','icon_style_color');
				var icon_size = rf_shortcode.getVal('typography','wt_font_awesome','icon_size');
				var hoverEfect = rf_shortcode.getVal('typography','wt_font_awesome','hover_efect');
				var style = rf_shortcode.getVal('typography','wt_font_awesome','style');

				if(icon_type !== ''){
					icon_type= ' icon_type="'+icon_type+'"';
				}
				if(icon_style !== ''){
					icon_style= ' icon_style="'+icon_style+'"';
				}
				if(icon_style_color !== ''){
					icon_style_color= ' icon_style_color="'+icon_style_color+'"';
				}
				if(icon_color !== ''){
					icon_color = ' icon_color="'+icon_color+'"';
				}
				if(icon_size !== ''){
					icon_size= ' icon_size="'+icon_size+'"';
				}
				if(hoverEfect === true){
					hoverEfect = ' hoverEfect="true"';
				}else{
					hoverEfect = '';
				}
				if(style !== ''){
					style= ' style="'+style+'"';
				}
				return '[wt_font_awesome'+icon_type+icon_style+icon_style_color+icon_size+icon_color+hoverEfect+style+']'+rf_shortcode.getVal('typography','wt_font_awesome','text')+'[/wt_font_awesome]';	
				break;
			case 'wt_fancy_header':
				return '[wt_fancy_header'+']'+rf_shortcode.getVal('typography','wt_fancy_header','content')+'[/wt_fancy_header]';					
				break;
			case 'wt_fancy_link':
				var href = rf_shortcode.getVal('typography','wt_fancy_link','href');
				var title = rf_shortcode.getVal('typography','wt_fancy_link','title');
				var target = rf_shortcode.getVal('typography','wt_fancy_link','target');
				if(href !== ''){
					href= ' href="'+href+'"';
				}
				if(title !== ''){
					title= ' title="'+title+'"';
				}
				if(target!= ''){
					target = ' target="'+target+'"';
				}
				return '[wt_fancy_link'+href+title+target+']'+rf_shortcode.getVal('typography','wt_fancy_link','content')+'[/wt_fancy_link]';					
				break;
			case 'wt_testimonial':
				var align = rf_shortcode.getVal('typography','wt_testimonial','align');
				var author = rf_shortcode.getVal('typography','wt_testimonial','author');
				if(align !== ''){
					align = ' align="'+align+'"';
				}
				if(author !== ''){
					author = ' author="'+author+'"';
				}
				return '[wt_testimonial'+align+author+']'+ rf_shortcode.getVal('typography','wt_testimonial','content') +'[/wt_testimonial]';
				break;
			case 'wt_blockquote':
				var align = rf_shortcode.getVal('typography','wt_blockquote','align');
				var author = rf_shortcode.getVal('typography','wt_blockquote','author');
				if(align !== ''){
					align = ' align="'+align+'"';
				}
				if(author !== ''){
					author = ' author="'+author+'"';
				}
				return '[wt_blockquote'+align+author+']'+ rf_shortcode.getVal('typography','wt_blockquote','content') +'[/wt_blockquote]';
				break;
			case 'wt_pullquote':
				var align = rf_shortcode.getVal('typography','wt_pullquote','align');
				if(align !== ''){
					align = ' align="'+align+'"';
				}
				return '[wt_pullquote'+align+']'+ rf_shortcode.getVal('typography','wt_pullquote','content') +'[/wt_pullquote]';
				break;	
			case 'wt_dropcap':
				var type = rf_shortcode.getVal('typography','wt_dropcap','type');
				var color = rf_shortcode.getVal('typography','wt_dropcap','color');

				var bg_color = rf_shortcode.getVal('typography','wt_dropcap','bg_color');
				if(color !== ''){
					color = ' color="'+color+'"';
				}
				if(bg_color !== ''){
					bg_color = ' bg_color="'+bg_color+'"';
				}
				return '['+type+color+bg_color+']'+rf_shortcode.getVal('typography','wt_dropcap','content')+'[/'+type+']';
				break;
			case 'wt_highlight':
				var color = rf_shortcode.getVal('typography','wt_highlight','color');
				var bg_color = rf_shortcode.getVal('typography','wt_highlight','bg_color');
				if(color !== ''){
					color = ' color="'+color+'"';
				}
				if(bg_color !== ''){
					bg_color = ' bg_color="'+bg_color+'"';
				}
				return '[wt_highlight'+color+bg_color+']'+rf_shortcode.getVal('typography','wt_highlight','content')+'[/wt_highlight]';
				break;					
			case 'wt_pre_code':
				var type = rf_shortcode.getVal('typography','wt_pre_code','type');
				if(type == ''){
					type='code';
				}
				return '['+type+']\n'+rf_shortcode.getVal('typography','wt_pre_code','content')+'\n[/'+type+']';	
				break;					}
			break;		
		case 'wt_blog_posts':
			var pagination = rf_shortcode.getVal('wt_blog_posts','pagination');
			var posts_slide = rf_shortcode.getVal('wt_blog_posts','posts_slide');
			var title = rf_shortcode.getVal('wt_blog_posts','title');
			var auto_slide = rf_shortcode.getVal('wt_blog_posts','auto_slide');
			var count = rf_shortcode.getVal('wt_blog_posts','count');
			var columns = rf_shortcode.getVal('wt_blog_posts','columns');
			var grid = rf_shortcode.getVal('wt_blog_posts','grid');
			var isotope = rf_shortcode.getVal('wt_blog_posts','isotope');
			var featured_entry = rf_shortcode.getVal('wt_blog_posts','featured_entry');
			var featured_entry_type = rf_shortcode.getVal('wt_blog_posts','featured_entry_type');
			var meta = rf_shortcode.getVal('wt_blog_posts','meta');
			var desc = rf_shortcode.getVal('wt_blog_posts','desc');
			var posts = rf_shortcode.getVal('wt_blog_posts','posts');
			var cat = rf_shortcode.getVal('wt_blog_posts','cat');
			var author = rf_shortcode.getVal('wt_blog_posts','author');
			var full = rf_shortcode.getVal('wt_blog_posts','full');
			
			if(pagination === true){
				pagination = ' pagination="true"';
			}else{
				pagination = '';
			}
			if(posts_slide === true){
				posts_slide = ' posts_slide="true"';
			}else{
				posts_slide = '';
			}
			if(title !== ''){
				title = ' title="'+title+'"';
			}else{
				title = '';
			}
			if(auto_slide!=='0'){
				auto_slide = ' auto_slide="'+auto_slide+'"';
			}else{
				auto_slide = '';
			}	
			if (posts_slide==false){
				title = '';
				auto_slide = '';
			}
			if(count !== ''){
				count = ' count="'+count+'"';
			}else{
				count = '';
			}
			if(columns !=1){
				columns = ' columns="'+columns+'"';
			}else{
				columns = '';
			}
			if(columns !='' && grid===true){
				grid = ' grid="true"';
			} else {
				grid = '';
			}
			if(columns !='' && grid != '' && isotope===true){
				isotope = ' isotope="true"';
			} else {
				isotope = '';
			}
			if(featured_entry === false){
				featured_entry = ' featured_entry="false"';
				featured_entry_type = '';
			} else {
				featured_entry = '';
				if(featured_entry_type === 'full'){
					featured_entry_type = ' featured_entry_type="full"';
				} else {
					featured_entry_type = ' featured_entry_type="left"';
				}
			}
						
			if(meta === false){
				meta = ' meta="false"';
			} else {
				meta = '';
			}
			if(desc === false){
				desc = ' desc="false"';
			} else {
				desc = '';
			}
			if(posts != undefined){
				posts = ' posts="'+posts+'"';
			}else{
				posts = '';
			}
			if(cat != undefined){
				cat = ' cat="'+cat+'"';
			}else{
				cat = '';
			}
			if(author != undefined){
				author = ' author="'+author+'"';
			}else{
				author = '';
			}
			if(full === true){
				full = ' full="true"';
			} else {
				full = '';
			}
			return '[wt_blog_posts'+posts_slide+title+auto_slide+count+columns+grid+isotope+featured_entry+featured_entry_type+meta+desc+posts+cat+author+full+pagination+']';
			break;
		case 'wt_portfolio':
			var title = rf_shortcode.getVal('wt_portfolio','title');
			var column = rf_shortcode.getVal('wt_portfolio','column');
			var nopaging = rf_shortcode.getVal('portfolio','nopaging');
			var max = rf_shortcode.getVal('wt_portfolio','max');
			var sortable = rf_shortcode.getVal('wt_portfolio','sortable');
			var cat = rf_shortcode.getVal('wt_portfolio','cat');
			var ids = rf_shortcode.getVal('wt_portfolio','ids');
			var display_title = rf_shortcode.getVal('wt_portfolio','display_title');
			var desc = rf_shortcode.getVal('wt_portfolio','desc');
			var advanceDesc = rf_shortcode.getVal('wt_portfolio','advanceDesc');
			var full = rf_shortcode.getVal('wt_portfolio','full');
			var category = rf_shortcode.getVal('wt_portfolio','category');
			var more = rf_shortcode.getVal('wt_portfolio','more');
			var moreText = rf_shortcode.getVal('wt_portfolio','moreText');
			var group = rf_shortcode.getVal('wt_portfolio','group');
			var port_slide = rf_shortcode.getVal('wt_portfolio','port_slide');
			var auto_slide = rf_shortcode.getVal('wt_portfolio','auto_slide');
			var order = rf_shortcode.getVal('wt_portfolio','order');
			var orderby = rf_shortcode.getVal('wt_portfolio','orderby');
			
			if(title !== ''){
				title = ' title="'+title+'"';
			}else{
				title = '';
			}
			if(column != ""){
				column = ' column="'+column+'"';
			}else{
				column = ' column="4"';
			}
			if(sortable===true){
				sortable = ' sortable="true"';
				//max = '';
			} else {
				sortable = '';
			}
			if(nopaging===true){
				nopaging = ' nopaging="true"';
				//max = '';
			}else{
				nopaging = '';
			}

			if(max!='-1' && max!='0'){
				max = ' max="'+max+'"';
			}else{
				max = '';
			}

			if(cat!=undefined){
				cat = ' cat="'+cat+'"';
			}else{
				cat = '';
			}
			
			if(ids!=undefined){
				ids = ' ids="'+ids+'"';
			}else{
				ids = '';
			}
			if(display_title===true){
				display_title = '';
			} else {
				display_title = ' display_title="false"';
			}
			if(desc===true){
				desc = '';
			} else {
				desc = ' desc="false"';
			}			
			if(advanceDesc===true){
				advanceDesc = ' advanceDesc="true"';
			} else {
				advanceDesc = '';
			}			
			if(category===true){
				category = ' category="true"';
			} else {
				category = ' category="false"';
			}
			if(more===true){
				more = ' more="true"';
			} else {
				more = ' more="false"';
			}
			if(moreText!=''){
				moreText = ' moreText="'+moreText+'"';
			}
			if(group!==true){
				group = ' group="false"';
			}else{
				group = '';
			}
			if(port_slide!==false){
				port_slide = ' port_slide="true"';
			}else{
				port_slide = '';
			}			
			if(auto_slide!=0){
				auto_slide =' auto_slide="'+auto_slide+'"';
			}else{
				auto_slide = '';
			}
			if (port_slide==false){
				title = '';
				auto_slide = '';
			}
			if(order !="ASC"){
				order = ' order="'+order+'"';
			}else{
				order = '';
			}
			if(orderby !="menu_order"){
				orderby = ' orderby="'+orderby+'"';
			}else{
				orderby = '';
			}
			return '[wt_portfolio'+title+column+nopaging+sortable+max+cat+ids+display_title+desc+advanceDesc+category+more+moreText+group+port_slide+auto_slide+order+orderby+']';
			break;
		case 'wt_sections':
			var type = rf_shortcode.getVal('wt_sections', 'type');
			var id_attr = rf_shortcode.getVal('wt_sections','id_attr');
			var class_attr = rf_shortcode.getVal('wt_sections','class_attr');
			var border = rf_shortcode.getVal('wt_sections', 'border');
			var shadow = rf_shortcode.getVal('wt_sections', 'shadow');
			var wrap = rf_shortcode.getVal('wt_sections', 'wrap');
														
			if(id_attr!=''){
				id_attr = ' id_attr="'+id_attr+'"';
			}
			if(class_attr!=''){
				class_attr = ' class_attr="'+class_attr+'"';
			}			
			if(border===true){
				border = ' border="true"';
			}else{
				border = '';
			}			
			if(shadow===true){
				shadow = ' shadow="true"';
			}else{
				shadow = '';
			}				
			if(wrap===true){
				wrap = ' wrap="true"';
			}else{
				wrap = '';
			}
			if(type != ''){
				return '\n['+type+id_attr+class_attr+border+shadow+wrap+'] '+rf_shortcode.getVal('wt_sections', 'content')+' [/'+type+']\n';
			}else{
				return '';
			}
			break;
		case 'layouts':
			var sub_type = rf_shortcode.getVal('layouts','generator');
			switch(sub_type){
			case 'two_columns_layout':
				return '\n[wt_one_half]\n'+rf_shortcode.getVal('layouts', 'two_columns_layout', 'content_1')+'\n[/wt_one_half]\n\n[wt_one_half_last]\n'+rf_shortcode.getVal('layouts', 'two_columns_layout', 'content_2')+'\n[/wt_one_half_last]\n';
				break;
			case 'three_columns_layout':
				return '\n[wt_one_third]\n'+rf_shortcode.getVal('layouts', 'three_columns_layout', 'content_1')+'\n[/wt_one_third]\n\n[wt_one_third]\n'+rf_shortcode.getVal('layouts', 'three_columns_layout', 'content_2')+'\n[/wt_one_third]\n\n[wt_one_third_last]\n'+rf_shortcode.getVal('layouts', 'three_columns_layout', 'content_3')+'\n[/wt_one_third_last]\n';
				break;
			case 'four_columns_layout':
				return '\n[wt_one_fourth]\n'+rf_shortcode.getVal('layouts', 'four_columns_layout', 'content_1')+'\n[/wt_one_fourth]\n\n[wt_one_fourth]\n'+rf_shortcode.getVal('layouts', 'four_columns_layout', 'content_2')+'\n[/wt_one_fourth]\n\n[wt_one_fourth]\n'+rf_shortcode.getVal('layouts', 'four_columns_layout', 'content_3')+'\n[/wt_one_fourth]\n\n[wt_one_fourth_last]\n'+rf_shortcode.getVal('layouts', 'four_columns_layout', 'content_4')+'\n[/wt_one_fourth_last]\n';
				break;
			case 'five_columns_layout':
				return '\n[wt_one_fifth]\n'+rf_shortcode.getVal('layouts', 'five_columns_layout', 'content_1')+'\n[/wt_one_fifth]\n\n[wt_one_fifth]\n'+rf_shortcode.getVal('layouts', 'five_columns_layout', 'content_2')+'\n[/wt_one_fifth]\n\n[wt_one_fifth]\n'+rf_shortcode.getVal('layouts', 'five_columns_layout', 'content_3')+'\n[/wt_one_fifth]\n\n[wt_one_fifth]\n'+rf_shortcode.getVal('layouts', 'five_columns_layout', 'content_4')+'\n[/wt_one_fifth]\n\n[wt_one_fifth_last]\n'+rf_shortcode.getVal('layouts', 'five_columns_layout', 'content_5')+'\n[/wt_one_fifth_last]\n';
				break;			
			case 'six_columns_layout':
				return '\n[wt_one_sixth]\n'+rf_shortcode.getVal('layouts', 'six_columns_layout', 'content_1')+'\n[/wt_one_sixth]\n\n[wt_one_sixth]\n'+rf_shortcode.getVal('layouts', 'six_columns_layout', 'content_2')+'\n[/wt_one_sixth]\n\n[wt_one_sixth]\n'+rf_shortcode.getVal('layouts', 'six_columns_layout', 'content_3')+'\n[/wt_one_sixth]\n\n[wt_one_sixth]\n'+rf_shortcode.getVal('layouts', 'six_columns_layout', 'content_4')+'\n[/wt_one_sixth]\n\n[wt_one_sixth]\n'+rf_shortcode.getVal('layouts', 'six_columns_layout', 'content_5')+'\n[/wt_one_sixth]\n\n[wt_one_sixth_last]\n'+rf_shortcode.getVal('layouts', 'six_columns_layout', 'content_6')+'\n[/wt_one_sixth_last]\n';
				break;	
			case 'one_third_two_third':
				return '\n[wt_one_third]\n'+rf_shortcode.getVal('layouts', 'one_third_two_third', 'content_1')+'\n[/wt_one_third]\n\n[wt_two_third_last]\n'+rf_shortcode.getVal('layouts', 'one_third_two_third', 'content_2')+'\n[/wt_two_third_last]\n';
				break;
			case 'two_third_one_third':
				return '\n[wt_two_third]\n'+rf_shortcode.getVal('layouts', 'two_third_one_third', 'content_1')+'\n[/wt_two_third]\n\n[wt_one_third_last]\n'+rf_shortcode.getVal('layouts', 'two_third_one_third', 'content_2')+'\n[/wt_one_third_last]\n';
				break;
			case 'one_fourth_three_fourth':
				return '\n[wt_one_fourth]\n'+rf_shortcode.getVal('layouts', 'one_fourth_three_fourth', 'content_1')+'\n[/wt_one_fourth]\n\n[wt_three_fourth_last]\n'+rf_shortcode.getVal('layouts', 'one_fourth_three_fourth', 'content_2')+'\n[/wt_three_fourth_last]\n';
				break;
			case 'three_fourth_one_fourth':
				return '\n[wt_three_fourth]\n'+rf_shortcode.getVal('layouts', 'three_fourth_one_fourth', 'content_1')+'\n[/wt_three_fourth]\n\n[wt_one_fourth_last]\n'+rf_shortcode.getVal('layouts', 'three_fourth_one_fourth', 'content_2')+'\n[/wt_one_fourth_last]\n';
				break;
			case 'one_fourth_one_fourth_one_half':
				return '\n[wt_one_fourth]\n'+rf_shortcode.getVal('layouts', 'one_fourth_one_fourth_one_half', 'content_1')+'\n[/wt_one_fourth]\n\n[wt_one_fourth]\n'+rf_shortcode.getVal('layouts', 'one_fourth_one_fourth_one_half', 'content_2')+'\n[/wt_one_fourth]\n\n[wt_one_half_last]\n'+rf_shortcode.getVal('layouts', 'one_fourth_one_fourth_one_half', 'content_3')+'\n[/wt_one_half_last]\n';
				break;
			case 'one_fourth_one_half_one_fourth':
				return '\n[wt_one_fourth]\n'+rf_shortcode.getVal('layouts', 'one_fourth_one_half_one_fourth', 'content_1')+'\n[/wt_one_fourth]\n\n[wt_one_half]\n'+rf_shortcode.getVal('layouts', 'one_fourth_one_half_one_fourth', 'content_2')+'\n[/wt_one_half]\n\n[wt_one_fourth_last]\n'+rf_shortcode.getVal('layouts', 'one_fourth_one_half_one_fourth', 'content_3')+'\n[/wt_one_fourth_last]\n';
				break;
			case 'one_half_one_fourth_one_fourth':
				return '\n[wt_one_half]\n'+rf_shortcode.getVal('layouts', 'one_half_one_fourth_one_fourth', 'content_1')+'\n[/wt_one_half]\n\n[wt_one_fourth]\n'+rf_shortcode.getVal('layouts', 'one_half_one_fourth_one_fourth', 'content_2')+'\n[/wt_one_fourth]\n\n[wt_one_fourth_last]\n'+rf_shortcode.getVal('layouts', 'one_half_one_fourth_one_fourth', 'content_3')+'\n[/wt_one_fourth_last]\n';
				break;
			case 'one_fifth_four_fifth':
				return '\n[wt_one_fifth]\n'+rf_shortcode.getVal('layouts', 'one_fifth_four_fifth', 'content_1')+'\n[/wt_one_fifth]\n\n[wt_four_fifth_last]\n'+rf_shortcode.getVal('layouts', 'one_fifth_four_fifth', 'content_2')+'\n[/wt_four_fifth_last]\n';
				break;
			case 'four_fifth_one_fifth':
				return '\n[wt_four_fifth]\n'+rf_shortcode.getVal('layouts', 'four_fifth_one_fifth', 'content_1')+'\n[/wt_four_fifth]\n\n[wt_one_fifth_last]\n'+rf_shortcode.getVal('layouts', 'four_fifth_one_fifth', 'content_2')+'\n[/wt_one_fifth_last]\n';
				break;
			case 'two_fifth_three_fifth':
				return '\n[wt_two_fifth]\n'+rf_shortcode.getVal('layouts', 'two_fifth_three_fifth', 'content_1')+'\n[/wt_two_fifth]\n\n[wt_three_fifth_last]\n'+rf_shortcode.getVal('layouts', 'two_fifth_three_fifth', 'content_2')+'\n[/wt_three_fifth_last]\n';
				break;
			case 'three_fifth_two_fifth':
				return '\n[wt_three_fifth]\n'+rf_shortcode.getVal('layouts', 'three_fifth_two_fifth', 'content_1')+'\n[/wt_three_fifth]\n\n[wt_two_fifth_last]\n'+rf_shortcode.getVal('layouts', 'three_fifth_two_fifth', 'content_2')+'\n[/wt_two_fifth_last]\n';
				break;
			case 'one_fifth_three_fifth_one_fifth':
				return '\n[wt_one_fifth]\n'+rf_shortcode.getVal('layouts', 'one_fifth_three_fifth_one_fifth', 'content_1')+'\n[/wt_one_fifth]\n\n[wt_three_fifth]\n'+rf_shortcode.getVal('layouts', 'one_fifth_three_fifth_one_fifth', 'content_2')+'\n[/wt_three_fifth]\n\n[wt_one_fifth_last]\n'+rf_shortcode.getVal('layouts', 'one_fifth_three_fifth_one_fifth', 'content_3')+'\n[/wt_one_fifth_last]\n';
				break;
			case 'one_fifth_two_fifth_two_fifth':
				return '\n[wt_one_fifth]\n'+rf_shortcode.getVal('layouts', 'one_fifth_two_fifth_two_fifth', 'content_1')+'\n[/wt_one_fifth]\n\n[wt_two_fifth]\n'+rf_shortcode.getVal('layouts', 'one_fifth_two_fifth_two_fifth', 'content_2')+'\n[/wt_two_fifth]\n\n[wt_two_fifth_last]\n'+rf_shortcode.getVal('layouts', 'one_fifth_two_fifth_two_fifth', 'content_3')+'\n[/wt_two_fifth_last]\n';
				break;
			case 'two_fifth_one_fifth_two_fifth':
				return '\n[wt_two_fifth]\n'+rf_shortcode.getVal('layouts', 'two_fifth_one_fifth_two_fifth', 'content_1')+'\n[/wt_two_fifth]\n\n[wt_one_fifth]\n'+rf_shortcode.getVal('layouts', 'two_fifth_one_fifth_two_fifth', 'content_2')+'\n[/wt_one_fifth]\n\n[wt_two_fifth_last]\n'+rf_shortcode.getVal('layouts', 'two_fifth_one_fifth_two_fifth', 'content_3')+'\n[/wt_two_fifth_last]\n';
				break;
			case 'two_fifth_two_fifth_one_fifth':
				return '\n[wt_two_fifth]\n'+rf_shortcode.getVal('layouts', 'two_fifth_two_fifth_one_fifth', 'content_1')+'\n[/wt_two_fifth]\n\n[wt_two_fifth]\n'+rf_shortcode.getVal('layouts', 'two_fifth_two_fifth_one_fifth', 'content_2')+'\n[/wt_two_fifth]\n\n[wt_one_fifth_last]\n'+rf_shortcode.getVal('layouts', 'two_fifth_two_fifth_one_fifth', 'content_3')+'\n[/wt_one_fifth_last]\n';
				break;			
			case 'one_sixth_five_sixth':
				return '\n[wt_one_sixth]\n'+rf_shortcode.getVal('layouts', 'one_sixth_five_sixth', 'content_1')+'\n[/wt_one_sixth]\n\n[wt_five_sixth_last]\n'+rf_shortcode.getVal('layouts', 'one_sixth_five_sixth', 'content_2')+'\n[/wt_five_sixth_last]\n';
				break;
			case 'five_sixth_one_sixth':
				return '\n[wt_five_sixth]\n'+rf_shortcode.getVal('layouts', 'five_sixth_one_sixth', 'content_1')+'\n[/wt_five_sixth]\n\n[wt_one_sixth_last]\n'+rf_shortcode.getVal('layouts', 'five_sixth_one_sixth', 'content_2')+'\n[/wt_one_sixth_last]\n';
				break;
			case 'one_sixth_one_sixth_one_sixth_one_half':
				return '\n[wt_one_sixth]\n'+rf_shortcode.getVal('layouts', 'one_sixth_one_sixth_one_sixth_one_half', 'content_1')+'\n[/wt_one_sixth]\n\n[wt_one_sixth]\n'+rf_shortcode.getVal('layouts', 'one_sixth_one_sixth_one_sixth_one_half', 'content_2')+'\n[/wt_one_sixth]\n\n[wt_one_sixth]\n'+rf_shortcode.getVal('layouts', 'one_sixth_one_sixth_one_sixth_one_half', 'content_3')+'\n[/wt_one_sixth]\n\n[wt_one_half_last]\n'+rf_shortcode.getVal('layouts', 'one_sixth_one_sixth_one_sixth_one_half', 'content_4')+'\n[/wt_one_half_last]\n';
				break;			
			}
			break;
		case 'columns':
			var type = rf_shortcode.getVal('columns', 'type');
			if(type != ''){
				return '\n['+type+']'+rf_shortcode.getVal('columns', 'content')+'[/'+type+']\n';
			}else{
				return '';
			}
			break;
		case 'wt_tooltip':
			var tooltip_title = rf_shortcode.getVal('wt_tooltip','tooltip_title');
			var tooltip_placement = rf_shortcode.getVal('wt_tooltip','tooltip_placement');

			if(tooltip_title !=""){
				tooltip_title = ' title="'+tooltip_title+'"';
			}else{
				tooltip_title = '';
			}
			if(tooltip_placement!=undefined){
				tooltip_placement = ' tooltip_placement="'+tooltip_placement+'"';
			}else{
				tooltip_placement ='';
			}
			return '[wt_tooltip'+tooltip_title+tooltip_placement+']'+ rf_shortcode.getVal('wt_tooltip','tooltip_text') +'[/wt_tooltip]';
			break;
		case 'wt_divider':
			return '['+rf_shortcode.getVal('wt_divider','type')+']';
			break;
		case 'wt_margin':
			var type = rf_shortcode.getVal('wt_margin', 'type');	
			if(type != 0){
				type = ' type="'+type+'"';
			    return '\n[wt_margin'+type+']\n';
			}else{
				type ='';
				return '';
			}	
			break;
		case 'wt_lightbox':
			var href = rf_shortcode.getVal('wt_lightbox','href');
			var title = rf_shortcode.getVal('wt_lightbox','title');
			var group = rf_shortcode.getVal('wt_lightbox','group');
			var width = rf_shortcode.getVal('wt_lightbox','width');
			var height = rf_shortcode.getVal('wt_lightbox','height');
			var iframe = rf_shortcode.getVal('wt_lightbox','iframe');
			var inline = rf_shortcode.getVal('wt_lightbox','inline');
			var inline_id = rf_shortcode.getVal('wt_lightbox','inline_id');
			var inline_html = rf_shortcode.getVal('wt_lightbox','inline_html');
			
			if(href !=""){
				href = ' href="'+href+'"';
			}else{
				href = '';
			}
			if(title !=""){
				title = ' title="'+title+'"';
			}else{
				title = '';
			}
			if(group !=""){
				group = ' group="'+group+'"';
			}else{
				group = '';
			}
			if(width !=""){
				width = ' width="'+width+'"';
			}else{
				width = '';
			}
			if(height !=""){
				height = ' height="'+height+'"';
			}else{
				height = '';
			}
			if(iframe===true){
				iframe = ' iframe="true"';
			} else {
				iframe = '';
			}
			if(inline===true){
				inline = ' inline="true"';
				inline_html = '<div id="'+inline_id+'" class="hidden">\n'+inline_html+'\n</div>';
				href = ' href="'+inline_id+'"';
			} else {
				inline = '';
				inline_html = '';
			}
			
			return '\n[wt_lightbox'+href+title+group+width+height+iframe+inline+']'+rf_shortcode.getVal('wt_lightbox','content')+'[/wt_lightbox]'+inline_html;
			break;
		case 'wt_slideshow':
			var sub_type = rf_shortcode.getVal('wt_slideshow','generator');
			switch(sub_type){
				case 'flex':
					var animation = rf_shortcode.getVal('wt_slideshow','flex','animation');
					var easing = rf_shortcode.getVal('wt_slideshow','flex','easing');
					var direction = rf_shortcode.getVal('wt_slideshow','flex','direction');
					var animationSpeed = rf_shortcode.getVal('wt_slideshow','flex','animationspeed');
					var slideshowSpeed = rf_shortcode.getVal('wt_slideshow','flex','slideshowspeed');
					var directionNav = rf_shortcode.getVal('wt_slideshow','flex','directionnav');
					var controlNav = rf_shortcode.getVal('wt_slideshow','flex','controlnav');
					var controlNavThumbs = rf_shortcode.getVal('wt_slideshow','flex','controlnavthumbs');
					var controlNavThumbsSlider = rf_shortcode.getVal('wt_slideshow','flex','controlnavthumbsslider');
					var pauseOnAction = rf_shortcode.getVal('wt_slideshow','flex','pauseonaction');
					var pauseOnHover = rf_shortcode.getVal('wt_slideshow','flex','pauseonhover');
					var slideshow = rf_shortcode.getVal('wt_slideshow','flex','slideshow');
					var animationLoop = rf_shortcode.getVal('wt_slideshow','flex','animationloop');
					var width = rf_shortcode.getVal('wt_slideshow','flex','width');
					var height = rf_shortcode.getVal('wt_slideshow','flex','height');
					var align = rf_shortcode.getVal('wt_slideshow','flex','align');
					var number = rf_shortcode.getVal('wt_slideshow','flex','number');				
				
					if(animation !=""){
						animation = ' animation="'+animation+'"';
					}
					if(easing !=""){
						easing = ' easing="'+easing+'"';
					}
					if(direction!=''){
						direction =' direction="'+direction+'"';
					}
					if(animationSpeed!=''){
						animationSpeed =' animationSpeed="'+animationSpeed+'"';
					}
					if(slideshowSpeed!=''){
						slideshowSpeed =' slideshowSpeed="'+slideshowSpeed+'"';
					}
					if(directionNav===true){
						directionNav = ' directionNav="true"';
					}else{
						directionNav = ' directionNav="false"';
					}
					if(controlNavThumbs===true){
						controlNavThumbs = ' controlNavThumbs="true"';
					}else{
						controlNavThumbs = ' controlNavThumbs="false"';
					}
					if(controlNavThumbsSlider===true){
						controlNavThumbsSlider = ' controlNavThumbsSlider="true"';
					}else{
						controlNavThumbsSlider = ' controlNavThumbsSlider="false"';
					}
					if(controlNav===true){
						controlNav = ' controlNav="true"';
					}else{
						controlNav = ' controlNav="false"';
					}
					if(pauseOnAction===true){
						pauseOnAction = ' pauseOnAction="true"';
					}else{
						pauseOnAction = ' pauseOnAction="false"';
					}
					if(pauseOnHover===true){
						pauseOnHover = ' pauseOnHover="true"';
					}else{
						pauseOnHover = ' pauseOnHover="false"';
					}
					if(slideshow===true){
						slideshow = ' slideshow="true"';
					}else{
						slideshow = ' slideshow="false"';
					}
					if(animationLoop===true){
						animationLoop = ' animationLoop="true"';
					}else{
						animationLoop = ' animationLoop="false"';
					}
					if(width!=0){
						width = ' width="'+width+'"';
					}else{
						width ='';
					}
					if(height!=0){
						height = ' height="'+height+'"';
					}else{
						height ='';
					}
					if(align!=''){
						align =' align="'+align+'"';
					}	
																
					var ret = '[wt_slideshow type="flex"'+animation+easing+direction+animationSpeed+slideshowSpeed+directionNav+controlNav+controlNavThumbs+controlNavThumbsSlider+pauseOnAction+pauseOnHover+slideshow+animationLoop+width+height+align+']\n';
					for(var i=1;i<=number;i++){
						if ( rf_shortcode.getVal('wt_slideshow','flex','image_'+i+'_url')!='' || rf_shortcode.getVal('wt_slideshow','flex','image_'+i+'_caption')!='' || rf_shortcode.getVal('wt_slideshow','flex','image_'+i+'_link')!='') {
							var caption = rf_shortcode.getVal('wt_slideshow','flex','image_'+i+'_caption');
							var link = rf_shortcode.getVal('wt_slideshow','flex','image_'+i+'_link');																
							if(caption!=''){
								caption = ' caption="'+caption+'"';
							}else{
								caption ='';
							}														
							if(link!=''){
								link = ' link="'+link+'"';
							}else{
								link ='';
							}
							ret +='[image url="'+rf_shortcode.getVal('wt_slideshow','flex','image_'+i+'_url')+'"'+caption+link+']\n';
						}
					}
					ret +='[/wt_slideshow]\n';
					
					return ret;						
				break;
				case 'nivo':
					var effect = rf_shortcode.getVal('wt_slideshow','nivo','effect');
					var slices = rf_shortcode.getVal('wt_slideshow','nivo','slices');
					var boxCols = rf_shortcode.getVal('wt_slideshow','nivo','boxcols');
					var boxRows = rf_shortcode.getVal('wt_slideshow','nivo','boxrows');
					var animSpeed = rf_shortcode.getVal('wt_slideshow','nivo','animspeed');
					var pauseTime = rf_shortcode.getVal('wt_slideshow','nivo','pausetime');
					var randomStart = rf_shortcode.getVal('wt_slideshow','nivo','randomstart');
					var controlNav = rf_shortcode.getVal('wt_slideshow','nivo','controlnav');
					var directionNav = rf_shortcode.getVal('wt_slideshow','nivo','directionnav');
					var controlNavThumbs = rf_shortcode.getVal('wt_slideshow','nivo','controlnavthumbs');
					var pauseOnHover = rf_shortcode.getVal('wt_slideshow','nivo','pauseonhover');
					var manualAdvance = rf_shortcode.getVal('wt_slideshow','nivo','manualadvance');
					var stopAtEnd = rf_shortcode.getVal('wt_slideshow','nivo','stopatend');
					var width = rf_shortcode.getVal('wt_slideshow','nivo','width');
					var height = rf_shortcode.getVal('wt_slideshow','nivo','height');
					var align = rf_shortcode.getVal('wt_slideshow','nivo','align');
					var number = rf_shortcode.getVal('wt_slideshow','nivo','number');				
				
					if(effect !=""){
						effect = ' effect="'+effect+'"';
					}
					if(slices!=''){
						slices =' slices="'+slices+'"';
					}
					if(boxCols!=''){
						boxCols =' boxCols="'+boxCols+'"';
					}
					if(boxRows!=''){
						boxRows =' boxRows="'+boxRows+'"';
					}
					if(animSpeed!=''){
						animSpeed =' animSpeed="'+animSpeed+'"';
					}
					if(pauseTime!=''){
						pauseTime =' pauseTime="'+pauseTime+'"';
					}
					if(randomStart===true){
						randomStart = ' randomStart="true"';
					}else{
						randomStart = ' randomStart="false"';
					}
					if(directionNav===true){
						directionNav = ' directionNav="true"';
					}else{
						directionNav = ' directionNav="false"';
					}
					if(controlNav===true){
						controlNav = ' controlNav="true"';
					}else{
						controlNav = ' controlNav="false"';
					}
					if(controlNavThumbs===true){
						controlNavThumbs = ' controlNavThumbs="true"';
					}else{
						controlNavThumbs = ' controlNavThumbs="false"';
					}
					if(pauseOnHover===true){
						pauseOnHover = ' pauseOnHover="true"';
					}else{
						pauseOnHover = ' pauseOnHover="false"';
					}
					if(manualAdvance===true){
						manualAdvance = ' manualAdvance="true"';
					}else{
						manualAdvance = ' manualAdvance="false"';
					}
					if(stopAtEnd===true){
						stopAtEnd = ' stopAtEnd="true"';
					}else{
						stopAtEnd = ' stopAtEnd="false"';
					}
					if(width!=0){
						width = ' width="'+width+'"';
					}else{
						width ='';
					}
					if(height!=0){
						height = ' height="'+height+'"';
					}else{
						height ='';
					}
					if(align!=''){
						align =' align="'+align+'"';
					}	
														
					var ret = '[wt_slideshow type="nivo"'+effect+slices+boxCols+boxRows+animSpeed+pauseTime+randomStart+directionNav+controlNav+controlNavThumbs+pauseOnHover+manualAdvance+stopAtEnd+width+height+align+']\n';
					for(var i=1;i<=number;i++){
						if ( rf_shortcode.getVal('wt_slideshow','nivo','image_'+i+'_url')!='' || rf_shortcode.getVal('wt_slideshow','nivo','image_'+i+'_caption')!='' || rf_shortcode.getVal('wt_slideshow','nivo','image_'+i+'_link')!='') {
							var caption = rf_shortcode.getVal('slideshow','nivo','image_'+i+'_caption');
							var link = rf_shortcode.getVal('wt_slideshow','nivo','image_'+i+'_link');																
							if(caption!=''){
								caption = ' caption="'+caption+'"';
							}else{
								caption ='';
							}														
							if(link!=''){
								link = ' link="'+link+'"';
							}else{
								link ='';
							}
							ret +='[image url="'+rf_shortcode.getVal('wt_slideshow','nivo','image_'+i+'_url')+'"'+caption+link+']\n';
						}
					}
					ret +='[/wt_slideshow]\n';
					return ret;						
				break;				
			};
			break;
		case 'wt_rotator':
			var timeout = rf_shortcode.getVal('wt_rotator','timeout');
			var speed = rf_shortcode.getVal('wt_rotator','speed');
			var pauseHover = rf_shortcode.getVal('wt_rotator','pauseHover');
			var buttons = rf_shortcode.getVal('wt_rotator','buttons');
			var number = rf_shortcode.getVal('wt_rotator','number');
					
			if(timeout!=0){
				timeout = ' timeout="'+timeout+'"';
			}else{
				timeout ='';
			}
			if(speed!=0){
				speed = ' speed="'+speed+'"';
			}else{
				speed ='';
			}
			if(pauseHover===true){
				pauseHover = ' pauseHover="true"';
			} else {
				pauseHover = '';
			}
			if(buttons===true){
				buttons = ' buttons="true"';
			} else {
				buttons = '';
			}
			
			var ret = '\n[wt_rotator'+timeout+speed+pauseHover+buttons+']\n';
			
			for(var i=1;i<=number;i++){
				ret += '[li]'+rf_shortcode.getVal('wt_rotator','content_'+i)+'[/li]\n';
			}
			ret += '[/wt_rotator]\n';
			return ret;	
						
			break;
		case 'wt_video':
			var sub_type = rf_shortcode.getVal('wt_video','generator');
			switch(sub_type){				
				case 'html5':
					var webm = rf_shortcode.getVal('wt_video','html5','webm');
					var mp4 = rf_shortcode.getVal('wt_video','html5','mp4');
					var ogg = rf_shortcode.getVal('wt_video','html5','ogg');
					var poster = rf_shortcode.getVal('wt_video','html5','poster');
					var autoPlay = rf_shortcode.getVal('wt_video','html5','autoPlay');
					
					if(webm!=''){
						webm =' webm="'+webm+'"';
					}
					if(mp4!=''){
						mp4 =' mp4="'+mp4+'"';
					}
					if(ogg!=''){
						ogg =' ogg="'+ogg+'"';
					}
					if(poster !=""){
						poster = ' poster="'+poster+'"';
					}
					switch(autoPlay){
						case true:
							autoPlay = ' autoPlay="true"';
							break;
						case false:
							autoPlay = ' autoPlay="false"';
							break;
						default:
							autoPlay = '';
					}
					
					return '[wt_video type="html5"'+webm+mp4+ogg+poster+autoPlay+']';
					break;
				case 'youtube':
					var video_id = rf_shortcode.getVal('wt_video','youtube','video_id');
					var autoPlay = rf_shortcode.getVal('wt_video','youtube','autoPlay');			

					if(video_id !=""){
						video_id = ' video_id="'+video_id+'"';
					}
					switch(autoPlay){
						case true:
							autoPlay = ' autoPlay="true"';
							break;
						case false:
							autoPlay = ' autoPlay="false"';
							break;
						default:
							autoPlay = '';
					}
					
					return '[wt_video type="youtube"'+video_id+autoPlay+']';
					break;
				case 'vimeo':
					var video_id = rf_shortcode.getVal('wt_video','vimeo','video_id');
					var autoPlay = rf_shortcode.getVal('wt_video','vimeo','autoplay');
					
					if(video_id !=""){
						video_id = ' video_id="'+video_id+'"';
					}					
					switch(autoPlay){
						case true:
							autoPlay = ' autoPlay="true"';
							break;
						case false:
							autoPlay = ' autoPlay="false"';
							break;
						default:
							autoPlay = '';
					}
					
					return '[wt_video type="vimeo"'+video_id+autoPlay+']';
					break;
				case 'dailymotion':
					var video_id = rf_shortcode.getVal('wt_video','dailymotion','video_id');
					var autoPlay = rf_shortcode.getVal('wt_video','dailymotion','autoPlay');
					
					if(video_id !=""){
						video_id = ' video_id="'+video_id+'"';
					}
					switch(autoPlay){
						case true:
							autoPlay = ' autoPlay="true"';
							break;
						case false:
							autoPlay = ' autoPlay="false"';
							break;
						default:
							autoPlay = '';
					}
					
					return '[wt_video type="dailymotion"'+video_id+autoPlay+']';
					break;
				case 'metacafe':
					var video_id = rf_shortcode.getVal('wt_video','metacafe','video_id');
					var autoPlay = rf_shortcode.getVal('wt_video','metacafe','autoPlay');
					
					if(video_id !=""){
						video_id = ' video_id="'+video_id+'"';
					}
					switch(autoPlay){
						case true:
							autoPlay = ' autoPlay="true"';
							break;
						case false:
							autoPlay = ' autoPlay="false"';
							break;
						default:
							autoPlay = '';
					}
					
					return '[wt_video type="metacafe"'+video_id+autoPlay+']';
					break;	
				case 'bliptv':
					var video_id = rf_shortcode.getVal('wt_video','bliptv','video_id');
					
					if(video_id !=""){
						video_id = ' video_id="'+video_id+'"';
					}
					
					return '[wt_video type="bliptv"'+video_id+']';
					break;	
				case 'flash':
					var location = rf_shortcode.getVal('wt_video','flash','location');
					var autoPlay = rf_shortcode.getVal('wt_video','flash','autoPlay');
					
					if(location !=""){
						location = ' location="'+location+'"';
					}
					switch(autoPlay){
						case true:
							autoPlay = ' autoPlay="true"';
							break;
						case false:
							autoPlay = ' autoPlay="false"';
							break;
						default:
							autoPlay = '';
					}
					
					return '[wt_video type="flash"'+location+autoPlay+']';
					break;	
			};
			break;		
		case 'audio':
			var sub_type = rf_shortcode.getVal('audio','generator');
			switch(sub_type){				
				case 'audio_html5':
					var mp3 = rf_shortcode.getVal('audio','audio_html5','mp3');
					var autoPlay = rf_shortcode.getVal('audio','audio_html5','autoPlay');
					
					if(mp3!=''){
						mp3 =' mp3="'+mp3+'"';
					}
					switch(autoPlay){
						case true:
							autoPlay = ' autoPlay="true"';
							break;
						case false:
							autoPlay = ' autoPlay="false"';
							break;
						default:
							autoPlay = '';
					}
					
					return '[audio type="html5"'+mp3+autoPlay+']';
					break;
			};
			break;
		case 'wt_box_styles':
			var sub_type = rf_shortcode.getVal('wt_box_styles','generator');
			switch(sub_type){
			case 'wt_message_boxes':
				var box_style = rf_shortcode.getVal('wt_box_styles','wt_message_boxes','type');
				if(box_style == ''){
					box_style='info';
				}
				return '['+box_style+']\n'+rf_shortcode.getVal('wt_box_styles','wt_message_boxes','content')+'\n[/'+box_style+']';
			case 'wt_note_box':
				var title = rf_shortcode.getVal('wt_box_styles','wt_note_box','title');
				var align = rf_shortcode.getVal('wt_box_styles','wt_note_box','align');
				var width = rf_shortcode.getVal('wt_box_styles','wt_note_box','width');

				if(title != ''){
					title = ' title="'+title+'"';
				}
				if(align !== ''){
					align = ' align="'+align+'"';
				}
				if(width!=0){
					width = ' width="'+width+'"';
				}else{
					width ='';
				}
				return '[wt_note'+title+align+width+']\n'+rf_shortcode.getVal('wt_box_styles','wt_note_box','content')+'\n[/wt_note]';
			case 'wt_team_box':
				var image = rf_shortcode.getVal('wt_box_styles','wt_team_box','image');
				var title = rf_shortcode.getVal('wt_box_styles','wt_team_box','title');
				var company = rf_shortcode.getVal('wt_box_styles','wt_team_box','company');
			    var borderColor = rf_shortcode.getVal('wt_box_styles','wt_team_box','borderColor');
				var title_customColor = rf_shortcode.getVal('wt_box_styles','wt_team_box','title_customColor');
				var title_textColor = rf_shortcode.getVal('wt_box_styles','wt_team_box','title_textColor');
				var width = rf_shortcode.getVal('wt_box_styles','wt_team_box','width');
				var height = rf_shortcode.getVal('wt_box_styles','wt_team_box','height');
				var bgColor = rf_shortcode.getVal('wt_box_styles','wt_team_box','bgColor');
				var bgColor_start = rf_shortcode.getVal('wt_box_styles','wt_team_box','bgColor_start');
				var bgColor_end = rf_shortcode.getVal('wt_box_styles','wt_team_box','bgColor_end');
				var textColor = rf_shortcode.getVal('wt_box_styles','wt_team_box','textColor');
				var icons = rf_shortcode.getVal('wt_box_styles','wt_team_box','icons');
				var rounded = rf_shortcode.getVal('wt_box_styles','wt_team_box','rounded');


				var facebook_link = rf_shortcode.getVal('wt_box_styles','wt_team_box','facebook_link');
				var linkedin_link = rf_shortcode.getVal('wt_box_styles','wt_team_box','linkedin_link');
				var pinterest_link = rf_shortcode.getVal('wt_box_styles','wt_team_box','pinterest_link');
				var rss_link = rf_shortcode.getVal('wt_box_styles','wt_team_box','rss_link');
				var github_link = rf_shortcode.getVal('wt_box_styles','wt_team_box','github_link');
				var twitter_link = rf_shortcode.getVal('wt_box_styles','wt_team_box','twitter_link');
				
				if(icons!=undefined){
					icons = ' icons="'+icons+'"';
					iconsString = icons;
				}else{
					icons = '';
					iconsString = '';
				}
				
				if(facebook_link!="" && iconsString.indexOf("facebook") >= 0){ 
					facebook_link = ' youtube_link="'+facebook_link+'"';}else{facebook_link ='';}
				if(linkedin_link!="" && iconsString.indexOf("linkedin") >= 0){ 
					linkedin_link = ' linkedin_link="'+linkedin_link+'"';}else{linkedin_link ='';}
				if(pinterest_link!="" && iconsString.indexOf("pinterest") >= 0){ 
					pinterest_link = ' pinterest_link="'+pinterest_link+'"';}else{pinterest_link ='';}
				if(rss_link!="" && iconsString.indexOf("rss") >= 0){ 
					rss_link = ' rss_link="'+youtube_link+'"';}else{rss_link ='';}
				if(github_link!="" && iconsString.indexOf("github") >= 0){ 
					github_link = ' github_link="'+github_link+'"';}else{github_link ='';}
				if(twitter_link!="" && iconsString.indexOf("twitter") >= 0){ 
					twitter_link = ' twitter_link="'+twitter_link+'"';}else{twitter_link ='';}
				
				
				if(image != ''){
					image = ' href="'+ image +'"';
				}
				if(title != ''){
					title = ' title="'+ title +'"';
				}
				if(company != ''){
					company = ' company="'+ company +'"';
				}
				if(borderColor!=''){
					borderColor = ' borderColor="'+borderColor+'"';
				}
				
				if(title_customColor != ''){
					title_customColor = ' title_customColor="'+ title_customColor +'"';
				}
				
				if(title_textColor != ''){
					title_textColor = ' title_textColor="'+ title_textColor +'"';
				}	
			
				if(width!=0){
					width = ' width="'+width+'"';
				}else{
					width ='';
				}

				if(height!=0){
					height = ' height="'+height+'"';
				}else{
					height ='';
				}
				
				if(bgColor != ''){
					bgColor = ' bgColor="'+ bgColor +'"';
				}

				if(bgColor_start != ''){
					bgColor_start = ' bgColor_start="'+ bgColor_start +'"';
				}
				
				if(bgColor_end != ''){
					bgColor_end = ' bgColor_end="'+ bgColor_end +'"';
				}
				
				if(textColor != ''){
					textColor = ' textColor="'+ textColor +'"';
				}

				if(rounded===true){
					rounded = ' rounded="true"';
				}else{
					rounded = '';
				}
				return '\n[wt_team_box'+image+title+company+borderColor+title_customColor+title_textColor+width+height+bgColor+bgColor_start+bgColor_end+textColor+icons+twitter_link+pinterest_link+linkedin_link+github_link+facebook_link+rss_link+rounded+']\n'+rf_shortcode.getVal('wt_box_styles','wt_team_box','content')+'\n[/wt_team_box]\n';
			//}
			case 'wt_framed_box':
				var title = rf_shortcode.getVal('wt_box_styles','wt_framed_box','title');
			    var borderColor = rf_shortcode.getVal('wt_box_styles','wt_framed_box','borderColor');
				var title_customColor = rf_shortcode.getVal('wt_box_styles','wt_framed_box','title_customColor');
				var title_textColor = rf_shortcode.getVal('wt_box_styles','wt_framed_box','title_textColor');
				var width = rf_shortcode.getVal('wt_box_styles','wt_framed_box','width');
				var height = rf_shortcode.getVal('wt_box_styles','wt_framed_box','height');
				var bgColor = rf_shortcode.getVal('wt_box_styles','wt_framed_box','bgColor');
				var bgColor_start = rf_shortcode.getVal('wt_box_styles','wt_framed_box','bgColor_start');
				var bgColor_end = rf_shortcode.getVal('wt_box_styles','wt_framed_box','bgColor_end');
				var textColor = rf_shortcode.getVal('wt_box_styles','wt_framed_box','textColor');
				var rounded = rf_shortcode.getVal('wt_box_styles','wt_framed_box','rounded');

				if(title != ''){
					title = ' title="'+ title +'"';
				}
				if(borderColor!=''){
					borderColor = ' borderColor="'+borderColor+'"';
				}
				
				if(title_customColor != ''){
					title_customColor = ' title_customColor="'+ title_customColor +'"';
				}
				
				if(title_textColor != ''){
					title_textColor = ' title_textColor="'+ title_textColor +'"';
				}	
			
				if(width!=0){
					width = ' width="'+width+'"';
				}else{
					width ='';
				}

				if(height!=0){
					height = ' height="'+height+'"';
				}else{
					height ='';
				}
				
				if(bgColor != ''){
					bgColor = ' bgColor="'+ bgColor +'"';
				}

				if(bgColor_start != ''){
					bgColor_start = ' bgColor_start="'+ bgColor_start +'"';
				}
				
				if(bgColor_end != ''){
					bgColor_end = ' bgColor_end="'+ bgColor_end +'"';
				}
				
				if(textColor != ''){
					textColor = ' textColor="'+ textColor +'"';
				}

				if(rounded===true){
					rounded = ' rounded="true"';
				}else{
					rounded = '';
				}
				return '\n[wt_framed_box'+title+borderColor+title_customColor+title_textColor+width+height+bgColor+bgColor_start+bgColor_end+textColor+rounded+']\n'+rf_shortcode.getVal('wt_box_styles','wt_framed_box','content')+'\n[/wt_framed_box]\n';
			}
			case 'wt_framed_alt_box':
				var title = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','title');
			    var borderTopColor = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','borderTopColor');
			    var borderBottomColor = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','borderBottomColor');
			    var borderLeftColor = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','borderLeftColor');
			    var borderRightColor = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','borderRightColor');
			    var borderTopWidth = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','borderTopWidth');
			    var borderBottomWidth = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','borderBottomWidth');
			    var borderLeftWidth = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','borderLeftWidth');
			    var borderRightWidth = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','borderRightWidth');
				var title_customColor = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','title_customColor');
				var title_textColor = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','title_textColor');
				var width = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','width');
				var height = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','height');
				var bgColor = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','bgColor');
				var bgColor_start = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','bgColor_start');
				var bgColor_end = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','bgColor_end');
				var textColor = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','textColor');
				var rounded = rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','rounded');

				if(title != ''){
					title = ' title="'+ title +'"';
				}

				if(borderTopColor!=''){
					borderTopColor = ' borderTopColor="'+borderTopColor+'"';
				}
				
				if(borderBottomColor!=''){
					borderBottomColor = ' borderBottomColor="'+borderBottomColor+'"';
				}
				
				if(borderLeftColor!=''){
					borderLeftColor = ' borderLeftColor="'+borderLeftColor+'"';
				}
				
				if(borderRightColor!=''){
					borderRightColor = ' borderRightColor="'+borderRightColor+'"';
				}
				
				if(borderTopWidth!=0){
					borderTopWidth = ' borderTopWidth="'+borderTopWidth+'"';
				}else{
					borderTopWidth ='';
				}
				
				if(borderBottomWidth!=0){
					borderBottomWidth = ' borderBottomWidth="'+borderBottomWidth+'"';
				}else{
					borderBottomWidth ='';
				}
				
				if(borderLeftWidth!=0){
					borderLeftWidth = ' borderLeftWidth="'+borderLeftWidth+'"';
				}else{
					borderLeftWidth ='';
				}
				
				if(borderRightWidth!=0){
					borderRightWidth = ' borderRightWidth="'+borderRightWidth+'"';
				}else{
					borderRightWidth ='';
				}
				
				if(title_customColor != ''){
					title_customColor = ' title_customColor="'+ title_customColor +'"';
				}
				
				if(title_textColor != ''){
					title_textColor = ' title_textColor="'+ title_textColor +'"';
				}	
			
				if(width!=0){
					width = ' width="'+width+'"';
				}else{
					width ='';
				}

				if(height!=0){
					height = ' height="'+height+'"';
				}else{
					height ='';
				}
				
				if(bgColor != ''){
					bgColor = ' bgColor="'+ bgColor +'"';
				}

				if(bgColor_start != ''){
					bgColor_start = ' bgColor_start="'+ bgColor_start +'"';
				}
				
				if(bgColor_end != ''){
					bgColor_end = ' bgColor_end="'+ bgColor_end +'"';
				}
				
				if(textColor != ''){
					textColor = ' textColor="'+ textColor +'"';
				}

				if(rounded===true){
					rounded = ' rounded="true"';
				}else{
					rounded = '';
				}
				return '\n[wt_framed_alt_box'+borderTopColor+borderBottomColor+borderLeftColor+borderRightColor+borderTopWidth+borderBottomWidth+borderLeftWidth+borderRightWidth+width+height+bgColor+bgColor_start+bgColor_end+textColor+rounded+']\n'+rf_shortcode.getVal('wt_box_styles','wt_framed_alt_box','content')+'\n[/wt_framed_alt_box]\n';
			break;
			
		case 'wt_table':
			var id = rf_shortcode.getVal('wt_table','id');
			var align = rf_shortcode.getVal('wt_table','align');
			var width = rf_shortcode.getVal('wt_table','width');
			
			if(id!= ''){
				id = ' id="'+id+'"';
			}
			if(align !== ''){
				align = ' align="'+align+'"';
			}
			if(width!=0){
				width = ' width="'+width+'"';
			}else{
				width ='';
			}
			
			return '\n[wt_styled_table'+id+align+width+']\n'+rf_shortcode.getVal('wt_table','content')+'\n[/wt_styled_table]\n';
			break;
		case 'wt_images':
			var location = rf_shortcode.getVal('wt_images','location');
			var title = rf_shortcode.getVal('wt_images','title');
			var width = rf_shortcode.getVal('wt_images','width');
			var height = rf_shortcode.getVal('wt_images','height');
			var align = rf_shortcode.getVal('wt_images','align');
			var lightbox = rf_shortcode.getVal('wt_images','lightbox');
			var group = rf_shortcode.getVal('wt_images','group');
			var icon = rf_shortcode.getVal('wt_images','icon');
			var link = rf_shortcode.getVal('wt_images','link');
			var link_target = rf_shortcode.getVal('wt_images','link_target');			
			
			if(title!=''){
				title = ' title="'+title+'"';
			}
			if(width!=0){
				width = ' width="'+width+'"';
			}else{
				width ='';
			}
			if(height!=0){
				height = ' height="'+height+'"';
			}else{
				height ='';
			}
			if(align!=''){
				align =' align="'+align+'"';
			}
			if(lightbox===true){
				lightbox = ' lightbox="true"';
				if(group!=''){
					group = ' group="'+group+'"';
				}
			}else{
				lightbox = '';
				group = '';
			}
			if(icon!=''){
				icon =' icon="'+icon+'"';
			}
			if(link!= ''){
				link = ' link="'+link+'"';
			}
			if(link_target!= ''){
				link_target = ' link_target="'+link_target+'"';
			}
			
			return '\n[wt_image'+title+width+height+align+lightbox+group+icon+link+link_target+']'+location+'[/wt_image]';					
			break;	
						
		case 'tag':						
			
			var type = rf_shortcode.getVal('tag','type');
			var id_attr = rf_shortcode.getVal('tag','id_attr');
			var class_attr = rf_shortcode.getVal('tag','class_attr');
			var style = rf_shortcode.getVal('tag','style');
								
			if(type == ''){
				type='code';
			}						
			if(id_attr!=''){
				id_attr = ' id_attr="'+id_attr+'"';
			}					
			if(class_attr!=''){
				class_attr = ' class_attr="'+class_attr+'"';
			}		
			if(style !== ''){
				style = ' style="'+style+'"';
			}		
				
			var ret = '['+type+id_attr+class_attr+style+']\n';			
			ret += rf_shortcode.getVal('tag','content');
			ret += '\n[/'+type+']\n';
			
			return ret;	
			break;	
						
		case 'wt_isotope_element':						
			
			var location = rf_shortcode.getVal('wt_isotope_element','location');
			var type = rf_shortcode.getVal('wt_isotope_element','type');
			var title = rf_shortcode.getVal('wt_isotope_element','title');
			var lightbox = rf_shortcode.getVal('wt_isotope_element','lightbox');
			var group = rf_shortcode.getVal('wt_isotope_element','group');
			var icon = rf_shortcode.getVal('wt_isotope_element','icon');
			var link = rf_shortcode.getVal('wt_isotope_element','link');
			var link_target = rf_shortcode.getVal('wt_isotope_element','link_target');
								
			if(location!=''){
				location = ' location="'+location+'"';
			}
			if(title!=''){
				title = ' title="'+title+'"';
			}
			if(type!=''){
				type = ' type="'+type+'"';
			}
			if(lightbox===true){
				lightbox = ' lightbox="true"';
				if(group!=''){
					group = ' group="'+group+'"';
				}
			}else{
				lightbox = '';
				group = '';
			}
			if(icon!=''){
				icon =' icon="'+icon+'"';
			}
			if(link!= ''){
				link = ' link="'+link+'"';
			}
			if(link_target!= ''){
				link_target = ' link_target="'+link_target+'"';
			}
			
			var ret = '\n[wt_isotope_element'+location+type+title+lightbox+group+icon+link+link_target+']\n';
			ret += rf_shortcode.getVal('wt_isotope_element','content');
			ret += '\n[/wt_isotope_element]\n';
			
			return ret;		
			break;					
		case 'wt_buttons':
			var text = rf_shortcode.getVal('wt_buttons','text');
			var link = rf_shortcode.getVal('wt_buttons','link');
			var linkTarget = rf_shortcode.getVal('wt_buttons','linkTarget');
			var title = rf_shortcode.getVal('wt_buttons','title');
			var colorStyle = rf_shortcode.getVal('wt_buttons','colorStyle');
			var alt = rf_shortcode.getVal('wt_buttons','alt');
			var size = rf_shortcode.getVal('wt_buttons','size');
			var type = rf_shortcode.getVal('wt_buttons','type');
			var uppercase = rf_shortcode.getVal('wt_buttons','uppercase');
			var full = rf_shortcode.getVal('wt_buttons','full');
			var width = rf_shortcode.getVal('wt_buttons','width');
			var align = rf_shortcode.getVal('wt_buttons','align');
			var id = rf_shortcode.getVal('wt_buttons','id');
			var className = rf_shortcode.getVal('wt_buttons','className');
			var lightbox = rf_shortcode.getVal('wt_buttons','lightbox');
			var group = rf_shortcode.getVal('wt_buttons','group');
			var customColor = rf_shortcode.getVal('wt_buttons','customColor');
			var textColor = rf_shortcode.getVal('wt_buttons','textColor');
			var borderColor = rf_shortcode.getVal('wt_buttons','borderColor');
			var rightMargin = rf_shortcode.getVal('wt_buttons','rightMargin');

			if(link!= ''){
				link = ' link="'+link+'"';
			}
			if(linkTarget!= ''){
				linkTarget = ' linkTarget="'+linkTarget+'"';
			}
			if(title!=''){
				title = ' title="'+title+'"';
			}
			if(colorStyle!=''){
				colorStyle =' colorStyle="'+colorStyle+'"';
			}
			if(alt===true){
				alt = ' alt="true"';
			}else{
				alt = '';
			}
			if(size!=''){
				size =' size="'+size+'"';
			}
			if(type!=''){
				type =' type="'+type+'"';
			}
			if(uppercase===true){
				uppercase = ' uppercase="true"';
			}else{
				uppercase = '';
			}
			if(full===true){
				full = ' full="true"';
			}else{
				full = '';
			}
			if(width!=0){
				width = ' width="'+width+'"';
			}else{
				width ='';
			}
			if(align!=''){
				align =' align="'+align+'"';
			}
			if(id != ''){
				id = ' id="'+ id +'"';
			}
			if(className != ''){
				className = ' className="'+ className +'"';
			}
			if(lightbox===true){
				lightbox = ' lightbox="true"';
				if(group!=''){
					group = ' group="'+group+'"';
				}
			}else{
				lightbox = '';
				group = '';
			}
			if(customColor != ''){
				customColor = ' customColor="'+ customColor +'"';
			}
			if(textColor != ''){
				textColor = ' textColor="'+ textColor +'"';
			}
			if(borderColor != ''){
				borderColor = ' borderColor="'+ borderColor +'"';
			}	
			if(rightMargin===false){
				rightMargin = ' rightMargin="false"';
			}else{
				rightMargin = '';
			}		
			
			return '\n[wt_button'+link+linkTarget+title+colorStyle+alt+size+type+uppercase+full+width+align+id+className+lightbox+group+customColor+textColor+borderColor+rightMargin+']'+text+'[/wt_button]';
			break;
		case 'widget':
			var sub_type = rf_shortcode.getVal('widget','generator');
			switch(sub_type){
			case 'wt_recent_posts':
				var count = rf_shortcode.getVal('widget','wt_recent_posts','count');
				var thumbnail = rf_shortcode.getVal('widget','wt_recent_posts','thumbnail');
				var extra = rf_shortcode.getVal('widget','wt_recent_posts','extra');
				var desc_length = rf_shortcode.getVal('widget','wt_recent_posts','desc_length');
				var cat = rf_shortcode.getVal('widget','wt_recent_posts','cat');

				if(count !="" ){
					count = ' count="'+count+'"';
				}
				if(thumbnail===true){
					thumbnail = ' thumbnail="true"';
				}else{
					thumbnail = ' thumbnail="false"';
				}
				if(extra !="" ){
					extra = ' extra="'+extra+'"';
				}
				if(desc_length !="" ){
					desc_length = ' desc_length="'+desc_length+'"';
				}
				if(extra == "date" || extra == "comments"){
					desc_length = '';
				}
				if(cat!=undefined){
					cat = ' cat="'+cat+'"';
				}else{
					cat = '';
				}
				
				return '\n[wt_recent_posts'+count+thumbnail+extra+desc_length+cat+']\n';
				break;
			case 'wt_popular_posts':
				var count = rf_shortcode.getVal('widget','wt_popular_posts','count');
				var thumbnail = rf_shortcode.getVal('widget','wt_popular_posts','thumbnail');
				var extra = rf_shortcode.getVal('widget','wt_popular_posts','extra');
				var desc_length = rf_shortcode.getVal('widget','wt_popular_posts','desc_length');
				var cat = rf_shortcode.getVal('widget','wt_popular_posts','cat');
				
				if(count !="" ){
					count = ' count="'+count+'"';
				}
				if(thumbnail===true){
					thumbnail = ' thumbnail="true"';
				}else{
					thumbnail = ' thumbnail="false"';
				}
				if(extra !="" ){
					extra = ' extra="'+extra+'"';
				}
				if(desc_length !="" ){
					desc_length = ' desc_length="'+desc_length+'"';
				}
				if(extra == "date" || extra == "comments"){
					desc_length = '';
				}
				if(cat!=undefined){
					cat = ' cat="'+cat+'"';
				}else{
					cat = '';
				}

				return '\n[wt_popular_posts'+count+thumbnail+extra+desc_length+cat+']\n';
				break;
			case 'wt_twitter':
				var username = rf_shortcode.getVal('widget','wt_twitter','username');
				var count = rf_shortcode.getVal('widget','wt_twitter','count');
				var cycle_tweets = rf_shortcode.getVal('widget','wt_twitter','cycle_tweets');
				var buttons = rf_shortcode.getVal('widget','wt_twitter','buttons');
				
				if(username !="" ){
					username = ' username="'+username+'"';
				}
				if(count !="" ){
					count = ' count="'+count+'"';
				}
				if(cycle_tweets===true){
					cycle_tweets = ' cycle_tweets="true"';
				} else {
					cycle_tweets = '';
				}
				if(buttons===true){
					buttons = ' buttons="true"';
				} else {
					buttons = '';
				}
				
				return '\n[wt_twitter'+username+count+cycle_tweets+buttons+']\n';
				break;
			case 'wt_flickr':
				var type = rf_shortcode.getVal('widget','wt_flickr','type');
				var id = rf_shortcode.getVal('widget','wt_flickr','id');
				var count = rf_shortcode.getVal('widget','wt_flickr','count');
				// var display = rf_shortcode.getVal('widget','flickr','display');
				
				if(type !="" ){
					type = ' type="'+type+'"';
				}
				if(id !="" ){
					id = ' id="'+id+'"';
				}
				if(count !="" ){
					count = ' count="'+count+'"';
				}
				/*
				if(display !="" ){
					display = ' display="'+display+'"';
				}
				*/
				
				return '\n[wt_flickr'+type+id+count+']\n';
				break;
			case 'wt_social':
				
				var icons = rf_shortcode.getVal('widget','wt_social','icons');
				var icons32 = rf_shortcode.getVal('widget','wt_social','icons32');
				var icons_type = rf_shortcode.getVal('widget','wt_social','icons_type');
				var tooltip = rf_shortcode.getVal('widget','wt_social','tooltip');
				var tooltip_placement = rf_shortcode.getVal('widget','wt_social','tooltip_placement');
				
				var aim_link = rf_shortcode.getVal('widget','wt_social','aim_link');
				var apple_link = rf_shortcode.getVal('widget','wt_social','apple_link');
				var blogger_link = rf_shortcode.getVal('widget','wt_social','blogger_link');
				var behance_link = rf_shortcode.getVal('widget','wt_social','behance_link');
				var delicious_link = rf_shortcode.getVal('widget','wt_social','delicious_link');
				var deviantart_link = rf_shortcode.getVal('widget','wt_social','deviantart_link');
				var digg_link = rf_shortcode.getVal('widget','wt_social','digg_link');
				var dribbble_link = rf_shortcode.getVal('widget','wt_social','dribbble_link');
				var email_link = rf_shortcode.getVal('widget','wt_social','email_link');
				var ember_link = rf_shortcode.getVal('widget','wt_social','ember_link');
				var facebook_link = rf_shortcode.getVal('widget','wt_social','facebook_link');
				var flickr_link = rf_shortcode.getVal('widget','wt_social','flickr_link');
				var forrst_link = rf_shortcode.getVal('widget','wt_social','forrst_link');
				var google_link = rf_shortcode.getVal('widget','wt_social','google_link');
				var googleplus_link = rf_shortcode.getVal('widget','wt_social','googleplus_link');
				var html5_link = rf_shortcode.getVal('widget','wt_social','html5_link');
				var lastfm_link = rf_shortcode.getVal('widget','wt_social','lastfm_link');
				var linkedin_link = rf_shortcode.getVal('widget','wt_social','linkedin_link');
				var metacafe_link = rf_shortcode.getVal('widget','wt_social','metacafe_link');
				var netvibes_link = rf_shortcode.getVal('widget','wt_social','netvibes_link');
				var paypal_link = rf_shortcode.getVal('widget','wt_social','paypal_link');
				var picasa_link = rf_shortcode.getVal('widget','wt_social','picasa_link');
				var pinterest_link = rf_shortcode.getVal('widget','wt_social','pinterest_link');
				var reddit_link = rf_shortcode.getVal('widget','wt_social','reddit_link');
				var rss_link = rf_shortcode.getVal('widget','wt_social','rss_link');
				var skype_link = rf_shortcode.getVal('widget','wt_social','skype_link');
				var stumbleupon_link = rf_shortcode.getVal('widget','wt_social','stumbleupon_link');
				var technorati_link = rf_shortcode.getVal('widget','wt_social','technorati_link');
				var tumblr_link = rf_shortcode.getVal('widget','wt_social','tumblr_link');
				var twitter_link = rf_shortcode.getVal('widget','wt_social','twitter_link');
				var vimeo_link = rf_shortcode.getVal('widget','wt_social','vimeo_link');
				var wordpress_link = rf_shortcode.getVal('widget','wt_social','wordpress_link');
				var yahoo_link = rf_shortcode.getVal('widget','wt_social','yahoo_link');
				var yelp_link = rf_shortcode.getVal('widget','wt_social','yelp_link');
				var youtube_link = rf_shortcode.getVal('widget','wt_social','youtube_link');
				
				if(icons32===true){
					icons32 = ' type="icons32"';
				}else{
					icons32 = '';
				}
				if(icons_type!=undefined){
					icons_type = ' icons_type="'+icons_type+'"';
				}else{
					icons_type ='';
				}
				if(icons!=undefined){
					icons = ' icons="'+icons+'"';
					iconsString = icons;
				}else{
					icons = '';
					iconsString = '';
				}
				if(tooltip===true){
					tooltip = ' tooltip="true"';
					tooltip_placement = ' tooltip_placement="'+tooltip_placement+'"';
				}else{
					tooltip = '';
					tooltip_placement = '';
				}

				if(aim_link!="" && iconsString.indexOf("aim") >= 0){ 
					aim_link = ' aim_link="'+aim_link+'"';}else{aim_link ='';}
				if(apple_link!="" && iconsString.indexOf("apple") >= 0){ 
					apple_link = ' apple_link="'+apple_link+'"';}else{apple_link ='';}
				if(blogger_link!="" && iconsString.indexOf("blogger") >= 0){ 
					blogger_link = ' blogger_link="'+blogger_link+'"';}else{blogger_link ='';}
				if(behance_link!="" && iconsString.indexOf("behance") >= 0){
					behance_link = ' behance_link="'+behance_link+'"';}else{behance_link ='';}
				if(delicious_link!="" && iconsString.indexOf("delicious") >= 0){ 
					delicious_link = ' delicious_link="'+delicious_link+'"';}else{delicious_link ='';}
				if(deviantart_link!="" && iconsString.indexOf("deviantart") >= 0){ 
					deviantart_link = ' deviantart_link="'+deviantart_link+'"';}else{deviantart_link ='';}
				if(digg_link!="" && iconsString.indexOf("digg") >= 0){ 
					digg_link = ' digg_link="'+digg_link+'"';}else{digg_link ='';}
				if(dribbble_link!="" && iconsString.indexOf("dribbble") >= 0){
					dribbble_link = ' dribbble_link="'+dribbble_link+'"';}else{dribbble_link ='';}
				if(email_link!="" && iconsString.indexOf("email") >= 0){ 
					email_link = ' email_link="'+email_link+'"';}else{email_link ='';}
				if(ember_link!="" && iconsString.indexOf("ember") >= 0){ 
					ember_link = ' ember_link="'+ember_link+'"';}else{ember_link ='';}
				if(facebook_link!="" && iconsString.indexOf("facebook") >= 0){ 
					facebook_link = ' facebook_link="'+facebook_link+'"';}else{facebook_link ='';}
				if(flickr_link!="" && iconsString.indexOf("flickr") >= 0){ 
					flickr_link = ' flickr_link="'+flickr_link+'"';}else{flickr_link ='';}
				if(forrst_link!="" && iconsString.indexOf("forrst") >= 0){ 
					forrst_link = ' forrst_link="'+forrst_link+'"';}else{forrst_link ='';}
				if(google_link!="" && iconsString.indexOf("google") >= 0){ 
					google_link = ' google_link="'+google_link+'"';}else{google_link ='';}
				if(googleplus_link!="" && iconsString.indexOf("googleplus") >= 0){ 
					googleplus_link = ' googleplus_link="'+googleplus_link+'"';}else{googleplus_link ='';}
				if(html5_link!="" && iconsString.indexOf("html5") >= 0){ 
					html5_link = ' html5_link="'+html5_link+'"';}else{html5_link ='';}
				if(lastfm_link!="" && iconsString.indexOf("lastfm") >= 0){ 
					lastfm_link = ' lastfm_link="'+lastfm_link+'"';}else{lastfm_link ='';}
				if(linkedin_link!="" && iconsString.indexOf("linkedin") >= 0){ 
					linkedin_link = ' linkedin_link="'+linkedin_link+'"';}else{linkedin_link ='';}
				if(metacafe_link!="" && iconsString.indexOf("metacafe") >= 0){ 
					metacafe_link = ' metacafe_link="'+metacafe_link+'"';}else{metacafe_link ='';}
				if(netvibes_link!="" && iconsString.indexOf("netvibes") >= 0){ 
					netvibes_link = ' netvibes_link="'+netvibes_link+'"';}else{netvibes_link ='';}
				if(paypal_link!="" && iconsString.indexOf("paypal") >= 0){ 
					paypal_link = ' paypal_link="'+paypal_link+'"';}else{paypal_link ='';}
				if(picasa_link!="" && iconsString.indexOf("picasa") >= 0){ 
					picasa_link = ' picasa_link="'+picasa_link+'"';}else{picasa_link ='';}
				if(pinterest_link!="" && iconsString.indexOf("pinterest") >= 0){ 
					pinterest_link = ' pinterest_link="'+pinterest_link+'"';}else{pinterest_link ='';}
				if(reddit_link!="" && iconsString.indexOf("reddit") >= 0){ 
					reddit_link = ' reddit_link="'+reddit_link+'"';}else{reddit_link ='';}
				if(rss_link!="" && iconsString.indexOf("rss") >= 0){ 
					rss_link = ' rss_link="'+rss_link+'"';}else{rss_link ='';}
				if(skype_link!="" && iconsString.indexOf("skype") >= 0){ 
					skype_link = ' skype_link="'+skype_link+'"';}else{skype_link ='';}
				if(stumbleupon_link!="" && iconsString.indexOf("stumbleupon") >= 0){ 
					stumbleupon_link = ' stumbleupon_link="'+stumbleupon_link+'"';}else{stumbleupon_link ='';}
				if(technorati_link!="" && iconsString.indexOf("technorati") >= 0){ 
					technorati_link = ' technorati_link="'+technorati_link+'"';}else{technorati_link ='';}
				if(tumblr_link!="" && iconsString.indexOf("tumblr") >= 0){ 
					tumblr_link = ' tumblr_link="'+tumblr_link+'"';}else{tumblr_link ='';}
				if(twitter_link!="" && iconsString.indexOf("twitter") >= 0){ 
					twitter_link = ' twitter_link="'+twitter_link+'"';}else{twitter_link ='';}
				if(vimeo_link!="" && iconsString.indexOf("vimeo") >= 0){ 
					vimeo_link = ' vimeo_link="'+vimeo_link+'"';}else{vimeo_link ='';}
				if(wordpress_link!="" && iconsString.indexOf("wordpress") >= 0){ 
					wordpress_link = ' wordpress_link="'+wordpress_link+'"';}else{wordpress_link ='';}
				if(yahoo_link!="" && iconsString.indexOf("yahoo") >= 0){ 
					yahoo_link = ' yahoo_link="'+yahoo_link+'"';}else{yahoo_link ='';}
				if(yelp_link!="" && iconsString.indexOf("yelp") >= 0){ 
					yelp_link = ' yelp_link="'+yelp_link+'"';}else{yelp_link ='';}
				if(youtube_link!="" && iconsString.indexOf("youtube") >= 0){ 
					youtube_link = ' youtube_link="'+youtube_link+'"';}else{youtube_link ='';}
				
				return '\n[wt_social'+icons32+icons_type+tooltip+tooltip_placement+icons+aim_link+apple_link+blogger_link+behance_link+delicious_link+deviantart_link+digg_link+dribbble_link+email_link+ember_link+facebook_link+flickr_link+forrst_link+google_link+googleplus_link+html5_link+lastfm_link+linkedin_link+metacafe_link+netvibes_link+paypal_link+picasa_link+pinterest_link+reddit_link+rss_link+skype_link+stumbleupon_link+technorati_link+tumblr_link+twitter_link+vimeo_link+wordpress_link+yahoo_link+yelp_link+youtube_link+']\n';
				break;
			case 'wt_social_alt':
				
				var icons = rf_shortcode.getVal('widget','wt_social_alt','icons_alt');
				var icons32 = rf_shortcode.getVal('widget','wt_social_alt','icons32');
				var icons_type = rf_shortcode.getVal('widget','wt_social_alt','icons_type');
				
				var aim_link_alt = rf_shortcode.getVal('widget','wt_social_alt','aim_link_alt');
				var apple_link_alt = rf_shortcode.getVal('widget','wt_social_alt','apple_link_alt');
				var blogger_link_alt = rf_shortcode.getVal('widget','wt_social_alt','blogger_link_alt');
				var behance_link_alt = rf_shortcode.getVal('widget','wt_social_alt','behance_link_alt');
				var delicious_link_alt = rf_shortcode.getVal('widget','wt_social_alt','delicious_link_alt');
				var deviantart_link_alt = rf_shortcode.getVal('widget','wt_social_alt','deviantart_link_alt');
				var digg_link_alt = rf_shortcode.getVal('widget','wt_social_alt','digg_link_alt');
				var dribbble_link_alt = rf_shortcode.getVal('widget','wt_social_alt','dribbble_link_alt');
				var email_link_alt = rf_shortcode.getVal('widget','wt_social_alt','email_link_alt');
				var ember_link_alt = rf_shortcode.getVal('widget','wt_social_alt','ember_link_alt');
				var facebook_link_alt = rf_shortcode.getVal('widget','wt_social_alt','facebook_link_alt');
				var flickr_link_alt = rf_shortcode.getVal('widget','wt_social_alt','flickr_link_alt');
				var forrst_link_alt = rf_shortcode.getVal('widget','wt_social_alt','forrst_link_alt');
				var google_link_alt = rf_shortcode.getVal('widget','wt_social_alt','google_link_alt');
				var googleplus_link_alt = rf_shortcode.getVal('widget','wt_social_alt','googleplus_link_alt');
				var html5_link_alt = rf_shortcode.getVal('widget','wt_social_alt','html5_link_alt');
				var lastfm_link_alt = rf_shortcode.getVal('widget','wt_social_alt','lastfm_link_alt');
				var linkedin_link_alt = rf_shortcode.getVal('widget','wt_social_alt','linkedin_link_alt');
				var metacafe_link_alt = rf_shortcode.getVal('widget','wt_social_alt','metacafe_link_alt');
				var netvibes_link_alt = rf_shortcode.getVal('widget','wt_social_alt','netvibes_link_alt');
				var paypal_link_alt = rf_shortcode.getVal('widget','wt_social_alt','paypal_link_alt');
				var picasa_link_alt = rf_shortcode.getVal('widget','wt_social_alt','picasa_link_alt');
				var pinterest_link_alt = rf_shortcode.getVal('widget','wt_social_alt','pinterest_link_alt');
				var reddit_link_alt = rf_shortcode.getVal('widget','wt_social_alt','reddit_link_alt');
				var rss_link_alt = rf_shortcode.getVal('widget','wt_social_alt','rss_link_alt');
				var skype_link_alt = rf_shortcode.getVal('widget','wt_social_alt','skype_link_alt');
				var stumbleupon_link_alt = rf_shortcode.getVal('widget','wt_social_alt','stumbleupon_link_alt');
				var technorati_link_alt = rf_shortcode.getVal('widget','wt_social_alt','technorati_link_alt');
				var tumblr_link_alt = rf_shortcode.getVal('widget','wt_social_alt','tumblr_link_alt');
				var twitter_link_alt = rf_shortcode.getVal('widget','wt_social_alt','twitter_link_alt');
				var vimeo_link_alt = rf_shortcode.getVal('widget','wt_social_alt','vimeo_link_alt');
				var wordpress_link_alt = rf_shortcode.getVal('widget','wt_social_alt','wordpress_link_alt');
				var yahoo_link_alt = rf_shortcode.getVal('widget','wt_social_alt','yahoo_link_alt');
				var yelp_link_alt = rf_shortcode.getVal('widget','wt_social_alt','yelp_link_alt');
				var youtube_link_alt = rf_shortcode.getVal('widget','wt_social_alt','youtube_link_alt');
				
				if(icons32===true){
					icons32 = ' type="icons32"';
				}else{
					icons32 = '';
				}
				if(icons_type!=undefined){
					icons_type = ' icons_type="'+icons_type+'"';
				}else{
					icons_type ='';
				}
				if(icons!=undefined){
					icons = ' icons="'+icons+'"';
					iconsString = icons;
				}else{
					icons = '';
					iconsString = '';
				}
				
				if(aim_link_alt!="" && iconsString.indexOf("aim") >= 0){ 
					aim_link_alt = ' aim_link="'+aim_link_alt+'"';}else{aim_link_alt ='';}
				if(apple_link_alt!="" && iconsString.indexOf("apple") >= 0){ 
					apple_link_alt = ' apple_link="'+apple_link_alt+'"';}else{apple_link_alt ='';}
				if(blogger_link_alt!="" && iconsString.indexOf("blogger") >= 0){ 
					blogger_link_alt = ' blogger_link="'+blogger_link_alt+'"';}else{blogger_link_alt ='';}
				if(behance_link_alt!="" && iconsString.indexOf("behance") >= 0){ 
					behance_link_alt = ' behance_link="'+behance_link_alt+'"';}else{behance_link_alt ='';}
				if(delicious_link_alt!="" && iconsString.indexOf("delicious") >= 0){ 
					delicious_link_alt = ' delicious_link="'+delicious_link_alt+'"';}else{delicious_link_alt ='';}
				if(deviantart_link_alt!="" && iconsString.indexOf("deviantart") >= 0){ 
					deviantart_link_alt = ' deviantart_link="'+deviantart_link_alt+'"';}else{deviantart_link_alt ='';}
				if(digg_link_alt!="" && iconsString.indexOf("digg") >= 0){ 
					digg_link_alt = ' digg_link="'+digg_link_alt+'"';}else{digg_link_alt ='';}
				if(dribbble_link_alt!="" && iconsString.indexOf("dribbble") >= 0){ 
					dribbble_link_alt = ' dribbble_link="'+dribbble_link_alt+'"';}else{dribbble_link_alt ='';}
				if(email_link_alt!="" && iconsString.indexOf("email") >= 0){ 
					email_link_alt = ' email_link="'+email_link_alt+'"';}else{email_link_alt ='';}
				if(ember_link_alt!="" && iconsString.indexOf("ember") >= 0){ 
					ember_link_alt = ' ember_link="'+ember_link_alt+'"';}else{ember_link_alt ='';}
				if(facebook_link_alt!="" && iconsString.indexOf("facebook") >= 0){ 
					facebook_link_alt = ' facebook_link="'+facebook_link_alt+'"';}else{facebook_link_alt ='';}
				if(flickr_link_alt!="" && iconsString.indexOf("flickr") >= 0){ 
					flickr_link_alt = ' flickr_link="'+flickr_link_alt+'"';}else{flickr_link_alt ='';}
				if(forrst_link_alt!="" && iconsString.indexOf("forrst") >= 0){ 
					forrst_link_alt = ' forrst_link="'+forrst_link_alt+'"';}else{forrst_link_alt ='';}
				if(google_link_alt!="" && iconsString.indexOf("google") >= 0){ 
					google_link_alt = ' google_link="'+google_link_alt+'"';}else{google_link_alt ='';}
				if(googleplus_link_alt!="" && iconsString.indexOf("googleplus") >= 0){ 
					googleplus_link_alt = ' googleplus_link="'+googleplus_link_alt+'"';}else{googleplus_link_alt ='';}
				if(html5_link_alt!="" && iconsString.indexOf("html5") >= 0){ 
					html5_link_alt = ' html5_link="'+html5_link_alt+'"';}else{html5_link_alt ='';}
				if(lastfm_link_alt!="" && iconsString.indexOf("lastfm") >= 0){ 
					lastfm_link_alt = ' lastfm_link="'+lastfm_link_alt+'"';}else{lastfm_link_alt ='';}
				if(linkedin_link_alt!="" && iconsString.indexOf("linkedin") >= 0){ 
					linkedin_link_alt = ' linkedin_link="'+linkedin_link_alt+'"';}else{linkedin_link_alt ='';}
				if(metacafe_link_alt!="" && iconsString.indexOf("metacafe") >= 0){ 
					metacafe_link_alt = ' metacafe_link="'+metacafe_link_alt+'"';}else{metacafe_link_alt ='';}
				if(netvibes_link_alt!="" && iconsString.indexOf("netvibes") >= 0){ 
					netvibes_link_alt = ' netvibes_link="'+netvibes_link_alt+'"';}else{netvibes_link_alt ='';}
				if(paypal_link_alt!="" && iconsString.indexOf("paypal") >= 0){ 
					paypal_link_alt = ' paypal_link="'+paypal_link_alt+'"';}else{paypal_link_alt ='';}
				if(picasa_link_alt!="" && iconsString.indexOf("picasa") >= 0){ 
					picasa_link_alt = ' picasa_link="'+picasa_link_alt+'"';}else{picasa_link_alt ='';}
				if(pinterest_link_alt!="" && iconsString.indexOf("pinterest") >= 0){ 
					pinterest_link_alt = ' pinterest_link="'+pinterest_link_alt+'"';}else{pinterest_link_alt ='';}
				if(reddit_link_alt!="" && iconsString.indexOf("reddit") >= 0){ 
					reddit_link_alt = ' reddit_link="'+reddit_link_alt+'"';}else{reddit_link_alt ='';}
				if(rss_link_alt!="" && iconsString.indexOf("rss") >= 0){ 
					rss_link_alt = ' rss_link="'+rss_link_alt+'"';}else{rss_link_alt ='';}
				if(skype_link_alt!="" && iconsString.indexOf("skype") >= 0){ 
					skype_link_alt = ' skype_link="'+skype_link_alt+'"';}else{skype_link_alt ='';}
				if(stumbleupon_link_alt!="" && iconsString.indexOf("stumbleupon") >= 0){ 
					stumbleupon_link_alt = ' stumbleupon_link="'+stumbleupon_link_alt+'"';}else{stumbleupon_link_alt ='';}
				if(technorati_link_alt!="" && iconsString.indexOf("technorat") >= 0){ 
					technorati_link_alt = ' technorati_link="'+technorati_link_alt+'"';}else{technorati_link_alt ='';}
				if(tumblr_link_alt!="" && iconsString.indexOf("tumblr") >= 0){ 
					tumblr_link_alt = ' tumblr_link="'+tumblr_link_alt+'"';}else{tumblr_link_alt ='';}
				if(twitter_link_alt!="" && iconsString.indexOf("twitter") >= 0){ 
					twitter_link_alt = ' twitter_link="'+twitter_link_alt+'"';}else{twitter_link_alt ='';}
				if(vimeo_link_alt!="" && iconsString.indexOf("vimeo") >= 0){ 
					vimeo_link_alt = ' vimeo_link="'+vimeo_link_alt+'"';}else{vimeo_link_alt ='';}
				if(wordpress_link_alt!="" && iconsString.indexOf("wordpress") >= 0){ 
					wordpress_link_alt = ' wordpress_link="'+wordpress_link_alt+'"';}else{wordpress_link_alt ='';}
				if(yahoo_link_alt!="" && iconsString.indexOf("yahoo") >= 0){ 
					yahoo_link_alt = ' yahoo_link="'+yahoo_link_alt+'"';}else{yahoo_link_alt ='';}
				if(yelp_link_alt!="" && iconsString.indexOf("yelp") >= 0){ 
					yelp_link_alt = ' yelp_link="'+yelp_link_alt+'"';}else{yelp_link_alt ='';}
				if(youtube_link_alt!="" && iconsString.indexOf("youtube") >= 0){ 
					youtube_link_alt = ' youtube_link="'+youtube_link_alt+'"';}else{youtube_link_alt ='';}
				
				return '\n[wt_social_alt'+icons32+icons_type+icons+aim_link_alt+apple_link_alt+blogger_link_alt+behance_link_alt+delicious_link_alt+deviantart_link_alt+digg_link_alt+dribbble_link_alt+email_link_alt+ember_link_alt+facebook_link_alt+flickr_link_alt+forrst_link_alt+google_link_alt+googleplus_link_alt+html5_link_alt+lastfm_link_alt+linkedin_link_alt+metacafe_link_alt+netvibes_link_alt+paypal_link_alt+picasa_link_alt+pinterest_link_alt+reddit_link_alt+rss_link_alt+skype_link_alt+stumbleupon_link_alt+technorati_link_alt+tumblr_link_alt+twitter_link_alt+vimeo_link_alt+wordpress_link_alt+yahoo_link_alt+yelp_link_alt+youtube_link_alt+']\n';
				break;
			case 'wt_contact_info':
				var name = rf_shortcode.getVal('widget','wt_contact_info','name');
				var email = rf_shortcode.getVal('widget','wt_contact_info','email');
				var link = rf_shortcode.getVal('widget','wt_contact_info','link');
				var twitter = rf_shortcode.getVal('widget','wt_contact_info','twitter');
				var phone = rf_shortcode.getVal('widget','wt_contact_info','phone');
				var cellPhone = rf_shortcode.getVal('widget','wt_contact_info','cellPhone');
				var address = rf_shortcode.getVal('widget','wt_contact_info','address');
				var city = rf_shortcode.getVal('widget','wt_contact_info','city');
				var zip = rf_shortcode.getVal('widget','wt_contact_info','zip');
				var state = rf_shortcode.getVal('widget','wt_contact_info','state');
				
				if(name !="" ){
					name = ' name="'+name+'"';
				}
				if(email !="" ){
					email = ' email="'+email+'"';
				}
				if(link !="" ){
					link = ' link="'+link+'"';
				}
				if(twitter !="" ){
					twitter = ' twitter="'+twitter+'"';
				}
				if(phone !="" ){
					phone = ' phone="'+phone+'"';
				}
				if(cellPhone !="" ){
					cellPhone = ' cellPhone="'+cellPhone+'"';
				}
				if(address !="" ){
					address = ' address="'+address+'"';
				}
				if(city !="" ){
					city = ' city="'+city+'"';
				}
				if(zip !="" ){
					zip = ' zip="'+zip+'"';
				}
				if(state !="" ){
					state = ' state="'+state+'"';
				}
				
				return '\n[wt_contact_info'+name+email+link+twitter+phone+cellPhone+address+city+zip+state+']\n';
				break;	
			case 'wt_contact_form':
				var email = rf_shortcode.getVal('widget','wt_contact_form','email');
				if(email !="" ){
					email = ' email="'+email+'"'
				}
				var content = rf_shortcode.getVal('widget','wt_contact_form','content');
				if(content != ""){
					return '\n[wt_contact_form'+email+']\n'+content+'\n[/wt_contact_form]\n';
				}else{
					return '\n[wt_contact_form'+email+']\n';
				}
				break;
			}
			case 'wt_progressBar':
				var number = rf_shortcode.getVal('widget','wt_progressBar','progressBar_number');
				var columns = rf_shortcode.getVal('widget','wt_progressBar','progressBar_columns');
				if(columns !="" ){
					columns = ' columns="'+columns+'"';
				}
				var ret = '\n[wt_progressBars'+columns+']\n';
				for(var i=1;i<=number;i++){
					var progressWidth = rf_shortcode.getVal('widget','wt_progressBar','progressBar_width_'+i);	
					var progressColor = rf_shortcode.getVal('widget','wt_progressBar','progressBar_color_'+i);															
					if(progressWidth!=''){
						progressWidth = ' width="'+progressWidth+'"';
					}else{
						progressWidth ='';
					}														
					if(progressColor!=''){
						progressColor = ' color="'+progressColor+'"';
					}else{
						progressColor ='';
					}
					ret +='[wt_progress title="'+rf_shortcode.getVal('widget','wt_progressBar','progressBar_title_'+i)+'"'+progressWidth+progressColor+']\n';
				}
				ret += '[/wt_progressBars]\n';
				return ret;
				break;
			break;
		case 'wt_iFrame':
			var location = rf_shortcode.getVal('wt_iFrame','location');
			var width = rf_shortcode.getVal('wt_iFrame','width');
			var height = rf_shortcode.getVal('wt_iFrame','height');
			
			if(location!= ''){
				location = ' location="'+location+'"';
			}
			if(width!= ''){
				width = ' width="'+width+'"';
			}
			if(height!= ''){
				height = ' height="'+height+'"';
			}
			
			return '[wt_iFrame'+location+width+height+']';
			break;			
		case 'wt_gMap':
			var width = rf_shortcode.getVal('wt_gMap','width');
			var height = rf_shortcode.getVal('wt_gMap','height');
			var latitude = rf_shortcode.getVal('wt_gMap','latitude');
			var longitude = rf_shortcode.getVal('wt_gMap','longitude');
			var zoom = rf_shortcode.getVal('wt_gMap','zoom');
			
			var controls = rf_shortcode.getVal('wt_gMap','controls');			
			var panControl = rf_shortcode.getVal('wt_gMap','panControl');
			var zoomControl = rf_shortcode.getVal('wt_gMap','zoomControl');
			var mapTypeControl = rf_shortcode.getVal('wt_gMap','mapTypeControl');
			var scaleControl = rf_shortcode.getVal('wt_gMap','scaleControl');
			var streetViewControl = rf_shortcode.getVal('wt_gMap','streetViewControl');
			var overviewMapControl = rf_shortcode.getVal('wt_gMap','overviewMapControl');
			
			var customNavigation = rf_shortcode.getVal('wt_gMap','customNavigation');	
			var maptype = rf_shortcode.getVal('wt_gMap','maptype');
			var scrollwheel = rf_shortcode.getVal('wt_gMap','scrollwheel');
			var draggable = rf_shortcode.getVal('wt_gMap','draggable');
			var doubleclickzoom = rf_shortcode.getVal('wt_gMap','doubleclickzoom');
			var customMarkers = rf_shortcode.getVal('wt_gMap','customMarkers');
			var align = rf_shortcode.getVal('wt_gMap','align');			
			
			var styling = rf_shortcode.getVal('wt_gMap','styling');			
			var featureType = rf_shortcode.getVal('wt_gMap','map_featureType');
			var elementType = rf_shortcode.getVal('wt_gMap','map_elementType');
			var visibility = rf_shortcode.getVal('wt_gMap','map_visibility');
			var color = rf_shortcode.getVal('wt_gMap','map_color');
			var hue = rf_shortcode.getVal('wt_gMap','map_hue');
			var saturation = rf_shortcode.getVal('wt_gMap','map_saturation');
			var lightness = rf_shortcode.getVal('wt_gMap','map_lightness');
			var gamma = rf_shortcode.getVal('wt_gMap','map_gamma');
			
			var markers_number = rf_shortcode.getVal('wt_gMap','markers_number');	

			if(width!=0){
				width = ' width="'+width+'"';
			}else{
				width ='';
			}
			if(height!=0){
				height = ' height="'+height+'"';
			}else{
				height ='';
			}
			if(latitude!= ''){
				latitude = ' latitude="'+latitude+'"';
			}
			if(longitude!=''){
				longitude = ' longitude="'+longitude+'"';
			}
			if(zoom!=0){
				zoom = ' zoom="'+zoom+'"';
			}else{
				zoom ='';
			}
			if(controls===true){
				controls = ' controls="true"';
			}else{
				controls = '';
			}			
			
				if(panControl===true){
					panControl = '';
				}else{
					panControl = ' panControl="false"';
				}
				if(zoomControl===true){
					zoomControl = '';
				}else{
					zoomControl = ' zoomControl="false"';
				}
				if(mapTypeControl===true){
					mapTypeControl = '';
				}else{
					mapTypeControl = ' mapTypeControl="false"';
				}
				if(scaleControl===true){
					scaleControl = '';
				}else{
					scaleControl = ' scaleControl="false"';
				}
				if(streetViewControl===true){
					streetViewControl = '';
				}else{
					streetViewControl = ' streetViewControl="false"';
				}
				if(overviewMapControl===true){
					overviewMapControl = '';
				}else{
					overviewMapControl = ' overviewMapControl="false"';
				}
			
			if(maptype == 'G_NORMAL_MAP'){
				maptype = '';
			}
			if(maptype!= ''){
				maptype = ' maptype="'+maptype+'"';
			}			
			if(scrollwheel===true){
				scrollwheel = '';
			}else{
				scrollwheel = ' scrollwheel="false"';
			}		
			if(draggable===true){
				draggable = '';
			}else{
				draggable = ' draggable="false"';
			}		
			if(doubleclickzoom===true){
				doubleclickzoom = '';
			}else{
				doubleclickzoom = ' doubleclickzoom="false"';
			}
			if(align!=''){
				align =' align="'+align+'"';
			}	
			
			if(styling===true){
				styling = ' styling="true"';
			}else{
				styling = '';
			}			
							
				if(featureType != 'all'){
					featureType = ' featureType="'+featureType+'"';
				} else {
					featureType = '';
				}			
				if(elementType != 'all'){
					elementType = ' elementType="'+elementType+'"';
				} else {
					elementType = '';
				}			
				if(visibility != 'on'){
					visibility = ' visibility="'+visibility+'"';
				} else {
					visibility = '';
				}
				if(color != ''){
					color = ' color="'+color+'"';
				}
				if(hue != ''){
					hue = ' hue="'+hue+'"';
				}
				if(saturation != 0){
					saturation = ' saturation="'+saturation+'"';
				}else{
					saturation ='';
				}
				if(lightness != 0){
					lightness = ' lightness="'+lightness+'"';
				}else{
					lightness ='';
				}
				if(gamma != 1){
					gamma = ' gamma="'+gamma+'"';
				}else{
					gamma ='';
				}
			
			if(customMarkers===false){
				customMarkers = '';
			}else{
				customMarkers = ' customMarkers="true"';
			}
			if(customNavigation===false){
				customNavigation = '';
			}else{
				customNavigation = ' customNavigation="true"';
			}
						
			if (markers_number != 0) {
														
				var ret = '[wt_gMap'+width+height+latitude+longitude+zoom+controls+panControl+zoomControl+mapTypeControl+scaleControl+streetViewControl+overviewMapControl+maptype+scrollwheel+draggable+doubleclickzoom+align+styling+featureType+elementType+visibility+color+hue+saturation+lightness+gamma+customMarkers+customNavigation+']\n';
				for(var i=1;i<=markers_number;i++){
					if ( rf_shortcode.getVal('wt_gMap','marker_'+i+'_latitude')!='' || rf_shortcode.getVal('wt_gMap','marker_'+i+'_longitude')!='' || rf_shortcode.getVal('wt_gMap','marker_'+i+'_text')!='' || rf_shortcode.getVal('wt_gMap','marker_'+i+'_icon')!='' ) {
						var latitude = rf_shortcode.getVal('wt_gMap','marker_'+i+'_latitude');
						var longitude = rf_shortcode.getVal('wt_gMap','marker_'+i+'_longitude');
						var text = rf_shortcode.getVal('wt_gMap','marker_'+i+'_text');
						var icon = rf_shortcode.getVal('wt_gMap','marker_'+i+'_icon');													
														
							if(latitude!= ''){
								latitude = ' latitude="'+latitude+'"';
							} else {
								latitude = ' latitude="0"';
							}
							if(longitude!=''){
								longitude = ' longitude="'+longitude+'"';
							} else {
								longitude = ' longitude="0"';
							}
							if(text!= ''){
								text = ' text="'+text+'"';
							} else {
								text = ' text=""';
							}
							if(icon!= ''){
								icon = ' icon="'+icon+'"';
							} else {
								icon = '';
							}
							
						ret +='[marker'+latitude+longitude+text+icon+']\n';
					}
				}
				ret += '[/gMap]\n';
			
				return ret;	
				
			} else {
				return '[wt_gMap'+width+height+latitude+longitude+zoom+controls+panControl+zoomControl+mapTypeControl+scaleControl+streetViewControl+overviewMapControl+maptype+scrollwheel+draggable+doubleclickzoom+align+styling+featureType+elementType+visibility+color+hue+saturation+lightness+gamma+customMarkers+customNavigation+']\n';
			}
			break;	
		case 'wt_sitemap':
			var sub_type = rf_shortcode.getVal('wt_sitemap','generator');
			switch(sub_type){
				case 'all':
					var shows = rf_shortcode.getVal('wt_sitemap','all','shows');
					var number = rf_shortcode.getVal('wt_sitemap','all','number');

					if(shows!=undefined){
						shows = ' shows="'+shows+'"';
					}else{
						shows ='';
					}

					if(number!=0){
						number = ' number="'+number+'"';
					}else{
						number ='';
					}

					return '[wt_sitemap type="all"'+shows+number+']';
					break;
				case 'pages':
					var depth = rf_shortcode.getVal('wt_sitemap','pages','depth');
					var number = rf_shortcode.getVal('wt_sitemap','pages','number');

					if(depth!=0){
						depth = ' depth="'+depth+'"';
					}else{
						depth ='';
					}

					if(number!=0){
						number = ' number="'+number+'"';
					}else{
						number ='';
					}

					return '[wt_sitemap type="pages"'+depth+number+']';
					break;
				case 'posts':
					var show_comment = rf_shortcode.getVal('wt_sitemap','posts','show_comment');
					var number = rf_shortcode.getVal('wt_sitemap','posts','number');
					var cat = rf_shortcode.getVal('wt_sitemap','posts','cat');
					var posts = rf_shortcode.getVal('wt_sitemap','posts','posts');
					
					if(show_comment===false){
						show_comment = ' show_comment="false"';
					} else {
						show_comment = '';
					}
					if(number!=0){
						number = ' number="'+number+'"';
					}else{
						number ='';
					}
					if(posts!=undefined){
						posts = ' posts="'+posts+'"';
					}else{
						posts = '';
					}
					if(cat!=undefined){
						cat = ' cat="'+cat+'"';
					}else{
						cat = '';
					}

					return '[wt_sitemap type="posts"'+show_comment+number+posts+cat+']';
					break;
				case 'categories':
					var show_count = rf_shortcode.getVal('wt_sitemap','categories','show_count');
					var show_feed = rf_shortcode.getVal('wt_sitemap','categories','show_feed');
					var depth = rf_shortcode.getVal('wt_sitemap','categories','depth');
					var number = rf_shortcode.getVal('wt_sitemap','categories','number');
					
					if(show_count===false){
						show_count = ' show_count="false"';
					} else {
						show_count = '';
					}
					if(show_feed===false){
						show_feed = ' show_feed="false"';
					} else {
						show_feed = '';
					}
					
					if(depth!=0){
						depth = ' depth="'+depth+'"';
					}else{
						depth ='';
					}

					if(number!=0){
						number = ' number="'+number+'"';
					}else{
						number ='';
					}

					return '[wt_sitemap type="categories"'+show_count+show_feed+depth+number+']';
					break;
				case 'portfolios':
					var show_comment = rf_shortcode.getVal('wt_sitemap','portfolios','show_comment');
					var number = rf_shortcode.getVal('wt_sitemap','portfolios','number');
					var cat = rf_shortcode.getVal('wt_sitemap','portfolios','cat');
					
					if(show_comment===false){
						show_comment = '';
					} else {
						show_comment = ' show_comment="true"';
					}
					
					if(number!=0){
						number = ' number="'+number+'"';
					}else{
						number ='';
					}
					if(cat!=undefined){
						cat = ' cat="'+cat+'"';
					}else{
						cat = '';
					}

					return '[wt_sitemap type="portfolios"'+show_comment+number+cat+']';
					break;
			}
			break;
		case 'wt_tabs':
			var type = rf_shortcode.getVal('wt_tabs','type');
			var number = rf_shortcode.getVal('wt_tabs','number');
			var initialTab = rf_shortcode.getVal('wt_tabs','initialTab');
			
			if(type == ''){
				type = 'wt_tabs';
			}
			if(initialTab != 1){
				initialTab = ' initialTab="'+initialTab+'"';
			}else{
				initialTab = '';
			}
			
			var ret = '\n['+type+initialTab+']\n';
			for(var i=1;i<=number;i++){
				ret +='[wt_tab title="'+rf_shortcode.getVal('wt_tabs','title_'+i)+'"]\n'+rf_shortcode.getVal('wt_tabs','content_'+i)+'\n[/wt_tab]\n';
			}
			ret +='[/'+type+']\n';
			return ret;
			break;
		case 'wt_accordions':
			var type = rf_shortcode.getVal('wt_accordions','type');
			var number = rf_shortcode.getVal('wt_accordions','number');
			var initialPane = rf_shortcode.getVal('wt_accordions','initialPane');
			
			if(type == ''){
				type = 'wt_tabs';
			}
			if(initialPane != 1){
				initialPane = ' initialPane="'+initialPane+'"';
			}else{
				initialPane = '';
			}
			
			var ret = '\n['+type+initialPane+']\n';
			for(var i=1;i<=number;i++){
				ret +='[wt_accordion title="'+rf_shortcode.getVal('wt_accordions','title_'+i)+'"]\n'+rf_shortcode.getVal('wt_accordions','content_'+i)+'\n[/wt_accordion]\n';
			}
			ret +='[/'+type+']\n';
			return ret;
			break;
		case 'wt_toggle':
			var type = rf_shortcode.getVal('wt_toggle','type');
			var class_attr = rf_shortcode.getVal('wt_toggle','class_attr');
								
			if(class_attr!=''){
				class_attr = ' class_attr="'+class_attr+'"';
			}
			
			if(type == ''){
				type = 'wt_minimal_toggle';
			}
			var ret = '\n['+type+' ';
			ret += 'title="'+rf_shortcode.getVal('wt_toggle','title')+'"'+class_attr+'] '+rf_shortcode.getVal('wt_toggle','content')+' ';
			ret +='[/'+type+']\n';
			return ret;
			break;	
		}
		return '';
	},
	getVal:function(a,b,c){
		if(b == undefined){
			var target = jQuery('[name="sc_'+a+'"]');
			if(target.is('.toggle-button')){
				if(target.is(':checked')){
					return true;
				}else{
					return false;
				}
			}
			if(target.size() == 0){
				return jQuery('[name="sc_'+a+'[]"]').val();
			}else{
				return target.val();
			}
		}else if(c == undefined){
			var target = jQuery('[name="sc_'+a+'_'+b+'"]');
			if(target.is('.toggle-button')){
				if(target.is(':checked')){
					return true;
				}else{
					return false;
				}
			}
			if(target.size() == 0){
				return jQuery('[name="sc_'+a+'_'+b+'[]"]').val();
			}else{
				return target.val();
			}
		}else {
			var target = jQuery('[name="sc_'+a+'_'+b+'_'+c+'"]');
			if(target.is('.toggle-button')){
				if(target.is(':checked')){
					return true;
				}else{
					return false;
				}
			}
			if(target.is('.tri-toggle-button')){
				switch(target.val()){
					case 'true':
						return true;
					case 'false':
						return false;
					case 'default':
						return '';
				}
			}
			if(target.size() == 0){
				return jQuery('[name="sc_'+a+'_'+b+'_'+c+'[]"]').val();
			}else{
				return target.val();
			}
		}
		
	},
	sendToEditor :function(){
		var win = window.dialogArguments || opener || parent || top;
		
		win.send_to_editor(rf_shortcode.generate());
	},
	getUploadedImage : function(target,src){
		jQuery("#"+target).val(src);
		jQuery("#"+target+"_preview").html('<a class="thickbox" href="'+src+'?"><img src="'+src+'"/></a>');
	}
		
}

jQuery(document).ready( function($) {
	rf_shortcode.init();
});
