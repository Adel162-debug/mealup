<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In — Meal Up</title>
  <style>
    @font-face {
      font-family: 'Fredoka One:Regular';
      src: url('https://static.figma.com/font/FredokaOne-Regular_1') format('woff2');
      font-style: normal;
      font-weight: 400;
    }

    @font-face {
      font-family: 'Poppins:SemiBold';
      src: url('https://static.figma.com/font/Poppins-SemiBold_6') format('woff2');
      font-style: normal;
      font-weight: 600;
    }

    :root {
      color: #43271b;
      background: #fbf7ee;
      font-family: 'Poppins:SemiBold', sans-serif;
      font-synthesis: none;
    }

    body {
      margin: 0;
      min-width: 320px;
      min-height: 100dvh;
    }

    button,
    input {
      font-family: inherit;
    }

    .signin-page {
      position: relative;
      min-height: 100dvh;
      overflow: hidden;
      background: #fbf7ee;
    }

    .welcome-panel,
    .brown-shape {
      position: absolute;
      inset: 0 auto 0 0;
      width: 60.89vw;
      height: 100%;
    }

    .brown-shape {
      display: block;
      width: 100%;
    }

    .meal-up-logo {
      position: absolute;
      z-index: 3;
      top: 4%;
      left: 46.32%;
      width: 8.48%;
      min-width: 92px;
      height: auto;
      object-fit: contain;
    }

    .welcome-copy {
      position: absolute;
      z-index: 2;
      inset: 0;
      color: #fff;
    }

    .welcome-copy h1 {
      position: absolute;
      top: 28.35%;
      left: 28.4%;
      font-family: 'Fredoka One:Regular', sans-serif;
      font-size: clamp(30px, 2.78vw, 40px);
      font-weight: 400;
      line-height: 1.3;
    }

    .meal-up-letters {
      position: absolute;
      inset: 0;
      color: #d9d9d9;
      font-family: 'Fredoka One:Regular', sans-serif;
      font-size: clamp(28px, 2.78vw, 40px);
      line-height: 1;
    }

    .meal-up-letters span {
      position: absolute;
    }

    .letter-m { left: 21.2%; top: 44.6%; }
    .letter-e { left: 28.4%; top: 55%; }
    .letter-u { left: 22.7%; top: 62.1%; }
    .letter-a { left: 42%; top: 51.4%; }
    .letter-p { left: 41.3%; top: 60.6%; }
    .letter-l { left: 54.9%; top: 58.1%; }

    .bubble,
    .dot,
    .tomato,
    .pepper,
    .coffee {
      position: absolute;
      z-index: 1;
      pointer-events: none;
      user-select: none;
    }

    .bubble-large { left: 39%; top: 2.35%; width: 34.9%; }
    .bubble-corner { left: -9.1%; top: 78.8%; width: 36%; }
    .bubble-mid { left: 34.1%; top: 18.65%; width: 18%; }
    .bubble-pepper { left: 71%; top: 57.9%; width: 18%; }
    .bubble-top { left: -5.35%; top: -6.25%; width: 18%; }
    .dot-one { left: 14.8%; top: 31.9%; width: 4%; }
    .dot-two { left: 34.9%; top: 70.1%; width: 4%; }
    .dot-three { left: 61.7%; top: 46.2%; width: 4%; }
    .dot-four { left: 59.8%; top: 87.9%; width: 4%; }

    .tomato {
      left: 14%;
      top: 15.1%;
      width: 7.2%;
      height: 7%;
    }

    .tomato > img:first-child {
      position: absolute;
      left: 8%;
      top: 18%;
      width: 81%;
    }

    .tomato-leaf {
      position: absolute;
      left: -5%;
      top: 20%;
      width: 48%;
    }

    .tomato-stem {
      position: absolute;
      left: 41%;
      top: -2%;
      width: 27%;
    }

    .pepper {
      left: 74.8%;
      top: 59.6%;
      width: 7.3%;
      height: 8%;
    }

    .pepper > img:first-child {
      width: 100%;
      height: 100%;
    }

    .pepper-stem {
      position: absolute;
      top: -12%;
      right: -6%;
      width: 30%;
    }

    .coffee {
      left: 9.7%;
      top: 86%;
      width: 6.5%;
    }

    .auth-panel {
      position: absolute;
      z-index: 4;
      top: 25.7%;
      left: 65.28%;
      width: min(29.31vw, 422px);
    }

    .signin-form {
      display: flex;
      flex-direction: column;
    }

    .signin-form h2 {
      margin-bottom: 49px;
      text-align: center;
      font-family: 'Fredoka One:Regular', sans-serif;
      font-size: 40px;
      font-weight: 400;
      line-height: 1.25;
    }

    .signin-form label {
      display: flex;
      flex-direction: column;
      gap: 6px;
      margin-bottom: 31px;
      padding-inline: 20px 0;
      font-size: 15px;
      line-height: 1.2;
    }

    .signin-form input {
      width: calc(100% + 20px);
      height: 40px;
      margin-left: -20px;
      padding: 10px 20px;
      color: #43271b;
      background: #fff;
      border: 1px solid rgb(0 0 0 / 25%);
      border-radius: 15px;
      outline: none;
      transition: border-color 160ms ease, box-shadow 160ms ease;
    }

    .signin-form input::placeholder {
      color: rgb(67 39 27 / 60%);
      opacity: 1;
    }

    .signin-form input:focus {
      border-color: #43271b;
      box-shadow: 0 0 0 3px rgb(67 39 27 / 12%);
    }

    .signin-form button {
      height: 50px;
      margin-top: -1px;
      color: #fff;
      background: #43271b;
      border: 0;
      border-radius: 24px;
      font-size: 20px;
      line-height: 1;
      cursor: pointer;
      transition: transform 300ms ease-out, background 160ms ease;
    }

    .signin-form button:hover {
      background: #563225;
    }

    .signin-form button:active {
      transform: scale(0.97);
    }

    .signin-form button:focus-visible,
    .signup-prompt a:focus-visible {
      outline: 3px solid #c39567;
      outline-offset: 3px;
    }

    .form-message {
      min-height: 18px;
      margin-top: 8px;
      color: rgb(67 39 27 / 70%);
      font-size: 11px;
      text-align: center;
    }

    .signup-prompt {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 2px;
      font-size: 15px;
      line-height: 1.55;
    }

    .signup-prompt span {
      color: rgb(67 39 27 / 60%);
    }

    .signup-prompt a {
      color: #43271b;
      text-decoration: none;
    }

    .signup-prompt a:hover {
      text-decoration: underline;
    }

    @media (max-width: 900px) {
      .signin-page {
        display: grid;
        grid-template-rows: minmax(280px, 40dvh) 1fr;
        overflow: auto;
      }

      .welcome-panel {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background: #43271b;
      }

      .brown-shape {
        display: none;
      }

      .meal-up-logo {
        position: absolute;
        top: calc(40dvh + 26px);
        left: 50%;
        width: 112px;
        min-width: 0;
        transform: translateX(-50%);
      }

      .welcome-copy h1 {
        top: 25%;
        left: 50%;
        transform: translateX(-50%);
        white-space: nowrap;
      }

      .meal-up-letters {
        opacity: 0.62;
      }

      .letter-m { left: 20%; top: 50%; }
      .letter-e { left: 32%; top: 67%; }
      .letter-u { left: 16%; top: 76%; }
      .letter-a { left: 62%; top: 56%; }
      .letter-p { left: 57%; top: 78%; }
      .letter-l { left: 76%; top: 69%; }

      .bubble-large { left: 58%; top: -26%; width: 42%; }
      .bubble-corner { left: -14%; top: 53%; width: 45%; }
      .bubble-mid { left: 24%; top: 7%; width: 24%; }
      .bubble-pepper { left: 75%; top: 51%; width: 24%; }
      .tomato { left: 8%; top: 15%; width: 11%; }
      .pepper { left: 82%; top: 60%; width: 11%; }
      .coffee { left: 7%; top: 74%; width: 10%; }

      .auth-panel {
        position: relative;
        top: auto;
        left: auto;
        width: min(100% - 40px, 422px);
        margin: 95px auto 52px;
      }

      .signin-form h2 {
        margin-bottom: 38px;
        font-size: 36px;
      }
    }

    @media (max-height: 700px) and (min-width: 901px) {
      .auth-panel {
        top: 17%;
      }

      .signin-form h2 {
        margin-bottom: 32px;
      }

      .signin-form label {
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>
  <main class="signin-page">
    <section class="welcome-panel" aria-labelledby="welcome-title">
      <img class="brown-shape" src="{{ asset('assets/16872.svg') }}" alt="" />

      <img class="bubble bubble-large" src="{{ asset('assets/518f9.svg') }}" alt="" />
      <img class="bubble bubble-corner" src="{{ asset('assets/50f75.svg') }}" alt="" />
      <img class="bubble bubble-mid" src="{{ asset('assets/63a09.svg') }}" alt="" />
      <img class="bubble bubble-pepper" src="{{ asset('assets/63a09.svg') }}" alt="" />
      <img class="bubble bubble-top" src="{{ asset('assets/63a09.svg') }}" alt="" />
      <img class="dot dot-one" src="{{ asset('assets/1a586.svg') }}" alt="" />
      <img class="dot dot-two" src="{{ asset('assets/1a586.svg') }}" alt="" />
      <img class="dot dot-three" src="{{ asset('assets/1a586.svg') }}" alt="" />
      <img class="dot dot-four" src="{{ asset('assets/1a586.svg') }}" alt="" />

      <div class="tomato" aria-hidden="true">
        <img src="{{ asset('assets/ddf3f.svg') }}" alt="" />
        <img class="tomato-leaf" src="{{ asset('assets/867df.svg') }}" alt="" />
        <img class="tomato-stem" src="{{ asset('assets/a7b29.svg') }}" alt="" />
      </div>

      <div class="pepper" aria-hidden="true">
        <img src="{{ asset('assets/a9257.svg') }}" alt="" />
        <img class="pepper-stem" src="{{ asset('assets/45e5a.svg') }}" alt="" />
      </div>

      <img class="coffee" src="{{ asset('assets/6014f.svg') }}" alt="" />

      <div class="welcome-copy">
        <h1 id="welcome-title">Welcome!</h1>
        <div class="meal-up-letters" aria-label="Meal Up">
          <span class="letter-m">M</span>
          <span class="letter-e">E</span>
          <span class="letter-a">A</span>
          <span class="letter-u">U</span>
          <span class="letter-p">P</span>
          <span class="letter-l">L</span>
        </div>
      </div>
    </section>

    <img class="meal-up-logo" src="{{ asset('assets/73d6a.png') }}" alt="Meal Up" />

    <section class="auth-panel" aria-labelledby="signin-title">
      <form class="signin-form" id="signinForm" method="POST" action="#">
        @csrf
        <h2 id="signin-title">Sign in</h2>

        <label>
          <span>Username *</span>
          <input
            name="username"
            type="text"
            placeholder="Insert"
            minlength="4"
            required
          />
        </label>

        <label>
          <span>Password *</span>
          <input
            name="password"
            type="password"
            placeholder="Insert"
            minlength="8"
            required
          />
        </label>

        <button type="submit">Sign in</button>
        <p class="form-message" id="formMessage" aria-live="polite"></p>

        <div class="signup-prompt">
          <span>Don’t have account?</span>
          <a href="{{ url('/signup') }}">Sign up</a>
        </div>
      </form>
    </section>
  </main>

  <script>
    const form = document.getElementById('signinForm');
    const messageEl = document.getElementById('formMessage');

    form.addEventListener('submit', function (event) {
      event.preventDefault();

      const username = form.username.value.trim();
      const password = form.password.value;

      if (username.length < 4) {
        messageEl.textContent = 'Username minimal 4 karakter.';
        form.username.focus();
        return;
      }

      if (password.length < 8) {
        messageEl.textContent = 'Password minimal 8 karakter.';
        form.password.focus();
        return;
      }

      window.location.href = "{{ url('/home') }}";
    });
  </script>
</body>
</html>