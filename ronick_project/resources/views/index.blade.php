<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SmartLearn – Online Education Platform</title>
  <meta name="description" content="SmartLearn: Learn anytime with modern courses, quizzes, and instructor support." />
  <style>
    /* ========= CSS: Minimal, responsive, accessible ========= */

    :root {
      --bg: #ffffff;
      --text: #1a1a1a;
      --muted: #666;
      --primary: #2f6fed;
      --primary-600: #2455b6;
      --primary-50: #eef3ff;
      --surface: #f6f8fb;
      --border: #e5e7eb;
      --success: #16a34a;
      --warning: #f59e0b;
      --danger: #dc2626;
      --card: #ffffff;
    }
    [data-theme="dark"] {
      --bg: #0f1115;
      --text: #e5e7eb;
      --muted: #a1a1aa;
      --primary: #5fa2ff;
      --primary-600: #3d7fe0;
      --primary-50: #14233e;
      --surface: #151922;
      --border: #2a2f3a;
      --card: #181c25;
    }

    * { box-sizing: border-box }
    html, body { height: 100% }
    body {
      margin: 0;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
      background: var(--bg);
      color: var(--text);
      line-height: 1.6;
    }

    a { color: var(--primary); text-decoration: none }
    a:focus, button:focus, input:focus, select:focus, textarea:focus {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }

    /* Layout */
    .container { max-width: 1100px; margin: 0 auto; padding: 1rem }
    .grid { display: grid; gap: 1rem }
    .grid-3 { grid-template-columns: repeat(3, 1fr) }
    .grid-2 { grid-template-columns: repeat(2, 1fr) }
    @media (max-width: 900px) { .grid-3 { grid-template-columns: 1fr 1fr } }
    @media (max-width: 640px) { .grid-3, .grid-2 { grid-template-columns: 1fr } }

    /* Nav */
    .nav {
      position: sticky; top: 0; z-index: 50;
      backdrop-filter: saturate(180%) blur(8px);
      background: color-mix(in oklab, var(--bg), transparent 10%);
      border-bottom: 1px solid var(--border);
    }
    .nav-inner {
      display: flex; align-items: center; justify-content: space-between;
      max-width: 1100px; margin: 0 auto; padding: .75rem 1rem;
    }
    .brand { display: flex; align-items: center; gap: .6rem; font-weight: 700 }
    .brand .logo {
      width: 28px; height: 28px; border-radius: 6px; background: var(--primary);
      display: grid; place-items: center; color: #fff; font-weight: 800;
    }
    .nav-links { display: flex; gap: .75rem; flex-wrap: wrap }
    .nav-links a {
      padding: .5rem .75rem; border-radius: 8px;
    }
    .nav-actions { display: flex; gap: .5rem; align-items: center }

    /* Buttons */
    .btn { padding: .55rem .9rem; border-radius: 10px; border: 1px solid var(--border); background: var(--card); color: var(--text); cursor: pointer; }
    .btn:hover { background: var(--surface) }
    .btn-primary { background: var(--primary); color: #fff; border-color: var(--primary); }
    .btn-primary:hover { background: var(--primary-600) }
    .btn-ghost { background: transparent; border-color: transparent }
    .btn-danger { background: var(--danger); color: #fff; border-color: var(--danger) }
    .chip { display: inline-flex; gap: .4rem; align-items: center; padding: .2rem .5rem; border: 1px solid var(--border); border-radius: 999px; background: var(--surface); color: var(--muted); font-size: .85rem }

    /* Cards */
    .card { background: var(--card); border: 1px solid var(--border); border-radius: 16px; overflow: hidden; }
    .card .body { padding: 1rem }
    .course-thumb { aspect-ratio: 16/9; background: var(--surface); display: grid; place-items: center; color: var(--muted) }

    /* Forms */
    .field { display: grid; gap: .25rem; margin-bottom: .75rem }
    .field label { font-weight: 600; font-size: .9rem }
    input, select, textarea {
      padding: .6rem .7rem; border: 1px solid var(--border); border-radius: 10px; background: var(--card); color: var(--text);
    }
    .inline { display: flex; gap: .5rem; flex-wrap: wrap }

    /* Hero */
    .hero {
      padding: 2.5rem 1rem; background: var(--primary-50);
      border-bottom: 1px solid var(--border);
    }
    .hero-inner { max-width: 1100px; margin: 0 auto; display: grid; gap: 1rem; grid-template-columns: 1.2fr .8fr }
    .hero h1 { margin: 0; font-size: clamp(1.6rem, 3.5vw, 2.4rem) }
    @media (max-width: 900px) { .hero-inner { grid-template-columns: 1fr } }

    /* Tabs */
    .tabs { display: flex; gap: .5rem; flex-wrap: wrap; border-bottom: 1px solid var(--border); }
    .tab { padding: .55rem .8rem; border-radius: 10px 10px 0 0; border: 1px solid var(--border); border-bottom-color: transparent; background: var(--card) }
    .tab.active { background: var(--surface); font-weight: 700 }

    /* Toast */
    .toast {
      position: fixed; right: 1rem; bottom: 1rem; z-index: 60;
      background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: .75rem 1rem; box-shadow: 0 10px 24px rgba(0,0,0,.15);
      display: none;
    }

    /* Modal */
    .modal {
      position: fixed; inset: 0; display: none; place-items: center; z-index: 70;
      background: rgba(0,0,0,.35);
    }
    .modal .dialog { width: min(680px, 92vw); background: var(--card); border: 1px solid var(--border); border-radius: 16px; overflow: hidden }
    .modal .header { padding: .75rem 1rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center }
    .modal .content { padding: 1rem }
    .modal .footer { padding: .75rem 1rem; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; gap: .5rem }

    /* Footer */
    footer { margin-top: 2rem; border-top: 1px solid var(--border) }
    .footer-inner { max-width: 1100px; margin: 0 auto; padding: 1rem; color: var(--muted); display: flex; justify-content: space-between; flex-wrap: wrap; gap: .75rem }

    /* Utils */
    .muted { color: var(--muted) }
    .hidden { display: none !important }
    .section { padding: 1rem }
    .section-title { font-size: 1.25rem; margin: .25rem 0 1rem; }
  </style>
</head>
<body>

  <!-- ========= NAV ========= -->
  <nav class="nav" aria-label="Primary">
    <div class="nav-inner">
      <a class="brand" href="#/">
        <span class="logo">S</span> <span>SmartLearn</span>
      </a>
      <div class="nav-links">
        <a href="#/" aria-label="Go to Home">Home</a>
        <a href="#/courses" aria-label="Browse Courses">Courses</a>
        <a href="#/dashboard" aria-label="Open Dashboard">Dashboard</a>
        <a href="#/contact" aria-label="Contact us">Contact</a>
        <a href="#/about" aria-label="About SmartLearn">About</a>
      </div>
      <div class="nav-actions">
        <button id="darkModeBtn" class="btn" aria-pressed="false" title="Toggle dark mode">Dark</button>
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
      </div>
    </div>
  </nav>

  <!-- ========= HERO (Home) ========= -->
  <section id="home" class="hero">
    <div class="hero-inner">
      <div>
        <h1>Learn anything. Grow faster.</h1>
        <p class="muted">Discover curated courses, practice with quizzes, and get support from expert instructors. Enroll today and track your progress.</p>
        <div class="inline">
          <a href="#/courses" class="btn btn-primary">Browse courses</a>
          <a href="#/about" class="btn">How it works</a>
        </div>
        <div style="margin-top:1rem" class="inline">
          <span class="chip">Secure Auth</span>
          <span class="chip">Assignments & Quizzes</span>
          <span class="chip">Progress Tracking</span>
        </div>
      </div>
      <div class="card">
        <div class="course-thumb">Your learning journey starts here</div>
        <div class="body">
          <strong>Featured Course</strong>
          <p class="muted">Modern Web Development — build responsive apps with real projects.</p>
          <div class="inline">
            <button class="btn btn-primary" data-action="open-featured">View details</button>
            <button class="btn" data-action="enroll-featured">Quick enroll</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========= MAIN CONTENT ========= -->
  <main id="app" class="container" aria-live="polite">
    <!-- Courses Catalog -->
    <section id="courses" class="section hidden">
      <h2 class="section-title">Courses catalog</h2>

      <div class="card">
        <div class="body">
          <div class="grid grid-3">
            <div class="field">
              <label for="q">Search</label>
              <input id="q" type="search" placeholder="Search courses by title or instructor" />
            </div>
            <div class="field">
              <label for="cat">Category</label>
              <select id="cat">
                <option value="">All</option>
                <option>Development</option>
                <option>Design</option>
                <option>Data</option>
                <option>Business</option>
              </select>
            </div>
            <div class="field">
              <label for="lvl">Level</label>
              <select id="lvl">
                <option value="">All</option>
                <option>Beginner</option>
                <option>Intermediate</option>
                <option>Advanced</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div id="courseList" class="grid grid-3" style="margin-top:1rem"></div>
    </section>

    <!-- Course Details -->
    <section id="courseDetails" class="section hidden" aria-labelledby="courseTitle">
      <h2 id="courseTitle" class="section-title">Course details</h2>
      <div id="courseDetailCard" class="card hidden"></div>
    </section>

    <!-- Dashboard -->
    <section id="dashboard" class="section hidden">
      <h2 class="section-title">Dashboard</h2>

      <div class="tabs" role="tablist">
        <button class="tab active" data-tab="student" role="tab" aria-selected="true">Student</button>
        <button class="tab" data-tab="instructor" role="tab">Instructor</button>
        <button class="tab" data-tab="admin" role="tab">Admin</button>
      </div>

      <!-- Student Dashboard -->
      <div id="tab-student" class="card" style="margin-top:1rem">
        <div class="body">
          <strong>My learning</strong>
          <p class="muted">Resume lessons, track progress, submit assignments, and attempt quizzes.</p>
          <div id="myCourses" class="grid grid-2"></div>
        </div>
      </div>

      <!-- Instructor Dashboard -->
      <div id="tab-instructor" class="card hidden" style="margin-top:1rem">
        <div class="body">
          <strong>Course management</strong>
          <p class="muted">Create courses, upload lessons, manage assignments, and monitor student progress.</p>

          <details style="margin:.5rem 0">
            <summary><strong>Create a new course</strong></summary>
            <div class="grid grid-2" style="margin-top:.75rem">
              <div class="field"><label>Title</label><input id="newCourseTitle" placeholder="e.g., Intro to Python" /></div>
              <div class="field"><label>Category</label><input id="newCourseCat" placeholder="e.g., Development" /></div>
              <div class="field"><label>Level</label><select id="newCourseLvl"><option>Beginner</option><option>Intermediate</option><option>Advanced</option></select></div>
              <div class="field"><label>Price</label><input id="newCoursePrice" type="number" min="0" step="1" placeholder="0 for free" /></div>
              <div style="grid-column:1/-1" class="inline">
                <button class="btn btn-primary" id="createCourseBtn">Create</button>
                <span class="muted">Mock: saves locally</span>
              </div>
            </div>
          </details>

          <div id="instructorCourses" class="grid grid-2" style="margin-top:1rem"></div>
        </div>
      </div>

      <!-- Admin Dashboard -->
      <div id="tab-admin" class="card hidden" style="margin-top:1rem">
        <div class="body">
          <strong>Admin panel</strong>
          <p class="muted">Monitor users and courses, approve content, and view analytics.</p>
          <div class="grid grid-2">
            <div class="card">
              <div class="body">
                <strong>Users</strong>
                <ul id="adminUsers"></ul>
              </div>
            </div>
            <div class="card">
              <div class="body">
                <strong>Courses</strong>
                <ul id="adminCourses"></ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="section hidden">
      <h2 class="section-title">Contact us</h2>
      <div class="card">
        <div class="body">
          <div class="grid grid-2">
            <div class="field"><label>Your name</label><input id="contactName" /></div>
            <div class="field"><label>Your email</label><input id="contactEmail" type="email" /></div>
          </div>
          <div class="field"><label>Message</label><textarea id="contactMsg" rows="4" placeholder="Tell us how we can help"></textarea></div>
          <div class="inline">
            <button class="btn btn-primary" id="contactSendBtn">Send</button>
            <span class="muted">We’ll get back within 24–48h.</span>
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about" class="section hidden">
      <h2 class="section-title">About SmartLearn</h2>
      <div class="card">
        <div class="body">
          <p>SmartLearn is an online education platform focused on practical, project‑based learning. Students get structured courses, interactive quizzes, and guided support from instructors.</p>
          <ul>
            <li><strong>Accessible:</strong> Mobile‑first, keyboard friendly, clear contrast.</li>
            <li><strong>Secure:</strong> Safe auth patterns, CSRF protection (when integrated with backend).</li>
            <li><strong>Scalable:</strong> Designed for API‑driven architecture with caching and CDNs.</li>
          </ul>
        </div>
      </div>
    </section>
  </main>

  <!-- ========= LOGIN / REGISTER MODAL ========= -->
  <div id="authModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="authTitle">
    <div class="dialog">
      <div class="header">
        <strong id="authTitle">Login or register</strong>
        <button class="btn btn-ghost" id="closeAuth">Close</button>
      </div>
      <div class="content">
        <div class="tabs" role="tablist">
          <button class="tab active" data-auth="login" role="tab" aria-selected="true">Login</button>
          <button class="tab" data-auth="register" role="tab">Register</button>
        </div>
        <div id="authLogin" style="margin-top:1rem">
          <div class="field"><label>Email</label><input id="loginEmail" type="email" placeholder="you@example.com" /></div>
          <div class="field"><label>Password</label><input id="loginPassword" type="password" placeholder="••••••••" /></div>
          <div class="inline">
            <button class="btn btn-primary" id="doLogin">Login</button>
            <button class="btn" id="asStudent">Use demo student</button>
            <button class="btn" id="asInstructor">Use demo instructor</button>
            <button class="btn" id="asAdmin">Use demo admin</button>
          </div>
        </div>
        <div id="authRegister" class="hidden" style="margin-top:1rem">
          <div class="grid grid-2">
            <div class="field"><label>Name</label><input id="regName" /></div>
            <div class="field"><label>Email</label><input id="regEmail" type="email" /></div>
            <div class="field"><label>Password</label><input id="regPassword" type="password" /></div>
            <div class="field">
              <label>Role</label>
              <select id="regRole">
                <option>Student</option>
                <option>Instructor</option>
              </select>
            </div>
          </div>
          <button class="btn btn-primary" id="doRegister">Create account</button>
        </div>
      </div>
      <div class="footer">
        <span class="muted">This is a front‑end mock. Hook up to Laravel for real auth.</span>
      </div>
    </div>
  </div>

  <!-- ========= COURSE ACTION MODAL (Assignments / Quiz) ========= -->
  <div id="courseActionModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="actionTitle">
    <div class="dialog">
      <div class="header">
        <strong id="actionTitle">Course action</strong>
        <button class="btn btn-ghost" id="closeAction">Close</button>
      </div>
      <div class="content" id="actionContent"></div>
      <div class="footer">
        <button class="btn btn-primary" id="actionPrimary">Submit</button>
      </div>
    </div>
  </div>

  <!-- ========= TOAST ========= -->
  <div id="toast" class="toast" role="status"></div>

  <!-- ========= JS: Router + State + UI ========= -->
  <script>
    // ====== Mock data ======
    const store = {
      theme: 'light',
      user: null, // {id, name, role}
      users: [
        { id: 1, name: 'Demo Student', email: 'student@demo', role: 'Student' },
        { id: 2, name: 'Demo Instructor', email: 'instructor@demo', role: 'Instructor' },
        { id: 3, name: 'Demo Admin', email: 'admin@demo', role: 'Admin' },
      ],
      courses: [
        { id: 101, title: 'Modern Web Development', category: 'Development', level: 'Intermediate', price: 0, instructor: 'Alex Gray',
          summary: 'Build responsive apps with HTML, CSS, and JS components.',
          lessons: [
            { id: 'l1', title: 'Responsive Layouts', video: 'https://example.com/video1', pdf: 'https://example.com/guide1.pdf' },
            { id: 'l2', title: 'State & Routing', video: 'https://example.com/video2', pdf: 'https://example.com/guide2.pdf' },
          ],
          assignments: [{ id: 'a1', title: 'Landing Page', due: '2026-01-15' }],
          quizzes: [{ id: 'q1', title: 'HTML/CSS Basics', total: 10,
            questions: [
              { id: 'q1-1', text: 'What does CSS stand for?', options: ['Cascading Style Sheets','Creative Style System','Code Styling Syntax'], answer: 0 },
              { id: 'q1-2', text: 'Which tag creates a hyperlink?', options: ['<link>','<a>','<href>'], answer: 1 },
            ]}],
        },
        { id: 102, title: 'Intro to Data Analysis', category: 'Data', level: 'Beginner', price: 19, instructor: 'Priya Singh',
          summary: 'Explore datasets and visualize insights with practical tools.',
          lessons: [{ id: 'l1', title: 'Data Cleaning Basics', video: '#', pdf: '#' }],
          assignments: [{ id: 'a1', title: 'Clean a CSV', due: '2026-02-01' }],
          quizzes: [],
        },
        { id: 103, title: 'Product Design Foundations', category: 'Design', level: 'Beginner', price: 29, instructor: 'Marco Lee',
          summary: 'Principles of UX and interface design.',
          lessons: [{ id: 'l1', title: 'UX Principles', video: '#', pdf: '#' }],
          assignments: [],
          quizzes: [],
        },
      ],
      enrollments: [], // { userId, courseId, progress: {lessonId: status}, grades: {} }
    };

    // ====== Helpers ======
    const $ = (sel) => document.querySelector(sel);
    const $$ = (sel) => Array.from(document.querySelectorAll(sel));
    const show = (el) => el.classList.remove('hidden');
    const hide = (el) => el.classList.add('hidden');
    const toast = (msg, type = 'info') => {
      const t = $('#toast');
      t.textContent = msg;
      t.style.borderColor = type === 'error' ? 'var(--danger)' : type === 'success' ? 'var(--success)' : 'var(--border)';
      t.style.display = 'block';
      setTimeout(() => t.style.display = 'none', 2200);
    };
    const setTheme = (theme) => {
      document.documentElement.setAttribute('data-theme', theme);
      store.theme = theme;
      $('#darkModeBtn').textContent = theme === 'dark' ? 'Light' : 'Dark';
      $('#darkModeBtn').setAttribute('aria-pressed', theme === 'dark');
    };
    const formatPrice = (p) => p === 0 ? 'Free' : `$${p}`;

    // ====== Router ======
    const routes = {
      '/': renderHome,
      '/courses': renderCourses,
      '/course': renderCourseDetails,
      '/dashboard': renderDashboard,
      '/contact': renderContact,
      '/about': renderAbout
    };

    function navigate() {
      const hash = location.hash || '#/';
      const [_, path, id] = hash.split('/');
      // Hide all sections
      ['home','courses','courseDetails','dashboard','contact','about'].forEach(id => hide($('#' + id)));
      // Route
      const key = id ? `/${path}`.replace('course', 'course') : `/${path}`;
      if (path === '') { renderHome(); return; }
      if (path === 'course' && id) { renderCourseDetails(Number(id)); return; }
      (routes[`/${path}`] || renderHome)();
    }

    // ====== Renderers ======
    function renderHome() { show($('#home')); }
    function renderCourses() {
      show($('#courses'));
      const q = $('#q').value.trim().toLowerCase();
      const cat = $('#cat').value;
      const lvl = $('#lvl').value;
      const filtered = store.courses.filter(c =>
        (!q || c.title.toLowerCase().includes(q) || c.instructor.toLowerCase().includes(q)) &&
        (!cat || c.category === cat) &&
        (!lvl || c.level === lvl)
      );
      const list = $('#courseList');
      list.innerHTML = filtered.map(c => `
        <article class="card" aria-label="${c.title}">
          <div class="course-thumb">Course #${c.id}</div>
          <div class="body">
            <strong>${c.title}</strong>
            <p class="muted">${c.summary}</p>
            <div class="inline">
              <span class="chip">${c.category}</span>
              <span class="chip">${c.level}</span>
              <span class="chip">${formatPrice(c.price)}</span>
            </div>
            <div class="inline" style="margin-top:.5rem">
              <a class="btn btn-primary" href="#/course/${c.id}">View details</a>
              <button class="btn" data-enroll="${c.id}">Enroll</button>
            </div>
          </div>
        </article>
      `).join('');
      // bind enroll
      list.querySelectorAll('[data-enroll]').forEach(btn => {
        btn.addEventListener('click', () => enrollCourse(Number(btn.dataset.enroll)));
      });
    }
    function renderCourseDetails(courseId) {
      show($('#courseDetails'));
      const c = store.courses.find(x => x.id === courseId);
      const card = $('#courseDetailCard');
      if (!c) { card.innerHTML = '<div class="body"><p>Course not found.</p></div>'; show(card); return; }
      card.innerHTML = `
        <div class="body">
          <div class="inline">
            <span class="chip">${c.category}</span>
            <span class="chip">${c.level}</span>
            <span class="chip">By ${c.instructor}</span>
          </div>
          <h3 style="margin:.5rem 0">${c.title}</h3>
          <p class="muted">${c.summary}</p>
          <div class="inline">
            <button class="btn btn-primary" data-enroll="${c.id}">Enroll</button>
            <button class="btn" data-watch="${c.id}">Watch lessons</button>
            <button class="btn" data-assign="${c.id}">Submit assignment</button>
            <button class="btn" data-quiz="${c.id}">Take quiz</button>
          </div>
          <hr style="border:none; border-top:1px solid var(--border); margin:1rem 0" />
          <strong>Lessons</strong>
          <ul>
            ${c.lessons.map(l => `<li>${l.title} — <span class="muted">Video, PDF</span></li>`).join('')}
          </ul>
        </div>
      `;
      show(card);
      card.querySelector('[data-enroll]')?.addEventListener('click', () => enrollCourse(c.id));
      card.querySelector('[data-watch]')?.addEventListener('click', () => openLessons(c.id));
      card.querySelector('[data-assign]')?.addEventListener('click', () => openAssignment(c.id));
      card.querySelector('[data-quiz]')?.addEventListener('click', () => openQuiz(c.id));
    }
    function renderDashboard() {
      show($('#dashboard'));
      // Tabs
      $$('.tabs .tab').forEach(t => t.addEventListener('click', (e) => {
        $$('.tabs .tab').forEach(x => x.classList.remove('active'));
        e.currentTarget.classList.add('active');
        const id = e.currentTarget.dataset.tab;
        ['student','instructor','admin'].forEach(k => (k===id ? show($('#tab-'+k)) : hide($('#tab-'+k))));
      }));
      // Student view
      const my = $('#myCourses');
      const enrolled = store.enrollments.filter(e => store.user && e.userId === store.user.id);
      my.innerHTML = enrolled.length
        ? enrolled.map(e => {
            const c = store.courses.find(x => x.id === e.courseId);
            const progressCount = Object.values(e.progress || {}).filter(v => v === 'completed').length;
            const total = (c.lessons || []).length;
            return `
              <article class="card">
                <div class="body">
                  <strong>${c.title}</strong>
                  <p class="muted">Progress: ${progressCount}/${total} lessons completed</p>
                  <div class="inline">
                    <a class="btn btn-primary" href="#/course/${c.id}">Go to course</a>
                    <button class="btn" data-watch="${c.id}">Watch</button>
                    <button class="btn" data-assign="${c.id}">Assignment</button>
                    <button class="btn" data-quiz="${c.id}">Quiz</button>
                  </div>
                </div>
              </article>
            `;
        }).join('')
        : '<p class="muted">No enrollments yet. Browse courses to get started.</p>';
      my.querySelectorAll('[data-watch]').forEach(b => b.addEventListener('click', () => openLessons(Number(b.dataset.watch))));
      my.querySelectorAll('[data-assign]').forEach(b => b.addEventListener('click', () => openAssignment(Number(b.dataset.assign))));
      my.querySelectorAll('[data-quiz]').forEach(b => b.addEventListener('click', () => openQuiz(Number(b.dataset.quiz))));
      // Instructor
      const instWrap = $('#instructorCourses');
      const authored = store.courses.filter(c => store.user?.role === 'Instructor' && c.instructor === store.user.name);
      instWrap.innerHTML = authored.length
        ? authored.map(c => `
            <article class="card"><div class="body">
              <strong>${c.title}</strong>
              <p class="muted">${c.category} • ${c.level} • ${formatPrice(c.price)}</p>
              <div class="inline">
                <button class="btn" data-add-lesson="${c.id}">Add lesson</button>
                <button class="btn" data-add-assignment="${c.id}">Add assignment</button>
                <button class="btn" data-add-quiz="${c.id}">Add quiz</button>
              </div>
            </div></article>
          `).join('')
        : '<p class="muted">No authored courses. Create one below.</p>';
      instWrap.querySelectorAll('[data-add-lesson]').forEach(b => b.addEventListener('click', () => openAddLesson(Number(b.dataset.addLesson))));
      instWrap.querySelectorAll('[data-add-assignment]').forEach(b => b.addEventListener('click', () => openAddAssignment(Number(b.dataset.addAssignment))));
      instWrap.querySelectorAll('[data-add-quiz]').forEach(b => b.addEventListener('click', () => openAddQuiz(Number(b.dataset.addQuiz))));
      // Admin
      const adminUsers = $('#adminUsers'); adminUsers.innerHTML = store.users.map(u => `<li>${u.name} — <span class="muted">${u.role}</span></li>`).join('');
      const adminCourses = $('#adminCourses'); adminCourses.innerHTML = store.courses.map(c => `<li>${c.title} — <span class="muted">${c.category}, ${c.level}</span></li>`).join('');
      // Auth gating
      if (!store.user) toast('Login for full dashboard access.');
    }
    function renderContact() { show($('#contact')); }
    function renderAbout() { show($('#about')); }

    // ====== Actions ======
    function enrollCourse(courseId) {
      if (!store.user) { openAuth(); return; }
      const exists = store.enrollments.find(e => e.userId === store.user.id && e.courseId === courseId);
      if (exists) { toast('Already enrolled', 'warning'); return; }
      store.enrollments.push({ userId: store.user.id, courseId, progress: {}, grades: {} });
      toast('Enrolled successfully', 'success');
      renderDashboard();
    }
    function openLessons(courseId) {
      const c = store.courses.find(x => x.id === courseId);
      if (!c) return;
      $('#actionTitle').textContent = 'Watch lessons';
      $('#actionContent').innerHTML = `
        <p class="muted">Click a lesson to mark completed (mock).</p>
        <ul>
          ${c.lessons.map(l => `<li>
              <button class="btn" data-lesson="${l.id}">${l.title}</button>
            </li>`).join('')}
        </ul>
      `;
      $('#actionPrimary').textContent = 'Close';
      $('#actionPrimary').onclick = closeAction;
      show($('#courseActionModal'));
      // mark progress
      $$('#actionContent [data-lesson]').forEach(b => b.addEventListener('click', () => {
        const lessonId = b.dataset.lesson;
        const enr = store.enrollments.find(e => e.userId === store.user?.id && e.courseId === courseId);
        if (!enr) { toast('Enroll first', 'warning'); return; }
        enr.progress[lessonId] = 'completed';
        toast('Lesson marked completed', 'success');
        renderDashboard();
      }));
    }
    function openAssignment(courseId) {
      const c = store.courses.find(x => x.id === courseId);
      if (!c || !c.assignments.length) { toast('No assignments available', 'warning'); return; }
      const a = c.assignments[0];
      $('#actionTitle').textContent = 'Submit assignment';
      $('#actionContent').innerHTML = `
        <p><strong>${a.title}</strong> — <span class="muted">Due ${a.due}</span></p>
        <div class="field"><label>Submission URL</label><input id="submissionUrl" placeholder="Link to your work" /></div>
      `;
      $('#actionPrimary').textContent = 'Submit';
      $('#actionPrimary').onclick = () => {
        const url = $('#submissionUrl').value.trim();
        if (!url) { toast('Add a submission URL', 'error'); return; }
        const enr = store.enrollments.find(e => e.userId === store.user?.id && e.courseId === courseId);
        if (!enr) { toast('Enroll first', 'warning'); return; }
        enr.grades[a.id] = { url, grade: 'pending' };
        toast('Assignment submitted', 'success');
        closeAction();
      };
      show($('#courseActionModal'));
    }
    function openQuiz(courseId) {
      const c = store.courses.find(x => x.id === courseId);
      const quiz = c?.quizzes[0];
      if (!quiz) { toast('No quiz available', 'warning'); return; }
      $('#actionTitle').textContent = quiz.title;
      $('#actionContent').innerHTML = quiz.questions.map((q,i) => `
        <div class="card" style="margin-bottom:.5rem"><div class="body">
          <p><strong>Q${i+1}.</strong> ${q.text}</p>
          ${q.options.map((opt, idx) => `
            <div class="inline">
              <label><input type="radio" name="${q.id}" value="${idx}" /> ${opt}</label>
            </div>
          `).join('')}
        </div></div>
      `).join('') + '<p class="muted">Submit to see your score (local only).</p>';
      $('#actionPrimary').textContent = 'Submit';
      $('#actionPrimary').onclick = () => {
        let score = 0;
        quiz.questions.forEach(q => {
          const checked = document.querySelector(`input[name="${q.id}"]:checked`);
          if (checked && Number(checked.value) === q.answer) score++;
        });
        toast(`Score: ${score}/${quiz.questions.length}`, 'success');
        closeAction();
      };
      show($('#courseActionModal'));
    }

    // Instructor actions (mock creation)
    function openAddLesson(courseId) {
      $('#actionTitle').textContent = 'Add lesson';
      $('#actionContent').innerHTML = `
        <div class="field"><label>Title</label><input id="newLessonTitle" /></div>
        <div class="field"><label>Video URL</label><input id="newLessonVideo" /></div>
        <div class="field"><label>PDF URL</label><input id="newLessonPdf" /></div>
      `;
      $('#actionPrimary').textContent = 'Add';
      $('#actionPrimary').onclick = () => {
        const c = store.courses.find(x => x.id === courseId);
        c.lessons.push({ id: 'l' + (c.lessons.length + 1), title: $('#newLessonTitle').value || 'Untitled', video: '#', pdf: '#' });
        toast('Lesson added', 'success');
        closeAction();
        renderDashboard();
      };
      show($('#courseActionModal'));
    }
    function openAddAssignment(courseId) {
      $('#actionTitle').textContent = 'Add assignment';
      $('#actionContent').innerHTML = `
        <div class="field"><label>Title</label><input id="newAssignmentTitle" /></div>
        <div class="field"><label>Due date</label><input id="newAssignmentDue" type="date" /></div>
      `;
      $('#actionPrimary').textContent = 'Add';
      $('#actionPrimary').onclick = () => {
        const c = store.courses.find(x => x.id === courseId);
        c.assignments.push({ id: 'a' + (c.assignments.length + 1), title: $('#newAssignmentTitle').value || 'Assignment', due: $('#newAssignmentDue').value || 'TBD' });
        toast('Assignment added', 'success');
        closeAction();
        renderDashboard();
      };
      show($('#courseActionModal'));
    }
    function openAddQuiz(courseId) {
      $('#actionTitle').textContent = 'Add quiz';
      $('#actionContent').innerHTML = `
        <div class="field"><label>Title</label><input id="newQuizTitle" /></div>
        <p class="muted">Adds a sample question (mock).</p>
      `;
      $('#actionPrimary').textContent = 'Add';
      $('#actionPrimary').onclick = () => {
        const c = store.courses.find(x => x.id === courseId);
        c.quizzes.push({ id: 'q' + (c.quizzes.length + 1), title: $('#newQuizTitle').value || 'New Quiz', total: 10,
          questions: [{ id: 'q-new-1', text: 'Sample question?', options: ['A','B','C'], answer: 0 }] });
        toast('Quiz added', 'success');
        closeAction();
        renderDashboard();
      };
      show($('#courseActionModal'));
    }

    // ====== Auth (mock) ======
    function openAuth() { show($('#authModal')); }
    function closeAuth() { hide($('#authModal')); }
    function closeAction() { hide($('#courseActionModal')); }

    // ====== Events ======
    window.addEventListener('hashchange', navigate);
    window.addEventListener('DOMContentLoaded', () => {
      // Dark mode
      $('#darkModeBtn').addEventListener('click', () => setTheme(store.theme === 'light' ? 'dark' : 'light'));
      setTheme(store.theme);
      // Login modal
      $('#loginBtn').addEventListener('click', openAuth);
      $('#closeAuth').addEventListener('click', closeAuth);
      // Auth tabs
      $$('.tabs [data-auth]').forEach(t => t.addEventListener('click', (e) => {
        $$('.tabs [data-auth]').forEach(x => x.classList.remove('active'));
        e.currentTarget.classList.add('active');
        const mode = e.currentTarget.dataset.auth;
        if (mode === 'login') { hide($('#authRegister')); show($('#authLogin')); }
        else { hide($('#authLogin')); show($('#authRegister')); }
      }));
      // Demo logins
      $('#asStudent').addEventListener('click', () => { store.user = store.users[0]; closeAuth(); toast('Logged in as student','success'); });
      $('#asInstructor').addEventListener('click', () => { store.user = store.users[1]; closeAuth(); toast('Logged in as instructor','success'); });
      $('#asAdmin').addEventListener('click', () => { store.user = store.users[2]; closeAuth(); toast('Logged in as admin','success'); });
      // Real login/register (mock validation)
      $('#doLogin').addEventListener('click', () => {
        const email = $('#loginEmail').value.trim();
        const user = store.users.find(u => u.email === email);
        if (!user) return toast('User not found', 'error');
        store.user = user; closeAuth(); toast('Logged in', 'success');
      });
      $('#doRegister').addEventListener('click', () => {
        const name = $('#regName').value.trim();
        const email = $('#regEmail').value.trim();
        const role = $('#regRole').value;
        if (!name || !email) return toast('Fill all fields', 'error');
        const id = Math.max(...store.users.map(u => u.id)) + 1;
        store.users.push({ id, name, email, role });
        store.user = { id, name, email, role };
        closeAuth(); toast('Account created', 'success');
      });
      // Contact
      $('#contactSendBtn').addEventListener('click', () => {
        const name = $('#contactName').value.trim();
        const email = $('#contactEmail').value.trim();
        const msg = $('#contactMsg').value.trim();
        if (!name || !email || !msg) return toast('Please complete the form', 'error');
        toast('Message sent. Thank you!', 'success');
      });
      // Catalog filters
      ['q','cat','lvl'].forEach(id => $(`#${id}`).addEventListener('input', renderCourses));
      // Featured
      document.querySelector('[data-action="open-featured"]').addEventListener('click', () => location.hash = '#/course/101');
      document.querySelector('[data-action="enroll-featured"]').addEventListener('click', () => enrollCourse(101));

      navigate();
    });

    // ====== Instructor: create course ======
    $('#createCourseBtn').addEventListener('click', () => {
      if (!store.user || store.user.role !== 'Instructor') return toast('Instructor login required', 'warning');
      const title = $('#newCourseTitle').value.trim() || 'Untitled';
      const category = $('#newCourseCat').value.trim() || 'Development';
      const level = $('#newCourseLvl').value;
      const price = Number($('#newCoursePrice').value || 0);
      const id = Math.max(...store.courses.map(c => c.id)) + 1;
      store.courses.push({
        id, title, category, level, price, instructor: store.user.name,
        summary: 'Newly created course.',
        lessons: [], assignments: [], quizzes: []
      });
      toast('Course created', 'success');
      renderDashboard();
    });

    // ====== Modals close btn ======
    $('#closeAction').addEventListener('click', closeAction);
  </script>

  <!-- ========= FOOTER ========= -->
  <footer>
    <div class="footer-inner">
      <span>© SmartLearn 2025</span>
      <span class="muted">Made for learning — connect to a Laravel API for full functionality.</span>
    </div>
  </footer>

</body>
</html>
