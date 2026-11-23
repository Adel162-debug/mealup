<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up — Meal Up</title>
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
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      min-width: 320px;
      min-height: 100dvh;
      background: #fbf7ee;
    }

    button,
    a,
    input {
      font-family: inherit;
      -webkit-tap-highlight-color: transparent;
    }

    .auth-page {
      position: relative;
      min-height: 100dvh;
      overflow-x: clip;
      background: #fbf7ee;
    }

    .welcome-artwork {
      position: absolute;
      inset: 0 auto 0 0;
      width: min(61vw, 877px);
      height: 100%;
      min-height: 100dvh;
      color: white;
      overflow: hidden;
    }

    .welcome-shape {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: left center;
    }

    .brand-logo {
      position: absolute;
      top: 32px;
      left: min(46.5vw, 667px);
      width: 122px;
      height: auto;
      object-fit: contain;
      z-index: 3;
    }

    .welcome-copy {
      position: absolute;
      inset: 0;
      font-family: 'Fredoka One:Regular', sans-serif;
      font-size: clamp(28px, 2.78vw, 40px);
      font-weight: 400;
      z-index: 2;
    }

    .welcome-copy h2 {
      position: absolute;
      top: 30%;
      left: 31%;
      margin: 0;
      line-height: normal;
      white-space: nowrap;
    }

    .letters {
      color: #d9d9d9;
    }

    .letters span {
      position: absolute;
      line-height: 1.1;
    }

    .letter-m { top: 46%; left: 24%; }
    .letter-e { top: 57%; left: 31%; }
    .letter-u { top: 65%; left: 25.5%; }
    .letter-a { top: 53%; left: 45%; }
    .letter-p { top: 63%; left: 44%; }
    .letter-l { top: 60%; left: 58%; }

    .bubble,
    .dot,
    .food-art,
    .food-art img {
      position: absolute;
      pointer-events: none;
      user-select: none;
    }

    .bubble-large { top: 6%; left: 42%; width: 38%; }
    .bubble-bottom { bottom: -10%; left: -6%; width: 38%; }
    .bubble-top { top: -3%; left: -2%; width: 18%; }
    .bubble-middle { top: 22%; left: 37%; width: 18%; }
    .bubble-pepper { top: 60%; left: 72%; width: 18%; }

    .dot-one { top: 35%; left: 18%; width: 4%; }
    .dot-two { top: 72%; left: 38%; width: 4%; }
    .dot-three { top: 49%; left: 64%; width: 4%; }
    .dot-four { top: 88%; left: 62%; width: 4%; }

    .soup {
      bottom: 8%;
      left: 12%;
      width: 64px;
      height: 60px;
    }

    .soup img:first-child { left: 6px; top: 7px; }
    .soup img:last-child { left: 0; top: 0; }

    .pepper-top {
      top: 18%;
      left: 16%;
      width: 70px;
      height: 70px;
    }

    .pepper-top img:first-child { left: 8px; top: 15px; }
    .pepper-top img:nth-child(2) { left: 5px; top: 21px; }
    .pepper-top img:last-child { left: 30px; top: 0; }

    .pepper-bottom {
      top: 62%;
      left: 75%;
      width: 70px;
      height: 78px;
    }

    .pepper-bottom img:first-child { left: 0; top: 31px; }
    .pepper-bottom img:last-child { left: 27px; top: 0; }

    .auth-panel {
      position: relative;
      margin-left: auto;
      margin-right: clamp(32px, 5.5vw, 96px);
      padding-top: clamp(72px, 9vh, 115px);
      padding-bottom: 40px;
      width: min(422px, 34vw);
      min-width: 300px;
      text-align: center;
      z-index: 4;
    }

    .auth-panel h1 {
      margin: 0 0 28px;
      font-family: 'Fredoka One:Regular', sans-serif;
      font-size: clamp(32px, 2.8vw, 40px);
      font-weight: 400;
      line-height: normal;
    }

    .auth-panel form {
      display: flex;
      flex-direction: column;
      gap: 14px;
      width: 100%;
    }

    .auth-panel label {
      display: flex;
      flex-direction: column;
      gap: 6px;
      text-align: left;
      width: 100%;
    }

    .auth-panel label span {
      padding-left: 18px;
      font-family: 'Poppins:SemiBold', sans-serif;
      font-size: 14px;
      font-weight: 600;
      line-height: 1.2;
    }

    .auth-panel input {
      width: 100%;
      height: 38px;
      border: 1px solid rgb(0 0 0 / 25%);
      border-radius: 15px;
      background: white;
      padding: 8px 18px;
      color: #43271b;
      font-family: 'Poppins:SemiBold', sans-serif;
      font-size: 14px;
      font-weight: 600;
      outline: none;
      transition:
        border-color 160ms ease,
        box-shadow 160ms ease;
    }

    .auth-panel input::placeholder {
      color: rgb(67 39 27 / 60%);
      opacity: 1;
    }

    .auth-panel input:focus {
      border-color: #43271b;
      box-shadow: 0 0 0 3px rgb(67 39 27 / 12%);
    }

    .auth-panel form > button {
      width: 100%;
      height: 46px;
      margin-top: 8px;
      border: 0;
      border-radius: 24px;
      background: #43271b;
      color: white;
      font-family: 'Poppins:SemiBold', sans-serif;
      font-size: 18px;
      font-weight: 600;
      cursor: pointer;
      transition:
        transform 150ms ease,
        background 150ms ease;
    }

    .auth-panel form > button:hover {
      background: #5a3525;
    }

    .auth-panel form > button:active {
      transform: scale(0.985);
    }

    .form-message {
      min-height: 18px;
      margin: 2px 0 0;
      color: #a43737;
      font-size: 12px;
      text-align: center;
    }

    .account-switch {
      margin-top: 10px;
      font-family: 'Poppins:SemiBold', sans-serif;
      font-size: 14px;
      font-weight: 600;
    }

    .account-switch p {
      margin: 0 0 2px;
      color: rgb(67 39 27 / 60%);
    }

    .account-switch a {
      color: #43271b;
      text-decoration: none;
      cursor: pointer;
    }

    .account-switch a:hover {
      text-decoration: underline;
      text-underline-offset: 3px;
    }

    @media (max-width: 850px) {
      .welcome-artwork {
        display: none;
      }

      .brand-logo {
        top: 24px;
        left: 50%;
        width: 110px;
        transform: translateX(-50%);
      }

      .auth-panel {
        margin: 0 auto;
        padding: 96px 20px 48px;
        width: min(100%, 422px);
      }

      .auth-panel h1 {
        margin-bottom: 24px;
      }
    }
  </style>
</head>
<body>
  <main class="auth-page">
    <section class="welcome-artwork signup" aria-label="Welcome to Meal Up">
      <img class="welcome-shape" src="{{ asset('assets/16872.svg') }}" alt="" />

      <div class="welcome-copy">
        <h2>Welcome!</h2>
        <div class="letters" aria-hidden="true">
          <span class="letter-m">M</span>
          <span class="letter-e">E</span>
          <span class="letter-u">U</span>
          <span class="letter-a">A</span>
          <span class="letter-p">P</span>
          <span class="letter-l">L</span>
        </div>
      </div>

      <img class="bubble bubble-large" src="{{ asset('assets/518f9.svg') }}" alt="" />
      <img class="bubble bubble-bottom" src="{{ asset('assets/50f75.svg') }}" alt="" />
      <img class="bubble bubble-top" src="{{ asset('assets/63a09.svg') }}" alt="" />
      <img class="bubble bubble-middle" src="{{ asset('assets/63a09.svg') }}" alt="" />
      <img class="bubble bubble-pepper" src="{{ asset('assets/63a09.svg') }}" alt="" />
      <img class="dot dot-one" src="{{ asset('assets/1a586.svg') }}" alt="" />
      <img class="dot dot-two" src="{{ asset('assets/1a586.svg') }}" alt="" />
      <img class="dot dot-three" src="{{ asset('assets/1a586.svg') }}" alt="" />
      <img class="dot dot-four" src="{{ asset('assets/1a586.svg') }}" alt="" />

      <div class="food-art soup" aria-hidden="true">
        <img src="{{ asset('assets/6014f.svg') }}" alt="" />
        <img src="{{ asset('assets/29138.svg') }}" alt="" />
      </div>
      <div class="food-art pepper-top" aria-hidden="true">
        <img src="{{ asset('assets/ddf3f.svg') }}" alt="" />
        <img src="{{ asset('assets/867df.svg') }}" alt="" />
        <img src="{{ asset('assets/a7b29.svg') }}" alt="" />
      </div>
      <div class="food-art pepper-bottom" aria-hidden="true">
        <img src="{{ asset('assets/a9257.svg') }}" alt="" />
        <img src="{{ asset('assets/45e5a.svg') }}" alt="" />
      </div>
    </section>

    <img class="brand-logo" src="{{ asset('assets/73d6a.png') }}" alt="Meal Up" />

    <section class="auth-panel signup" aria-labelledby="form-title">
      <h1 id="form-title">Sign up</h1>

      <form id="signupForm" method="POST" action="#">
        @csrf
        <label>
          <span>Username *</span>
          <input name="username" type="text" placeholder="Insert" autocomplete="username" minlength="4" required />
        </label>

        <label>
          <span>Email *</span>
          <input name="email" type="email" placeholder="Insert" autocomplete="email" required />
        </label>

        <label>
          <span>Password *</span>
          <input name="password" type="password" placeholder="Insert" autocomplete="new-password" minlength="6" required />
        </label>

        <label>
          <span>Confirm Password *</span>
          <input name="confirmPassword" type="password" placeholder="Insert" autocomplete="new-password" minlength="6" required />
        </label>

        <button type="submit">Sign up</button>
        <p class="form-message" id="formMessage" role="status"></p>
      </form>

      <div class="account-switch">
        <p>Already have account?</p>
        <a href="{{ url('/signin') }}">Sign in</a>
      </div>
    </section>
  </main>

  <script>
    const signupForm = document.getElementById('signupForm');
    const formMessage = document.getElementById('formMessage');

    signupForm.addEventListener('submit', function (event) {
      event.preventDefault();

      const username = signupForm.username.value.trim();
      const email = signupForm.email.value.trim();
      const password = signupForm.password.value;
      const confirmPassword = signupForm.confirmPassword.value;

      if (username.length < 4) {
        formMessage.textContent = 'Username minimal 4 karakter.';
        signupForm.username.focus();
        return;
      }

      if (!email) {
        formMessage.textContent = 'Email wajib diisi.';
        signupForm.email.focus();
        return;
      }

      if (password.length < 6) {
        formMessage.textContent = 'Password minimal 6 karakter.';
        signupForm.password.focus();
        return;
      }

      if (password !== confirmPassword) {
        formMessage.textContent = 'Passwords need to match.';
        signupForm.confirmPassword.focus();
        return;
      }

      window.location.href = "{{ url('/signin') }}";
    });
  </script>
</body>
</html>