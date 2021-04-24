<dl class="p-form__items">
  <div class="p-form__item">
    <dt class="p-form__itemHead p-form__label is-required">氏名（全角）</dt>
    <dd class="p-form__itemBody p-form__itemBody--flex">
      <label class="p-form__itemBodyItem">
        <p class="p-form__label p-form__label--prepend">姓</p>
        [mwform_text name="your_second_name" id="your-second-name" class="p-form__input" placeholder="家具"]
      </label>
      <label class="p-form__itemBodyItem">
        <p class="p-form__label p-form__label--prepend">名</p>
        [mwform_text name="your_first_name" id="your-first-name" class="p-form__input" placeholder="太郎"]
      </label>
    </dd>
  </div>
  <div class="p-form__item">
    <dt class="p-form__itemHead p-form__label is-required">フリガナ（全角）</dt>
    <dd class="p-form__itemBody p-form__itemBody--flex">
      <label class="p-form__itemBodyItem">
        <p class="p-form__label p-form__label--prepend">セイ</p>
        [mwform_text name="your_second_name_kana" id="your-second-name-kana" class="p-form__input js-formKana" placeholder="カグ"]
      </label>
      <label class="p-form__itemBodyItem">
        <p class="p-form__label p-form__label--prepend">メイ</p>
        [mwform_text name="your_first_name_kana" id="your-first-name-kana" class="p-form__input js-formKana" placeholder="タロウ"]
      </label>
    </dd>
  </div>
  <div class="p-form__item">
    <dt class="p-form__itemHead p-form__label is-required"><label for="your-mail">メールアドレス</label></dt>
    <dd class="p-form__itemBody">
      [mwform_email name="your_mail" id="your-mail" class="p-form__input"]
    </dd>
  </div>
  <div class="p-form__item">
    <dt class="p-form__itemHead p-form__label is-required"><label for="your-mail-confirm">メールアドレス（確認用）</label></dt>
    <dd class="p-form__itemBody">
      [mwform_email name="your_mail_confirm" id="your-mail-confirm" class="p-form__input"]
    </dd>
  </div>
  <div class="p-form__item">
    <dt class="p-form__itemHead p-form__label is-required"><label for="your-content">お問い合わせ内容</label></dt>
    <dd class="p-form__itemBody">
      [mwform_textarea name="your_content" id="your-contnet" class="p-form__textarea p-form__input"]
    </dd>
  </div>

</dl>
<div class="p-form__checkBox">
  <label class="p-form__checkBoxLabel">
    <input id="js-privacy" class="p-form__checkBoxInput" type="checkbox" name="privacy-check" required>
    <span class="p-form__checkBoxText">
      <a href="https://kagu.pilotfish21.com/privacy" target="_blank" rel="noopener noreferrer">プライバシーポリシー</a>に同意する
    </span>
  </label>
</div>
<div class="p-form__footer">
  [mwform_submit name="submit" class="p-form__submit c-btn c-btn--submit js-submit" value="送信する"]
</div>
