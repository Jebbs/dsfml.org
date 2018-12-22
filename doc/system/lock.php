<!DOCTYPE HTML>
  <html>
    <head>
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="/manifest.json">
      <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
      <meta name="theme-color" content="#ffffff">
      <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
      <link rel="stylesheet" type="text/css" href="/styles.css">
      <title>DSFML - dsfml.system.lock</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.system.lock</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>Lock</u> is a RAII wrapper for DSFML's Mutex.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    By unlocking it in its destructor, it ensures that the mutex will always be
 released when the current scope (most likely a function) ends. This is even
 more important when an exception or an early return statement can interrupt
 the execution flow of the function.
<br><br>
 For maximum robustness, <u>Lock</u> should always be used to lock/unlock a
 mutex.
<br><br>
 Note that this structure is provided for convenience when porting projects
 from SFML to DSFML. The same effect can be achieved with scope guards and
 Mutex.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">auto mutex = Mutex();

void function()
{
    auto <span class="psymbol">lock</span> = Lock(mutex); // mutex is now locked

   // mutex is unlocked if this function throws
    functionThatMayThrowAnException();

    if (someCondition)
        return; // mutex is unlocked

} // mutex is unlocked
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">Because the mutex is not explicitly unlocked in the code, it may
 remain locked longer than needed. If the region of the code that needs to be
 protected by the mutex is not the entire function, a good practice is to
 create a smaller, inner scope so that the lock is limited to this part of the
 code.</p>


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">auto mutex = Mutex();

void function()
{
    {
      auto <span class="psymbol">lock</span> = Lock(mutex);
      codeThatRequiresProtection();

    } // mutex is unlocked here

    codeThatDoesntCareAboutTheMutex();
}
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">Having a mutex locked longer than required is a bad practice which can
 lead to bad performances. Don't forget that when a mutex is locked, other
 threads may be waiting doing nothing until it is released.</p>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../system/mutex.php" title="Blocks concurrent access to shared resources from multiple threads.">Mutex</a>
  </p>
</div>

</section>
<section class="section ddoc_module_members_section">
  <div class="ddoc_module_members">
    <ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Lock" id="Lock">struct Lock;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Automatic wrapper for locking and unlocking mutexes.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Lock.this" id="Lock.this">this(Mutex mutex);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the lock with a target mutex.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The mutex passed to Lock is automatically locked.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Mutex mutex</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Mutex to lock
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>

</section>

</div>

</li>
</ul>

</div>

</li>
</ul>
  </div>
</section>
</section>
          </article>
        </div>
      </div>
      <?php include '../../footer.php'?>
        <script>
        var elements = document.getElementsByClassName("ddoc_decl");
        for (var i = 0; i < elements.length; ++i) {
        elements[i].innerHTML = elements[i].innerHTML.replace(/;/g,'');
        }
        var elements = document.getElementsByClassName("deprecated_decl");
        for (var i = 0; i < elements.length; ++i) {
        elements[i].innerHTML = elements[i].innerHTML.replace(/deprecated/g,'<span class="dep_kwd">deprecated</span>');
        }
        </script>
    </body>
  </html>