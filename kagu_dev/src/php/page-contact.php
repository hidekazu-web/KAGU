<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part('includes/head'); ?>
  <?php get_template_part('includes/lower_fv'); ?>
  <?php get_template_part('includes/breadcrumb'); ?>

  <main class="l-main">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="p-section p-byPhoneSection">
          <div class="l-container">
            <div class="p-section__title">電話でのお問い合わせ<span>by phone</span></div><!-- /.p-section__title-->
            <div class="p-section__main">
              <p class="p-section__lead">弊社に関するご質問がございましたら、お気軽にご相談下さい。 </p><!-- /.p-section__lead -->
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
          <div class="l-container l-container--semiNarrow p-section__content">
            <div class="p-section__title">メールでのお問い合わせ<span>by e-mail</span></div><!-- /.p-section__title-->
            <div class="p-section__main">
              <p class="p-section__lead">
                家具のご購入、採用について等お気軽にご相談下さい。<br>
                下記フォームに必要事項をご入力の上、お問合せをお願いいたします。
              </p><!-- /.p-section__lead -->
              <form action="" method="post" id="js-form" class="p-byMailSection__form p-form">
                <dl class="p-form__items">
                  <div class="p-form__item">
                    <dt class="p-form__itemHead p-form__label is-required">氏名（全角）</dt><!-- /.p-form__label -->
                    <dd class="p-form__itemBody">
                      <label class="p-form__itemBodyItem">
                        <p class="p-form__label p-form__label--prepend">姓</p><!-- /.p-form__label -->
                        <input type="text" name="your-second-name" id="your-second-name" class="p-form__input p-form__input--row" placeholder="家具" required>
                      </label>
                      <label class="p-form__itemBodyItem">
                        <p class="p-form__label p-form__label--prepend">名</p><!-- /.p-form__label -->
                        <input type="text" name="your-first-name" id="your-first-name" class="p-form__input p-form__input--row" placeholder="太郎" required>
                      </label>
                    </dd><!-- /.p-form__itemBody -->
                  </div><!-- /.p-form__item -->
                  <div class="p-form__item">
                    <dt class="p-form__itemHead p-form__label is-required">フリガナ（全角）</dt><!-- /.p-form__label -->
                    <dd class="p-form__itemBody">
                      <label class="p-form__itemBodyItem">
                        <p class="p-form__label p-form__label--prepend">セイ</p><!-- /.p-form__label -->
                        <input type="text" name="your-second-name-kana" id="your-second-name-kana" class="p-form__input p-form__input--row js-formKana" placeholder="カグ" required>
                      </label>
                      <label class="p-form__itemBodyItem">
                        <p class="p-form__label p-form__label--prepend">メイ</p><!-- /.p-form__label -->
                        <input type="text" name="your-first-name-kana" id="your-first-name-kana" class="p-form__input p-form__input--row js-formKana" placeholder="タロウ" required>
                      </label>
                    </dd><!-- /.p-form__itemBody -->
                  </div><!-- /.p-form__item -->
                  <div class="p-form__item">
                    <dt class="p-form__itemHead p-form__label is-required"><label for="your-mail">メールアドレス</label></dt><!-- /.p-form__itemHead p-form__label is-required -->
                    <dd class="p-form__itemBody">
                      <input type="email" name="your-mail" id="your-mail" class="p-form__input" required>
                    </dd><!-- /.p-form__itemBody -->
                  </div><!-- /.p-form__item -->
                  <div class="p-form__item">
                    <dt class="p-form__itemHead p-form__label is-required"><label for="your-mail-confirm">メールアドレス（確認用）</label></dt><!-- /.p-form__itemHead p-form__label is-required -->
                    <dd class="p-form__itemBody">
                      <input type="email" name="your-mail-confirm" id="your-mail-confirm" class="p-form__input" required>
                    </dd><!-- /.p-form__itemBody -->
                  </div><!-- /.p-form__item -->
                  <div class="p-form__item">
                    <dt class="p-form__itemHead p-form__label is-required"><label for="your-content">お問い合わせ内容</label></dt><!-- /.p-form__itemHead p-form__label is-required -->
                    <dd class="p-form__itemBody">
                      <textarea name="your-content" id="your-content" class="p-form__textarea p-form__input" required></textarea><!-- /# -->
                    </dd><!-- /.p-form__itemBody -->
                  </div><!-- /.p-form__item -->

                </dl><!-- /.p-form__items -->
                <div class="p-form__checkBox">
                  <label class="p-form__checkBoxLabel">
                    <input id="js-privacy" class="p-form__checkBoxInput" type="checkbox" name="privacy-check" required>
                    <span class="p-form__checkBoxText">
                      <a href="<?php echo esc_html(home_url('/privacy')); ?>" target="_blank" rel="noopener noreferrer">プライバシーポリシー</a>に同意する
                    </span>
                  </label>
                </div><!-- /.p-form__checkBox -->
                <div class="p-form__footer">
                  <button type="submit" disabled id="js-submit" class="p-form__submit c-btn c-btn--submit">送信する</button>
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
