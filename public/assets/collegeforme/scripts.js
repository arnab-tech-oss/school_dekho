var _paq = (window._paq = window._paq || []);
/* tracker methods like "setCustomDimension" should be called before "trackPageView" */
_paq.push(["trackPageView"]);
_paq.push(["enableLinkTracking"]);
(function () {
    var u = "https://matomo.collegeforme.org/";
    _paq.push(["setTrackerUrl", u + "matomo.php"]);
    _paq.push(["setSiteId", "2"]);
    var d = document,
        g = d.createElement("script"),
        s = d.getElementsByTagName("script")[0];
    g.async = true;
    g.src = u + "matomo.js";
    s.parentNode.insertBefore(g, s);
})();

var _mtm = (window._mtm = window._mtm || []);
_mtm.push({ "mtm.startTime": new Date().getTime(), event: "mtm.Start" });
(function () {
    var d = document,
        g = d.createElement("script"),
        s = d.getElementsByTagName("script")[0];
    g.async = true;
    g.src = "https://matomo.collegeforme.org/js/container_Opd7n9nB.js";
    s.parentNode.insertBefore(g, s);
})();
