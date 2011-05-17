<!-- indexer::stop -->
<div class="<?php echo $this->class; ?><?php if (!$this->tableless): ?> tableform<?php endif; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
 <a class="invisible" href="#skipNavigation1">Stilwechsel-Navigation überspringen</a>

 <?php if ($this->headline): ?>
 <<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
 <?php endif; ?>


<?php /*******************************************************
       *       DO NOT REMOVE class="styleswitcher" !!!       *
       *******************************************************/ ?>
       

<?php if (is_array($this->arrFonts) && count($this->arrFonts)): ?>
<ul id="schriftwechsler" class="styleswitcher">
<?php foreach ($this->arrFonts as $font): ?>
  <a title="<?php echo $font['label'] ?>" href="<?php echo $font['href'] ?>">
   <img alt="<?php echo $font['label'] ?>" src="<?php echo $font['image'] ?>">
  </a>
<?php endforeach; ?>
</ul>
<?php endif; ?>



<?php if (is_array($this->arrStyles) && count($this->arrStyles)): ?>
<ul id="designwechsler" class="styleswitcher">
<?php foreach ($this->arrStyles as $style): ?>
  <a title="<?php echo $style['label'] ?>" href="<?php echo $style['href'] ?>">
   <img alt="<?php echo $style['label'] ?>" src="<?php echo $style['image'] ?>">
  </a>
<?php endforeach; ?>
</ul>
<?php endif; ?>

 <a name="skipNavigation1" id="skipNavigation1" class="invisible">&nbsp;</a>
</div>
<!-- indexer::continue -->
