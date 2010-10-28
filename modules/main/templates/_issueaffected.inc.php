add buttons here
<br><br>
<?php
	$editions = array();
	$components = array();
	$builds = array();
	
	if($issue->getProject()->isEditionsEnabled())
	{
		$editions = $issue->getEditions();
	}
	
	if($issue->getProject()->isComponentsEnabled())
	{
		$components = $issue->getComponents();
	}

	if($issue->getProject()->isBuildsEnabled())
	{
		$builds = $issue->getBuilds();
	}
	
	$count = count($editions) + count($components) + count($builds);
	
	if ($count == 0):
?>
	<span class="faded_out"><?php echo __('There are no items'); ?></span>
<?php
	else:
?>
<table style="width: 100%;" cellpadding="0" cellspacing="0" class="issue_affects">
	<tr>
		<th style="width: 16px; text-align: right; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 3px;"></th><th><?php echo __('Name'); ?></th><th><?php echo __('Status'); ?></th><th style="width: 90px; text-align: right; padding-top: 0px; padding-right: 3px; padding-bottom: 0px; padding-left: 0px;"><?php echo __('Confirmed'); ?></th>
	</tr>
	<?php
		if ($issue->getProject()->isEditionsEnabled()):
			foreach ($issue->getEditions() as $edition):
				?>
	<tr>
		<td><?php echo image_tag('icon_edition.png', array('alt' => __('Edition'))); ?></td><td style="padding-left: 3px;"><?php echo $edition['edition']->getName(); ?></td><td style="width: 240px">
		<table style="table-layout: auto; width: 240px"; cellpadding=0 cellspacing=0 id="status_table">
			<tr>
				<td style="width: 24px;"><div style="border: 1px solid #AAA; background-color: <?php echo $edition['status']->getColor(); ?>; font-size: 1px; width: 20px; height: 15px; margin-right: 2px;" id="status_color">&nbsp;</div></td>
				<td style="padding-left: 5px;" id="status_content"><?php echo $edition['status']->getName(); ?></td>
			</tr>
		</table>
		</td><td style="width: 90px; text-align: right; padding-top: 0px; padding-right: 3px; padding-bottom: 0px; padding-left: 0px;"><?php if ($edition['confirmed']): echo image_tag('action_ok_small.png', array('alt' => __('Yes'))); else: echo image_tag('action_cancel_small.png', array('alt' => __('No'))); endif; ?></td>
	</tr>
				<?php
			endforeach;
		endif;
	?>
	<?php
		if ($issue->getProject()->isComponentsEnabled()):
			foreach ($issue->getComponents() as $component):
				?>
	<tr>
		<td><?php echo image_tag('icon_components.png', array('alt' => __('Component'))); ?></td><td style="padding-left: 3px;"><?php echo $component['component']->getName(); ?></td><td style="width: 240px">
		<table style="table-layout: auto; width: 240px"; cellpadding=0 cellspacing=0 id="status_table">
			<tr>
				<td style="width: 24px;"><div style="border: 1px solid #AAA; background-color: <?php echo $component['status']->getColor(); ?>; font-size: 1px; width: 20px; height: 15px; margin-right: 2px;" id="status_color">&nbsp;</div></td>
				<td style="padding-left: 5px;" id="status_content"><?php echo $component['status']->getName(); ?></td>
			</tr>
		</table>
		</td><td style="width: 90px; text-align: right; padding-top: 0px; padding-right: 3px; padding-bottom: 0px; padding-left: 0px;"><?php if ($component['confirmed']): echo image_tag('action_ok_small.png', array('alt' => __('Yes'))); else: echo image_tag('action_cancel_small.png', array('alt' => __('No'))); endif; ?></td>
	</tr>
				<?php
			endforeach;
		endif;
	?>
	<?php
		if ($issue->getProject()->isBuildsEnabled()):
			foreach ($issue->getBuilds() as $build):
				?>
	<tr>
		<td><?php echo image_tag('icon_build.png', array('alt' => __('Release'))); ?></td><td style="padding-left: 3px;"><?php echo $build['build']->getName(); ?></td><td style="width: 240px">
		<table style="table-layout: auto; width: 240px"; cellpadding=0 cellspacing=0 id="status_table">
			<tr>
				<td style="width: 24px;"><div style="border: 1px solid #AAA; background-color: <?php echo $build['status']->getColor(); ?>; font-size: 1px; width: 20px; height: 15px; margin-right: 2px;" id="status_color">&nbsp;</div></td>
				<td style="padding-left: 5px;" id="status_content"><?php echo $build['status']->getName(); ?></td>
			</tr>
		</table>
		</td><td style="width: 90px; text-align: right; padding-top: 0px; padding-right: 3px; padding-bottom: 0px; padding-left: 0px;"><?php if ($build['confirmed']): echo image_tag('action_ok_small.png', array('alt' => __('Yes'))); else: echo image_tag('action_cancel_small.png', array('alt' => __('No'))); endif; ?></td>
	</tr>
				<?php
			endforeach;
		endif;
	?>
</table>
<?php
endif;
?>