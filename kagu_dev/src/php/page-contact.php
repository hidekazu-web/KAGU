<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part('includes/head'); ?>
  <?php get_template_part('includes/lower_fv'); ?>

  <main class="l-main">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="p-section p-byPhoneSection">
          <div class="l-container p-section__content">
            <div class="p-section__title c-lv2Heading">電話でのお問い合わせ<span>by phone</span></div><!-- /.p-section__title c-lv2Heading -->
            <div class="p-section__main">
              <p class="p-section__text">弊社に関するご質問がございましたら、お気軽にご相談下さい。 </p><!-- /.p-section__text -->
              <div class="p-byPhoneSection__box">
                <a href="tel:052-000-0000" class="p-byPhoneSection__telWrap p-phoneBox">
                  <div class="p-phoneBox__main">
                    <div class="p-phoneBox__tel">052-000-0000</div><!-- /.p-phoneBox__tel -->
                    <div class="p-phoneBox__time">受付時間 10:00-17:00</div><!-- /.p-phoneBox__time -->
                  </div><!-- /.p-phoneBox__main -->
                </a><!-- /.p-byPhoneSection__telWrap -->
              </div><!-- /.p-byPhoneSection__box -->
            </div><!-- /.p-section__main -->
          </div><!-- /.l-container l-container--narrow -->
        </div><!-- /.p-section p-byPhoneSection -->

        <div class="p-section p-byMailSection">
          <div class="l-container l-container--semiNarrow">
            <div class="p-section__title c-lv2Heading">メールでのお問い合わせ<span>by e-mail</span></div><!-- /.p-section__title c-lv2Heading -->
            <div class="p-section__main">
              <p class="p-section__text">
                家具のご購入、採用について等お気軽にご相談下さい。<br>
                下記フォームに必要事項をご入力の上、お問合せをお願いいたします。
              </p><!-- /.p-section__text -->
              <form action="" method="post" class="p-byMailSection__form p-form">
                <dl class="p-form__items">
                  <div class="p-form__item">
                    <dt class="p-form__itemHead p-form__label is-required">氏名（全角）</dt><!-- /.p-form__label -->
                    <div class="p-form__itemBody">
                      <dd>
                        <label>
                          <p class="p-form__label">姓</p><!-- /.p-form__label -->
                          <input type="text" name="your-second-name" id="" placeholder="家具" required>
                        </label>
                      </dd>
                      <dd>
                        <label>
                          <p class="p-form__label">名</p><!-- /.p-form__label -->
                          <input type="text" name="your-first-name" id="" placeholder="太郎" required>
                        </label>
                      </dd>
                    </div><!-- /.p-form__itemBody -->
                  </div><!-- /.p-form__item -->
                  <div class="p-form__item">
                    <dt class="p-form__itemHead p-form__label is-required">フリガナ（全角）</dt><!-- /.p-form__label -->
                    <div class="p-form__itemBody">
                      <dd>
                        <label>
                          <p class="p-form__label">セイ</p><!-- /.p-form__label -->
                          <input type="text" name="your-second-name-kana" id="" placeholder="カグ" required>
                        </label>
                      </dd>
                      <dd>
                        <label>
                          <p class="p-form__label">メイ</p><!-- /.p-form__label -->
                          <input type="text" name="your-first-name-kana" id="" placeholder="タロウ" required>
                        </label>
                      </dd>
                    </div><!-- /.p-form__itemBody -->
                  </div><!-- /.p-form__item -->
                  <div class="p-form__item">
                    <dt class="p-form__itemHead p-form__label is-required"><label for="your-mail">メールアドレス</label></dt><!-- /.p-form__itemHead p-form__label is-required -->
                    <dd class="p-form__itemBody">
                      <input type="text" name="your-mail" id="your-mail">
                    </dd><!-- /.p-form__itemBody -->
                  </div><!-- /.p-form__item -->
                  <div class="p-form__item">
                    <dt class="p-form__itemHead p-form__label is-required"><label for="your-mail-confirm">メールアドレス（確認用）</label></dt><!-- /.p-form__itemHead p-form__label is-required -->
                    <dd class="p-form__itemBody">
                      <input type="text" name="your-mail-confirm" id="your-mail-confirm">
                    </dd><!-- /.p-form__itemBody -->
                  </div><!-- /.p-form__item -->
                  <div class="p-form__item">
                    <dt class="p-form__itemHead p-form__label is-required"><label for="your-content">お問い合わせ内容</label></dt><!-- /.p-form__itemHead p-form__label is-required -->
                    <dd class="p-form__itemBody">
                      <textarea name="your-content" id="your-content"></textarea><!-- /# -->
                    </dd><!-- /.p-form__itemBody -->
                  </div><!-- /.p-form__item -->

                </dl><!-- /.p-form__items -->
                <div class="p-form__checkBox">
                  <div class="c-check">
                    <label><input class="c-check__input" type="checkbox" name="privacy-check"><span><a href="<?php echo esc_html(home_url('/privacy')); ?>">プライバシーポリシー</a>に同意する</span></label>
                  </div><!-- /.c-checkBox -->
                </div><!-- /.p-form__checkBox -->
                <div class="p-form__footer">
                  <button type="submit" disabled class="p-form__submit c-btn">送信する</button>
                </div><!-- /.p-form__footer -->

              </form><!-- /.p-byMailSection__form p-form -->
              <?php # the_content();
              ?>
            </div><!-- /.p-section__main -->
          </div><!-- /.l-container l-container--semiNarrow -->
        </div><!-- /.p-section p-byMailSection -->

      <?php endwhile; ?>
    <?php else : ?>
      <!-- 投稿がないときの処理 -->
      <p>投稿がありません</p>
    <?php endif;  ?>

  </main><!-- /.l-main -->

  <?php get_template_part('includes/cta'); ?>

  <?php get_template_part('includes/foot'); ?>
  <?php get_footer(); ?>
</body>

</html>
