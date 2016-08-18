/*
dhtmlxScheduler v.4.3.0 Professional

This software is covered by DHTMLX Commercial License. Usage without proper license is prohibited.

(c) Dinamenta, UAB.
*/
scheduler.config.limit_start = new Date(),
scheduler.config.limit_end = new Date(9999, 1,1),
scheduler.config.limit_view = !1,
scheduler.config.check_limits = !0,
scheduler.config.mark_now = !0,
scheduler.config.display_marked_timespans = !0,
scheduler._temp_limit_scope = function() {
  function e(e, t, s, r, a) {
    var i = scheduler,
    n = [],
    d = {
      _props: "map_to",
      matrix: "y_property"
    };
    for (var l in d) {
      var o = d[l];
      if (i[l]) for (var _ in i[l]) {
        var h = i[l][_],
        c = h[o];
        e[c] && (n = i._add_timespan_zones(n, scheduler._get_blocked_zones(t[_], e[c], s, r, a)))
      }
    }
    return n = i._add_timespan_zones(n, scheduler._get_blocked_zones(t, "global", s, r, a))
  }
  var t = null,
  s = "dhx_time_block",
  r = "default",
  a = function(e, t, s) {
    return t instanceof Date && s instanceof Date ? (e.start_date = t, e.end_date = s) : (e.days = t, e.zones = s),
    e
  },
  i = function(e, t, r) {
    var i = "object" == typeof e ? e: {
      days: e
    };
    return i.type = s,
    i.css = "",
    t && (r && (i.sections = r), i = a(i, e, t)),
    i
  };
  scheduler.blockTime = function(e, t, s) {
    var r = i(e, t, s);
    return scheduler.addMarkedTimespan(r)
  },
  scheduler.unblockTime = function(e, t, s) {
    t = t || "fullday";
    var r = i(e, t, s);
    return scheduler.deleteMarkedTimespan(r)
  },
  scheduler.attachEvent("onBeforeViewChange",
  function(e, t, s, r) {
    function a(e, t) {
      var s = scheduler.config.limit_start,
      r = scheduler.config.limit_end,
      a = scheduler.date.add(e, 1, t);
      return e.valueOf() > r.valueOf() || a <= s.valueOf()
    }
    return scheduler.config.limit_view && (r = r || t, s = s || e, a(r, s) && t.valueOf() != r.valueOf()) ? (setTimeout(function() {
      var e = a(t, s) ? scheduler.config.limit_start: t;
      scheduler.setCurrentView(a(e, s) ? null: e, s)
    },
    1), !1) : !0
  }),
  scheduler.checkInMarkedTimespan = function(t, s, a) {
    s = s || r;
    for (var i = !0,
    n = new Date(t.start_date.valueOf()), d = scheduler.date.add(n, 1, "day"), l = scheduler._marked_timespans; n < t.end_date; n = scheduler.date.date_part(d), d = scheduler.date.add(n, 1, "day")) {
      var o = +scheduler.date.date_part(new Date(n)),
      _ = n.getDay(),
      h = e(t, l, _, o, s);
      if (h) for (var c = 0; c < h.length; c += 2) {
        var u = scheduler._get_zone_minutes(n),
        v = t.end_date > d || t.end_date.getDate() != n.getDate() ? 1440 : scheduler._get_zone_minutes(t.end_date),
        f = h[c],
        g = h[c + 1];
        if (v > f && g > u && (i = "function" == typeof a ? a(t, u, v, f, g) : !1, !i)) break
      }
    }
    return ! i
  };
  var n = scheduler.checkLimitViolation = function(e) {
    if (!e) return ! 0;
    if (!scheduler.config.check_limits) return ! 0;
    var t = scheduler,
    r = t.config,
    a = [];
    if (e.rec_type) for (var i = scheduler.getRecDates(e), n = 0; n < i.length; n++) {
      var d = scheduler._copy_event(e);
      scheduler._lame_copy(d, i[n]),
      a.push(d)
    } else a = [e];
    for (var l = !0,
    o = 0; o < a.length; o++) {
      var _ = !0,
      d = a[o];
      d._timed = scheduler.isOneDayEvent(d),
      _ = r.limit_start && r.limit_end ? d.start_date.valueOf() >= r.limit_start.valueOf() && d.end_date.valueOf() <= r.limit_end.valueOf() : !0,
      _ && (_ = !scheduler.checkInMarkedTimespan(d, s,
      function(e, s, r, a, i) {
        var n = !0;
        return i >= s && s >= a && ((1440 == i || i > r) && (n = !1), e._timed && t._drag_id && "new-size" == t._drag_mode ? (e.start_date.setHours(0), e.start_date.setMinutes(i)) : n = !1),
        (r >= a && i > r || a > s && r > i) && (e._timed && t._drag_id && "new-size" == t._drag_mode ? (e.end_date.setHours(0), e.end_date.setMinutes(a)) : n = !1),
        n
      })),
      _ || (_ = t.checkEvent("onLimitViolation") ? t.callEvent("onLimitViolation", [d.id, d]) : _),
      l = l && _
    }
    return l || (t._drag_id = null, t._drag_mode = null),
    l
  };
  scheduler._get_blocked_zones = function(e, t, s, r, a) {
    var i = [];
    if (e && e[t]) for (var n = e[t], d = this._get_relevant_blocked_zones(s, r, n, a), l = 0; l < d.length; l++) i = this._add_timespan_zones(i, d[l].zones);
    return i
  },
  scheduler._get_relevant_blocked_zones = function(e, t, s, r) {
    var a = s[t] && s[t][r] ? s[t][r] : s[e] && s[e][r] ? s[e][r] : [];
    return a
  },
  scheduler.attachEvent("onMouseDown",
  function(e) {
    return ! (e == s)
  }),
  scheduler.attachEvent("onBeforeDrag",
  function(e) {
    return e ? n(scheduler.getEvent(e)) : !0
  }),
  scheduler.attachEvent("onClick",
  function(e) {
    return n(scheduler.getEvent(e))
  }),
  scheduler.attachEvent("onBeforeLightbox",
  function(e) {
    var s = scheduler.getEvent(e);
    return t = [s.start_date, s.end_date],
    n(s)
  }),
  scheduler.attachEvent("onEventSave",
  function(e, t) {
    if (!t.start_date || !t.end_date) {
      var s = scheduler.getEvent(e);
      t.start_date = new Date(s.start_date),
      t.end_date = new Date(s.end_date)
    }
    if (t.rec_type) {
      var r = scheduler._lame_clone(t);
      return scheduler._roll_back_dates(r),
      n(r)
    }
    return n(t)
  }),
  scheduler.attachEvent("onEventAdded",
  function(e) {
    if (!e) return ! 0;
    var t = scheduler.getEvent(e);
    return ! n(t) && scheduler.config.limit_start && scheduler.config.limit_end && (t.start_date < scheduler.config.limit_start && (t.start_date = new Date(scheduler.config.limit_start)), t.start_date.valueOf() >= scheduler.config.limit_end.valueOf() && (t.start_date = this.date.add(scheduler.config.limit_end, -1, "day")), t.end_date < scheduler.config.limit_start && (t.end_date = new Date(scheduler.config.limit_start)), t.end_date.valueOf() >= scheduler.config.limit_end.valueOf() && (t.end_date = this.date.add(scheduler.config.limit_end, -1, "day")), t.start_date.valueOf() >= t.end_date.valueOf() && (t.end_date = this.date.add(t.start_date, this.config.event_duration || this.config.time_step, "minute")), t._timed = this.isOneDayEvent(t)),
    !0
  }),
  scheduler.attachEvent("onEventChanged",
  function(e) {
    if (!e) return ! 0;
    var s = scheduler.getEvent(e);
    if (!n(s)) {
      if (!t) return ! 1;
      s.start_date = t[0],
      s.end_date = t[1],
      s._timed = this.isOneDayEvent(s)
    }
    return ! 0
  }),
  scheduler.attachEvent("onBeforeEventChanged",
  function(e) {
    return n(e)
  }),
  scheduler.attachEvent("onBeforeEventCreated",
  function(e) {
    var t = scheduler.getActionData(e).date,
    s = {
      _timed: !0,
      start_date: t,
      end_date: scheduler.date.add(t, scheduler.config.time_step, "minute")
    };
    return n(s)
  }),
  scheduler.attachEvent("onViewChange",
  function() {
    scheduler._mark_now()
  }),
  scheduler.attachEvent("onSchedulerResize",
  function() {
    return window.setTimeout(function() {
      scheduler._mark_now()
    },
    1),
    !0
  }),
  scheduler.attachEvent("onTemplatesReady",
  function() {
    scheduler._mark_now_timer = window.setInterval(function() {
      scheduler._is_initialized() && scheduler._mark_now()
    },
    6e4)
  }),
  scheduler._mark_now = function(e) {
    var t = "dhx_now_time";
    this._els[t] || (this._els[t] = []);
    var s = scheduler._currentDate(),
    r = this.config;
    if (scheduler._remove_mark_now(), !e && r.mark_now && s < this._max_date && s > this._min_date && s.getHours() >= r.first_hour && s.getHours() < r.last_hour) {
      var a = this.locate_holder_day(s);
      this._els[t] = scheduler._append_mark_now(a, s)
    }
  },
  scheduler._append_mark_now = function(e, t) {
    var s = "dhx_now_time",
    r = scheduler._get_zone_minutes(t),
    a = {
      zones: [r, r + 1],
      css: s,
      type: s
    };
    if (!this._table_view) {
      if (this._props && this._props[this._mode]) {
        for (var i = this._props[this._mode], n = i.options.length, d = e * n, l = (e + 1) * n, o = (this._els.dhx_cal_data[0].childNodes, []), _ = d; l > _; _++) {
          var h = _;
          a.days = h;
          var c = scheduler._render_marked_timespan(a, null, h)[0];
          o.push(c)
        }
        return o
      }
      return a.days = e,
      scheduler._render_marked_timespan(a, null, e)
    }
    return "month" == this._mode ? (a.days = +scheduler.date.date_part(t), scheduler._render_marked_timespan(a, null, null)) : void 0
  },
  scheduler._remove_mark_now = function() {
    for (var e = "dhx_now_time",
    t = this._els[e], s = 0; s < t.length; s++) {
      var r = t[s],
      a = r.parentNode;
      a && a.removeChild(r)
    }
    this._els[e] = []
  },
  scheduler._marked_timespans = {
    global: {}
  },
  scheduler._get_zone_minutes = function(e) {
    return 60 * e.getHours() + e.getMinutes()
  },
  scheduler._prepare_timespan_options = function(e) {
    var t = [],
    s = [];
    if ("fullweek" == e.days && (e.days = [0, 1, 2, 3, 4, 5, 6]), e.days instanceof Array) {
      for (var a = e.days.slice(), i = 0; i < a.length; i++) {
        var n = scheduler._lame_clone(e);
        n.days = a[i],
        t.push.apply(t, scheduler._prepare_timespan_options(n))
      }
      return t
    }
    if (!e || !(e.start_date && e.end_date && e.end_date > e.start_date || void 0 !== e.days && e.zones)) return t;
    var d = 0,
    l = 1440;
    "fullday" == e.zones && (e.zones = [d, l]),
    e.zones && e.invert_zones && (e.zones = scheduler.invertZones(e.zones)),
    e.id = scheduler.uid(),
    e.css = e.css || "",
    e.type = e.type || r;
    var o = e.sections;
    if (o) {
      for (var _ in o) if (o.hasOwnProperty(_)) {
        var h = o[_];
        h instanceof Array || (h = [h]);
        for (var i = 0; i < h.length; i++) {
          var c = scheduler._lame_copy({},
          e);
          c.sections = {},
          c.sections[_] = h[i],
          s.push(c)
        }
      }
    } else s.push(e);
    for (var u = 0; u < s.length; u++) {
      var v = s[u],
      f = v.start_date,
      g = v.end_date;
      if (f && g) for (var m = scheduler.date.date_part(new Date(f)), p = scheduler.date.add(m, 1, "day"); g > m;) {
        var c = scheduler._lame_copy({},
        v);
        delete c.start_date,
        delete c.end_date,
        c.days = m.valueOf();
        var x = f > m ? scheduler._get_zone_minutes(f) : d,
        y = g > p || g.getDate() != m.getDate() ? l: scheduler._get_zone_minutes(g);
        c.zones = [x, y],
        t.push(c),
        m = p,
        p = scheduler.date.add(p, 1, "day")
      } else v.days instanceof Date && (v.days = scheduler.date.date_part(v.days).valueOf()),
      v.zones = e.zones.slice(),
      t.push(v)
    }
    return t
  },
  scheduler._get_dates_by_index = function(e, t, s) {
    var r = [];
    t = scheduler.date.date_part(new Date(t || scheduler._min_date)),
    s = new Date(s || scheduler._max_date);
    for (var a = t.getDay(), i = e - a >= 0 ? e - a: 7 - t.getDay() + e, n = scheduler.date.add(t, i, "day"); s > n; n = scheduler.date.add(n, 1, "week")) r.push(n);
    return r
  },
  scheduler._get_css_classes_by_config = function(e) {
    var t = [];
    return e.type == s && (t.push(s), e.css && t.push(s + "_reset")),
    t.push("dhx_marked_timespan", e.css),
    t.join(" ")
  },
  scheduler._get_block_by_config = function(e) {
    var t = document.createElement("DIV");
    return e.html && ("string" == typeof e.html ? t.innerHTML = e.html: t.appendChild(e.html)),
    t
  },
  scheduler._render_marked_timespan = function(e, t, s) {
    var r = [],
    a = scheduler.config,
    i = this._min_date,
    n = this._max_date,
    d = !1;
    if (!a.display_marked_timespans) return r;
    if (!s && 0 !== s) {
      if (e.days < 7) s = e.days;
      else {
        var l = new Date(e.days);
        if (d = +l, !( + n > +l && +l >= +i)) return r;
        s = l.getDay()
      }
      var o = i.getDay();
      o > s ? s = 7 - (o - s) : s -= o
    }
    var _ = e.zones,
    h = scheduler._get_css_classes_by_config(e);
    if (scheduler._table_view && "month" == scheduler._mode) {
      var c = [],
      u = [];
      if (t) c.push(t),
      u.push(s);
      else {
        u = d ? [d] : scheduler._get_dates_by_index(s);
        for (var v = 0; v < u.length; v++) c.push(this._scales[u[v]])
      }
      for (var v = 0; v < c.length; v++) {
        t = c[v],
        s = u[v];
        var f = Math.floor((this._correct_shift(s, 1) - i.valueOf()) / (864e5 * this._cols.length)),
        g = this.locate_holder_day(s, !1) % this._cols.length;
        if (!this._ignores[g]) {
          var m = scheduler._get_block_by_config(e),
          p = Math.max(t.offsetHeight - 1, 0),
          x = Math.max(t.offsetWidth - 1, 0),
          y = this._colsS[g],
          b = this._colsS.heights[f] + (this._colsS.height ? this.xy.month_scale_height + 2 : 2) - 1;
          m.className = h,
          m.style.top = b + "px",
          m.style.lineHeight = m.style.height = p + "px";
          for (var w = 0; w < _.length; w += 2) {
            var E = _[v],
            D = _[v + 1];
            if (E >= D) return [];
            var k = m.cloneNode(!0);
            k.style.left = y + Math.round(E / 1440 * x) + "px",
            k.style.width = Math.round((D - E) / 1440 * x) + "px",
            t.appendChild(k),
            r.push(k)
          }
        }
      }
    } else {
      var M = s;
      if (this._ignores[this.locate_holder_day(s, !1)]) return r;
      if (this._props && this._props[this._mode] && e.sections && e.sections[this._mode]) {
        var N = this._props[this._mode];
        M = N.order[e.sections[this._mode]];
        var O = N.order[e.sections[this._mode]];
        if (N.days > 1) {
          var L = N.options.length;
          M = M * L + O
        } else M = O,
        N.size && M > N.position + N.size && (M = 0)
      }
      t = t ? t: scheduler.locate_holder(M);
      for (var v = 0; v < _.length; v += 2) {
        var E = Math.max(_[v], 60 * a.first_hour),
        D = Math.min(_[v + 1], 60 * a.last_hour);
        if (E >= D) {
          if (v + 2 < _.length) continue;
          return []
        }
        var k = scheduler._get_block_by_config(e);
        k.className = h;
        var C = 24 * this.config.hour_size_px + 1,
        T = 36e5;
        k.style.top = Math.round((60 * E * 1e3 - this.config.first_hour * T) * this.config.hour_size_px / T) % C + "px",
        k.style.lineHeight = k.style.height = Math.max(Math.round(60 * (D - E) * 1e3 * this.config.hour_size_px / T) % C, 1) + "px",
        t.appendChild(k),
        r.push(k)
      }
    }
    return r
  },
  scheduler.markTimespan = function(e) {
    var t = scheduler._prepare_timespan_options(e);
    if (t.length) {
      for (var s = [], r = 0; r < t.length; r++) {
        var a = t[r],
        i = scheduler._render_marked_timespan(a, null, null);
        i.length && s.push.apply(s, i)
      }
      return s
    }
  },
  scheduler.unmarkTimespan = function(e) {
    if (e) for (var t = 0; t < e.length; t++) {
      var s = e[t];
      s.parentNode && s.parentNode.removeChild(s)
    }
  },
  scheduler._marked_timespans_ids = {},
  scheduler.addMarkedTimespan = function(e) {
    var t = scheduler._prepare_timespan_options(e),
    s = "global";
    if (t.length) {
      var r = t[0].id,
      a = scheduler._marked_timespans,
      i = scheduler._marked_timespans_ids;
      i[r] || (i[r] = []);
      for (var n = 0; n < t.length; n++) {
        var d = t[n],
        l = d.days,
        o = (d.zones, d.css, d.sections),
        _ = d.type;
        if (d.id = r, o) {
          for (var h in o) if (o.hasOwnProperty(h)) {
            a[h] || (a[h] = {});
            var c = o[h],
            u = a[h];
            u[c] || (u[c] = {}),
            u[c][l] || (u[c][l] = {}),
            u[c][l][_] || (u[c][l][_] = [], scheduler._marked_timespans_types || (scheduler._marked_timespans_types = {}), scheduler._marked_timespans_types[_] || (scheduler._marked_timespans_types[_] = !0));
            var v = u[c][l][_];
            d._array = v,
            v.push(d),
            i[r].push(d)
          }
        } else {
          a[s][l] || (a[s][l] = {}),
          a[s][l][_] || (a[s][l][_] = []),
          scheduler._marked_timespans_types || (scheduler._marked_timespans_types = {}),
          scheduler._marked_timespans_types[_] || (scheduler._marked_timespans_types[_] = !0);
          var v = a[s][l][_];
          d._array = v,
          v.push(d),
          i[r].push(d)
        }
      }
      return r
    }
  },
  scheduler._add_timespan_zones = function(e, t) {
    var s = e.slice();
    if (t = t.slice(), !s.length) return t;
    for (var r = 0; r < s.length; r += 2) for (var a = s[r], i = s[r + 1], n = r + 2 == s.length, d = 0; d < t.length; d += 2) {
      var l = t[d],
      o = t[d + 1];
      if (o > i && i >= l || a > l && o >= a) s[r] = Math.min(a, l),
      s[r + 1] = Math.max(i, o),
      r -= 2;
      else {
        if (!n) continue;
        var _ = a > l ? 0 : 2;
        s.splice(r + _, 0, l, o)
      }
      t.splice(d--, 2);
      break
    }
    return s
  },
  scheduler._subtract_timespan_zones = function(e, t) {
    for (var s = e.slice(), r = 0; r < s.length; r += 2) for (var a = s[r], i = s[r + 1], n = 0; n < t.length; n += 2) {
      var d = t[n],
      l = t[n + 1];
      if (l > a && i > d) {
        var o = !1;
        a >= d && l >= i && s.splice(r, 2),
        d > a && (s.splice(r, 2, a, d), o = !0),
        i > l && s.splice(o ? r + 2 : r, o ? 0 : 2, l, i),
        r -= 2;
        break
      }
    }
    return s
  },
  scheduler.invertZones = function(e) {
    return scheduler._subtract_timespan_zones([0, 1440], e.slice())
  },
  scheduler._delete_marked_timespan_by_id = function(e) {
    var t = scheduler._marked_timespans_ids[e];
    if (t) for (var s = 0; s < t.length; s++) for (var r = t[s], a = r._array, i = 0; i < a.length; i++) if (a[i] == r) {
      a.splice(i, 1);
      break
    }
  },
  scheduler._delete_marked_timespan_by_config = function(e) {
    var t = scheduler._marked_timespans,
    s = e.sections,
    a = e.days,
    i = e.type || r,
    n = [];
    if (s) {
      for (var d in s) if (s.hasOwnProperty(d) && t[d]) {
        var l = s[d];
        t[d][l] && t[d][l][a] && t[d][l][a][i] && (n = t[d][l][a][i])
      }
    } else t.global[a] && t.global[a][i] && (n = t.global[a][i]);
    for (var o = 0; o < n.length; o++) {
      var _ = n[o],
      h = scheduler._subtract_timespan_zones(_.zones, e.zones);
      if (h.length) _.zones = h;
      else {
        n.splice(o, 1),
        o--;
        for (var c = scheduler._marked_timespans_ids[_.id], u = 0; u < c.length; u++) if (c[u] == _) {
          c.splice(u, 1);
          break
        }
      }
    }
    for (var o in scheduler._marked_timespans.timeline) for (var v in scheduler._marked_timespans.timeline[o]) for (var u in scheduler._marked_timespans.timeline[o][v]) u === i && delete scheduler._marked_timespans.timeline[o][v][u]
  },
  scheduler.deleteMarkedTimespan = function(e) {
    if (arguments.length || (scheduler._marked_timespans = {
      global: {}
    },
    scheduler._marked_timespans_ids = {},
    scheduler._marked_timespans_types = {}), "object" != typeof e) scheduler._delete_marked_timespan_by_id(e);
    else {
      e.start_date && e.end_date || (e.days || (e.days = "fullweek"), e.zones || (e.zones = "fullday"));
      var t = [];
      if (e.type) t.push(e.type);
      else for (var s in scheduler._marked_timespans_types) t.push(s);
      for (var r = scheduler._prepare_timespan_options(e), a = 0; a < r.length; a++) for (var i = r[a], n = 0; n < t.length; n++) {
        var d = scheduler._lame_clone(i);
        d.type = t[n],
        scheduler._delete_marked_timespan_by_config(d)
      }
    }
  },
  scheduler._get_types_to_render = function(e, t) {
    var s = e ? e: {};
    for (var r in t || {}) t.hasOwnProperty(r) && (s[r] = t[r]);
    return s
  },
  scheduler._get_configs_to_render = function(e) {
    var t = [];
    for (var s in e) e.hasOwnProperty(s) && t.push.apply(t, e[s]);
    return t
  },
  scheduler.attachEvent("onScaleAdd",
  function(e, t) {
    if (!scheduler._table_view || "month" == scheduler._mode) {
      var s = t.getDay(),
      r = t.valueOf(),
      a = this._mode,
      i = scheduler._marked_timespans,
      n = [];
      if (this._props && this._props[a]) {
        var d = this._props[a],
        l = d.options,
        o = scheduler._get_unit_index(d, t),
        _ = l[o];
        if (d.days > 1) {
          var h = 864e5,
          c = Math.floor((t - scheduler._min_date) / h);
          t = scheduler.date.add(scheduler._min_date, Math.floor(c / l.length), "day"),
          t = scheduler.date.date_part(t)
        } else t = scheduler.date.date_part(new Date(this._date));
        if (s = t.getDay(), r = t.valueOf(), i[a] && i[a][_.key]) {
          var u = i[a][_.key],
          v = scheduler._get_types_to_render(u[s], u[r]);
          n.push.apply(n, scheduler._get_configs_to_render(v))
        }
      }
      var f = i.global,
      g = f[r] || f[s];
      n.push.apply(n, scheduler._get_configs_to_render(g));
      for (var m = 0; m < n.length; m++) scheduler._render_marked_timespan(n[m], e, t)
    }
  }),
  scheduler.dblclick_dhx_marked_timespan = function(e, t) {
    scheduler.config.dblclick_create || scheduler.callEvent("onScaleDblClick", [scheduler.getActionData(e).date, t, e]),
    scheduler.addEventNow(scheduler.getActionData(e).date, null, e)
  }
},
scheduler._temp_limit_scope();
//# sourceMappingURL=../sources/ext/dhtmlxscheduler_limit.js.map
