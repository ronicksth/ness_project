<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartLearn Login</title>
  <style>
    :root {
      --bg: #f5f7fa;
      --card: #ffffff;
      --text: #1a1a1a;
      --border: #e5e7eb;
      --primary: #2f6fed;
      --primary-dark: #2455b6;
      --danger: #dc2626;
    }
    [data-theme="dark"] {
      --bg: #0f1115;
      --card: #181c25;
      --text: #e5e7eb;
      --border: #2a2f3a;
      --primary: #5fa2ff;
      --primary-dark: #3d7fe0;
    }

    body {
      margin: 0;
      font-family: system-ui, sans-serif;
      background: var(--bg);
      color: var(--text);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .login-card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 2rem;
      width: 100%;
      max-width: 360px;
      box-shadow: 0 8px 24px rgba(0,0,0,.1);
    }

    h2 {
      margin-top: 0;
      text-align: center;
    }

    .field {
      display: grid;
      gap: .25rem;
      margin-bottom: 1rem;
    }
    .field label {
      font-weight: 600;
      font-size: .9rem;
    }
    input {
      padding: .6rem .7rem;
      border: 1px solid var(--border);
      border-radius: 8px;
      background: var(--card);
      color: var(--text);
    }

    .btn {
      display: block;
      width: 100%;
      padding: .7rem;
      border: none;
      border-radius: 8px;
      background: var(--primary);
      color: #fff;
      font-weight: 600;
      cursor: pointer;
    }
    .btn:hover { background: var(--primary-dark); }

    .toggle {
      font-size: .85rem;
      color: var(--primary);
      cursor: pointer;
      text-align: right;
    }

    .error {
      color: var(--danger);
      font-size: .85rem;
      margin-top: .25rem;
    }

    .dark-toggle {
      margin-top: 1rem;
      text-align: center;
      font-size: .85rem;
      cursor: pointer;
      color: var(--primary);
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h2>Login</h2>
    <form id="loginForm">
      <div class="field">
        <label for="email">Email</label>
        <input id="email" type="email" placeholder="you@example.com" required>
        <div id="emailError" class="error"></div>
      </div>
      <div class="field">
        <label for="password">Password</label>
        <input id="password" type="password" placeholder="••••••••" required>
        <div class="toggle" id="togglePassword">Show password</div>
        <div id="passwordError" class="error"></div>
      </div>
      <button type="submit" class="btn">Login</button>
    </form>
    <div class="dark-toggle" id="darkModeBtn">Toggle Dark Mode</div>
  </div>

  <script>
    const form = document.getElementById('loginForm');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const togglePassword = document.getElementById('togglePassword');
    const darkModeBtn = document.getElementById('darkModeBtn');

    // Show/Hide password
    togglePassword.addEventListener('click', () => {
      if (password.type === 'password') {
        password.type = 'text';
        togglePassword.textContent = 'Hide password';
      } else {
        password.type = 'password';
        togglePassword.textContent = 'Show password';
      }
    });

    // Dark mode toggle
    darkModeBtn.addEventListener('click', () => {
      const theme = document.documentElement.getAttribute('data-theme');
      document.documentElement.setAttribute('data-theme', theme === 'light' ? 'dark' : 'light');
    });

    // Form validation
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      let valid = true;
      emailError.textContent = '';
      passwordError.textContent = '';

      if (!email.value.includes('@')) {
        emailError.textContent = 'Enter a valid email.';
        valid = false;
      }
      if (password.value.length < 6) {
        passwordError.textContent = 'Password must be at least 6 characters.';
        valid = false;
      }

      if (valid) {
        alert('Login successful (mock). Connect to backend for real auth.');
        form.reset();
      }
    });
  </script>

</body>
</html>
