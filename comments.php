<article class="container box style3">
 <div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <h4><b><?php $this->commentsNum(_t('快抢沙发'), _t('沙发被抢'), _t('已有 %d 条评论')); ?></b></h4>
    <div>
    <?php $comments->listComments(); ?>
      <hr />
    </div>
   <ol class="page-navigator"><li class="current"><?php $comments->pageNav(); ?></li></ol>
    <?php endif; ?>
    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
    <div class="cancel-comment-reply">
    <?php $comments->cancelReply(); ?>
    </div>
   </div>
  <p><h4 id="comments" class="subhead"><?php _e('添加新评论'); ?></h4></p>
  <form method="post" action="<?php $this->commentUrl() ?>">
          <p><?php if($this->user->hasLogin()): ?>
          登录为 <a href="<?php $this->options->profileUrl(); ?>" target="_blank" data-no-instant><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" data-no-instant><?php _e('退出'); ?> &raquo;</a>
          <?php else: ?></p>
					<div class="row">
					<div class="12u$"> <input type="text" name="author" id="author" placeholder="称呼*" value="<?php $this->remember('author'); ?>" required/></div>
                     <div class="12u$"><input type="email" name="mail" id="mail" placeholder="电子邮件*" value="<?php $this->remember('mail'); ?>" required/></div>
                     <div class="12u$"><input type="url" name="url" id="url" placeholder="网站" value="<?php $this->remember('url'); ?>" /></div>
						<?php endif; ?>
					<div class="12u$">
							<textarea name="text" id="comment" required="true" placeholder="牛逼的人都会说两句"><?php $this->remember('text'); ?></textarea>
						</div>
 			<div class="12u$">
							<ul class="actions">
								<li><input type="submit" value="<?php _e('提交评论'); ?>" /></li>
							</ul>
						</div>
                       <script type="text/javascript">(function(){window.TypechoComment={dom:function(id){return document.getElementById(id)},create:function(tag,attr){var el=document.createElement(tag);for(var key in attr){el.setAttribute(key,attr[key])}return el},reply:function(cid,coid){var comment=this.dom(cid),parent=comment.parentNode,response=this.dom("<?php $this->respondId(); ?>"),input=this.dom("comment-parent"),form="form"==response.tagName?response:response.getElementsByTagName("form")[0],textarea=response.getElementsByTagName("textarea")[0];if(null==input){input=this.create("input",{"type":"hidden","name":"parent","id":"comment-parent"});form.appendChild(input)}input.setAttribute("value",coid);if(null==this.dom("comment-form-place-holder")){var holder=this.create("div",{"id":"comment-form-place-holder"});response.parentNode.insertBefore(holder,response)}comment.appendChild(response);this.dom("cancel-comment-reply-link").style.display="";if(null!=textarea&&"text"==textarea.name){textarea.focus()}return false},cancelReply:function(){var response=this.dom("<?php $this->respondId(); ?>"),holder=this.dom("comment-form-place-holder"),input=this.dom("comment-parent");if(null!=input){input.parentNode.removeChild(input)}if(null==holder){return true}this.dom("cancel-comment-reply-link").style.display="none";holder.parentNode.insertBefore(response,holder);return false}}})();</script>
					</div>
  </form>
    </div>
      <?php if ($this->options->Ic == 'o'): ?>
        <script type="text/javascript">(function(){window.TypechoComment={dom:function(id){return document.getElementById(id)},create:function(tag,attr){var el=document.createElement(tag);for(var key in attr){el.setAttribute(key,attr[key])}return el},reply:function(cid,coid){var comment=this.dom(cid),parent=comment.parentNode,response=this.dom("<?php $this->respondId(); ?>"),input=this.dom("comment-parent"),form="form"==response.tagName?response:response.getElementsByTagName("form")[0],textarea=response.getElementsByTagName("textarea")[0];if(null==input){input=this.create("input",{"type":"hidden","name":"parent","id":"comment-parent"});form.appendChild(input)}input.setAttribute("value",coid);if(null==this.dom("comment-form-place-holder")){var holder=this.create("div",{"id":"comment-form-place-holder"});response.parentNode.insertBefore(holder,response)}comment.appendChild(response);this.dom("cancel-comment-reply-link").style.display="";if(null!=textarea&&"text"==textarea.name){textarea.focus()}return false},cancelReply:function(){var response=this.dom("<?php $this->respondId(); ?>"),holder=this.dom("comment-form-place-holder"),input=this.dom("comment-parent");if(null!=input){input.parentNode.removeChild(input)}if(null==holder){return true}this.dom("cancel-comment-reply-link").style.display="none";holder.parentNode.insertBefore(response,holder);return false}}})();</script>
      <?php endif; ?>
    <?php else: ?>
      <?php _e('<div class="alert info center">该文章的评论已关闭</div>'); ?>
    <?php endif; ?>

</article>