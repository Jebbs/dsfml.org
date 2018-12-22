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
      <title>DSFML - dsfml.system.mutex</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.system.mutex</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>Mutex</u> stands for "MUTual EXclusion". A mutex is a synchronization
 object, used when multiple threads are involved.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    When you want to protect a part of the code from being accessed
 simultaneously by multiple threads, you typically use a mutex. When a thread
 is locked by a mutex, any other thread trying to lock it will be blocked
 until the mutex is released by the thread that locked it. This way, you can
 allow only one thread at a time to access a critical region of your code.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// this is a critical resource that needs some protection
Database database;
auto <span class="psymbol">mutex</span> = Mutex();

void thread1()
{
	   // this call will block the thread if the mutex is already locked by thread2
    <span class="psymbol">mutex</span>.lock();
    database.write(...);
   // if thread2 was waiting, it will now be unblocked
    <span class="psymbol">mutex</span>.unlock();
}

void thread2()
{
    // this call will block the thread if the mutex is already locked by thread1
    <span class="psymbol">mutex</span>.lock();
    database.write(...);
    <span class="psymbol">mutex</span>.unlock(); // if thread1 was waiting, it will now be unblocked
}
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">Be very careful with mutexes. A bad usage can lead to bad problems,
 like deadlocks (two threads are waiting for each other and the application is
 globally stuck).
<br><br>
 To make the usage of mutexes more robust, particularly in environments where
 exceptions can be thrown, you should use the helper class <a class="dsfml_link" href="../system/lock.php" title="Automatic wrapper for locking and unlocking mutexes.">Lock</a> to
 lock/unlock mutexes.
<br><br>
 DSFML mutexes are recursive, which means that you can lock a mutex multiple
 times in the same thread without creating a deadlock. In this case, the first
 call to <code class="prettyprint">lock()</code> behaves as usual, and the following ones have no effect.
 However, you must call <code class="prettyprint">unlock()</code> exactly as many times as you called
 <code class="prettyprint">lock()</code>. If you don't, the mutex won't be released.
<br><br>
 Note that the <u>Mutex</u> class is added for convenience, and is nothing more
 than a simnple wrapper around the existing core.sync.mutex.Mutex class.</p>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../system/lock.php" title="Automatic wrapper for locking and unlocking mutexes.">Lock</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Mutex" id="Mutex">class Mutex;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Blocks concurrent access to shared resources from multiple threads.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Mutex.this" id="Mutex.this">this();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Default Constructor
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Mutex.lock" id="Mutex.lock">void lock();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Lock the mutex

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If the mutex is already locked in another thread, this call will block
 the execution until the mutex is released.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Mutex.unlock" id="Mutex.unlock">void unlock();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Unlock the mutex
  </p>
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