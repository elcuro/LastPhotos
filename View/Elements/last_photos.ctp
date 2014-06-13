<?php 
	if (isset($this->viewVars['last_photos'])) {
?>
	<ul class="last-photos">
		<?php 
			foreach($this->viewVars['last_photos'] as $photo) {
				$photo = $photo['Nodeattachment'];
				$thumb = $this->Image2
					->source('uploads/' . $photo['filename'])
					->crop(50, 50)
					->imagePath();
				$thumbTag = $this->Html->image($thumb, array(
					'alt' => $photo['title']));
				$link = $this->Html->link($thumbTag, '/uploads/' . $photo['filename'], array(
					'title' => $photo['title'],
					'escape' => false));
				echo $this->Html->tag('li', $link);
			}

		 ?>
	</ul>
<?php
	}
 ?>