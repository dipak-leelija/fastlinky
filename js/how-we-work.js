!(function (e) {
  var t = {};
  function n(i) {
    if (t[i]) return t[i].exports;
    var s = (t[i] = { i: i, l: !1, exports: {} });
    return e[i].call(s.exports, s, s.exports, n), (s.l = !0), s.exports;
  }
  (n.m = e),
    (n.c = t),
    (n.d = function (e, t, i) {
      n.o(e, t) || Object.defineProperty(e, t, { enumerable: !0, get: i });
    }),
    (n.r = function (e) {
      "undefined" != typeof Symbol &&
        Symbol.toStringTag &&
        Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }),
        Object.defineProperty(e, "__esModule", { value: !0 });
    }),
    (n.t = function (e, t) {
      if ((1 & t && (e = n(e)), 8 & t)) return e;
      if (4 & t && "object" == typeof e && e && e.__esModule) return e;
      var i = Object.create(null);
      if (
        (n.r(i),
        Object.defineProperty(i, "default", { enumerable: !0, value: e }),
        2 & t && "string" != typeof e)
      )
        for (var s in e)
          n.d(
            i,
            s,
            function (t) {
              return e[t];
            }.bind(null, s)
          );
      return i;
    }),
    (n.n = function (e) {
      var t =
        e && e.__esModule
          ? function () {
              return e.default;
            }
          : function () {
              return e;
            };
      return n.d(t, "a", t), t;
    }),
    (n.o = function (e, t) {
      return Object.prototype.hasOwnProperty.call(e, t);
    }),
    (n.p = ""),
    n((n.s = 6));
})
// ================================================================================================
([!(function (e) {
  var t = {};
  function n(i) {
    if (t[i]) return t[i].exports;
    var s = (t[i] = { i: i, l: !1, exports: {} });
    return e[i].call(s.exports, s, s.exports, n), (s.l = !0), s.exports;
  }
  (n.m = e),
    (n.c = t),
    (n.d = function (e, t, i) {
      n.o(e, t) || Object.defineProperty(e, t, { enumerable: !0, get: i });
    }),
    (n.r = function (e) {
      "undefined" != typeof Symbol &&
        Symbol.toStringTag &&
        Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }),
        Object.defineProperty(e, "__esModule", { value: !0 });
    }),
    (n.t = function (e, t) {
      if ((1 & t && (e = n(e)), 8 & t)) return e;
      if (4 & t && "object" == typeof e && e && e.__esModule) return e;
      var i = Object.create(null);
      if (
        (n.r(i),
        Object.defineProperty(i, "default", { enumerable: !0, value: e }),
        2 & t && "string" != typeof e)
      )
        for (var s in e)
          n.d(
            i,
            s,
            function (t) {
              return e[t];
            }.bind(null, s)
          );
      return i;
    }),
    (n.n = function (e) {
      var t =
        e && e.__esModule
          ? function () {
              return e.default;
            }
          : function () {
              return e;
            };
      return n.d(t, "a", t), t;
    }),
    (n.o = function (e, t) {
      return Object.prototype.hasOwnProperty.call(e, t);
    }),
    (n.p = ""),
    n((n.s = 6));
})
// ===================================================================
([
  function (e, t, n) {
    "use strict";
    (function (e) {
      n.d(t, "a", function () {
        return Qe;
      });
      var i,
        s,
        r,
        a,
        o = Object.create,
        l = Object.defineProperty,
        c = Object.getPrototypeOf,
        d = Object.prototype.hasOwnProperty,
        u = Object.getOwnPropertyNames,
        p = Object.getOwnPropertyDescriptor,
        f = (e, t) => () => (
          t || e((t = { exports: {} }).exports, t), t.exports
        ),
        h = f((t) => {
          function n(e, t) {
            const n = Object.create(null),
              i = e.split(",");
            for (let e = 0; e < i.length; e++) n[i[e]] = !0;
            return t ? (e) => !!n[e.toLowerCase()] : (e) => !!n[e];
          }
          Object.defineProperty(t, "__esModule", { value: !0 });
          var i = {
              1: "TEXT",
              2: "CLASS",
              4: "STYLE",
              8: "PROPS",
              16: "FULL_PROPS",
              32: "HYDRATE_EVENTS",
              64: "STABLE_FRAGMENT",
              128: "KEYED_FRAGMENT",
              256: "UNKEYED_FRAGMENT",
              512: "NEED_PATCH",
              1024: "DYNAMIC_SLOTS",
              2048: "DEV_ROOT_FRAGMENT",
              [-1]: "HOISTED",
              [-2]: "BAIL",
            },
            s = n(
              "Infinity,undefined,NaN,isFinite,isNaN,parseFloat,parseInt,decodeURI,decodeURIComponent,encodeURI,encodeURIComponent,Math,Number,Date,Array,Object,Boolean,String,RegExp,Map,Set,JSON,Intl,BigInt"
            ),
            r =
              "itemscope,allowfullscreen,formnovalidate,ismap,nomodule,novalidate,readonly",
            a = n(r),
            o = n(
              r +
                ",async,autofocus,autoplay,controls,default,defer,disabled,hidden,loop,open,required,reversed,scoped,seamless,checked,muted,multiple,selected"
            ),
            l = /[>/="'\u0009\u000a\u000c\u0020]/,
            c = {},
            d = n(
              "animation-iteration-count,border-image-outset,border-image-slice,border-image-width,box-flex,box-flex-group,box-ordinal-group,column-count,columns,flex,flex-grow,flex-positive,flex-shrink,flex-negative,flex-order,grid-row,grid-row-end,grid-row-span,grid-row-start,grid-column,grid-column-end,grid-column-span,grid-column-start,font-weight,line-clamp,line-height,opacity,order,orphans,tab-size,widows,z-index,zoom,fill-opacity,flood-opacity,stop-opacity,stroke-dasharray,stroke-dashoffset,stroke-miterlimit,stroke-opacity,stroke-width"
            ),
            u = n(
              "accept,accept-charset,accesskey,action,align,allow,alt,async,autocapitalize,autocomplete,autofocus,autoplay,background,bgcolor,border,buffered,capture,challenge,charset,checked,cite,class,code,codebase,color,cols,colspan,content,contenteditable,contextmenu,controls,coords,crossorigin,csp,data,datetime,decoding,default,defer,dir,dirname,disabled,download,draggable,dropzone,enctype,enterkeyhint,for,form,formaction,formenctype,formmethod,formnovalidate,formtarget,headers,height,hidden,high,href,hreflang,http-equiv,icon,id,importance,integrity,ismap,itemprop,keytype,kind,label,lang,language,loading,list,loop,low,manifest,max,maxlength,minlength,media,min,multiple,muted,name,novalidate,open,optimum,pattern,ping,placeholder,poster,preload,radiogroup,readonly,referrerpolicy,rel,required,reversed,rows,rowspan,sandbox,scope,scoped,selected,shape,size,sizes,slot,span,spellcheck,src,srcdoc,srclang,srcset,start,step,style,summary,tabindex,target,title,translate,type,usemap,value,width,wrap"
            ),
            p = /;(?![^(]*\))/g,
            f = /:(.+)/;
          function h(e) {
            const t = {};
            return (
              e.split(p).forEach((e) => {
                if (e) {
                  const n = e.split(f);
                  n.length > 1 && (t[n[0].trim()] = n[1].trim());
                }
              }),
              t
            );
          }
          var m = n(
              "html,body,base,head,link,meta,style,title,address,article,aside,footer,header,h1,h2,h3,h4,h5,h6,hgroup,nav,section,div,dd,dl,dt,figcaption,figure,picture,hr,img,li,main,ol,p,pre,ul,a,b,abbr,bdi,bdo,br,cite,code,data,dfn,em,i,kbd,mark,q,rp,rt,rtc,ruby,s,samp,small,span,strong,sub,sup,time,u,var,wbr,area,audio,map,track,video,embed,object,param,source,canvas,script,noscript,del,ins,caption,col,colgroup,table,thead,tbody,td,th,tr,button,datalist,fieldset,form,input,label,legend,meter,optgroup,option,output,progress,select,textarea,details,dialog,menu,summary,template,blockquote,iframe,tfoot"
            ),
            g = n(
              "svg,animate,animateMotion,animateTransform,circle,clipPath,color-profile,defs,desc,discard,ellipse,feBlend,feColorMatrix,feComponentTransfer,feComposite,feConvolveMatrix,feDiffuseLighting,feDisplacementMap,feDistanceLight,feDropShadow,feFlood,feFuncA,feFuncB,feFuncG,feFuncR,feGaussianBlur,feImage,feMerge,feMergeNode,feMorphology,feOffset,fePointLight,feSpecularLighting,feSpotLight,feTile,feTurbulence,filter,foreignObject,g,hatch,hatchpath,image,line,linearGradient,marker,mask,mesh,meshgradient,meshpatch,meshrow,metadata,mpath,path,pattern,polygon,polyline,radialGradient,rect,set,solidcolor,stop,switch,symbol,text,textPath,title,tspan,unknown,use,view"
            ),
            v = n(
              "area,base,br,col,embed,hr,img,input,link,meta,param,source,track,wbr"
            ),
            b = /["'&<>]/,
            w = /^-?>|<!--|-->|--!>|<!-$/g;
          function y(e, t) {
            if (e === t) return !0;
            let n = L(e),
              i = L(t);
            if (n || i) return !(!n || !i) && e.getTime() === t.getTime();
            if (((n = M(e)), (i = M(t)), n || i))
              return (
                !(!n || !i) &&
                (function (e, t) {
                  if (e.length !== t.length) return !1;
                  let n = !0;
                  for (let i = 0; n && i < e.length; i++) n = y(e[i], t[i]);
                  return n;
                })(e, t)
              );
            if (((n = $(e)), (i = $(t)), n || i)) {
              if (!n || !i) return !1;
              if (Object.keys(e).length !== Object.keys(t).length) return !1;
              for (const n in e) {
                const i = e.hasOwnProperty(n),
                  s = t.hasOwnProperty(n);
                if ((i && !s) || (!i && s) || !y(e[n], t[n])) return !1;
              }
            }
            return String(e) === String(t);
          }
          var x,
            _ = (e, t) =>
              O(t)
                ? {
                    [`Map(${t.size})`]: [...t.entries()].reduce(
                      (e, [t, n]) => ((e[t + " =>"] = n), e),
                      {}
                    ),
                  }
                : A(t)
                ? { [`Set(${t.size})`]: [...t.values()] }
                : !$(t) || M(t) || R(t)
                ? t
                : String(t),
            E = Object.freeze({}),
            T = Object.freeze([]),
            C = /^on[^a-z]/,
            S = Object.assign,
            k = Object.prototype.hasOwnProperty,
            M = Array.isArray,
            O = (e) => "[object Map]" === N(e),
            A = (e) => "[object Set]" === N(e),
            L = (e) => e instanceof Date,
            P = (e) => "function" == typeof e,
            I = (e) => "string" == typeof e,
            $ = (e) => null !== e && "object" == typeof e,
            z = Object.prototype.toString,
            N = (e) => z.call(e),
            R = (e) => "[object Object]" === N(e),
            D = n(
              ",key,ref,onVnodeBeforeMount,onVnodeMounted,onVnodeBeforeUpdate,onVnodeUpdated,onVnodeBeforeUnmount,onVnodeUnmounted"
            ),
            j = (e) => {
              const t = Object.create(null);
              return (n) => t[n] || (t[n] = e(n));
            },
            B = /-(\w)/g,
            V = j((e) => e.replace(B, (e, t) => (t ? t.toUpperCase() : ""))),
            F = /\B([A-Z])/g,
            G = j((e) => e.replace(F, "-$1").toLowerCase()),
            H = j((e) => e.charAt(0).toUpperCase() + e.slice(1)),
            W = j((e) => (e ? "on" + H(e) : ""));
          (t.EMPTY_ARR = T),
            (t.EMPTY_OBJ = E),
            (t.NO = () => !1),
            (t.NOOP = () => {}),
            (t.PatchFlagNames = i),
            (t.babelParserDefaultPlugins = [
              "bigInt",
              "optionalChaining",
              "nullishCoalescingOperator",
            ]),
            (t.camelize = V),
            (t.capitalize = H),
            (t.def = (e, t, n) => {
              Object.defineProperty(e, t, {
                configurable: !0,
                enumerable: !1,
                value: n,
              });
            }),
            (t.escapeHtml = function (e) {
              const t = "" + e,
                n = b.exec(t);
              if (!n) return t;
              let i,
                s,
                r = "",
                a = 0;
              for (s = n.index; s < t.length; s++) {
                switch (t.charCodeAt(s)) {
                  case 34:
                    i = "&quot;";
                    break;
                  case 38:
                    i = "&amp;";
                    break;
                  case 39:
                    i = "&#39;";
                    break;
                  case 60:
                    i = "&lt;";
                    break;
                  case 62:
                    i = "&gt;";
                    break;
                  default:
                    continue;
                }
                a !== s && (r += t.substring(a, s)), (a = s + 1), (r += i);
              }
              return a !== s ? r + t.substring(a, s) : r;
            }),
            (t.escapeHtmlComment = function (e) {
              return e.replace(w, "");
            }),
            (t.extend = S),
            (t.generateCodeFrame = function (e, t = 0, n = e.length) {
              const i = e.split(/\r?\n/);
              let s = 0;
              const r = [];
              for (let e = 0; e < i.length; e++)
                if ((s += i[e].length + 1) >= t) {
                  for (let a = e - 2; a <= e + 2 || n > s; a++) {
                    if (a < 0 || a >= i.length) continue;
                    const o = a + 1;
                    r.push(
                      `${o}${" ".repeat(Math.max(3 - String(o).length, 0))}|  ${
                        i[a]
                      }`
                    );
                    const l = i[a].length;
                    if (a === e) {
                      const e = t - (s - l) + 1,
                        i = Math.max(1, n > s ? l - e : n - t);
                      r.push("   |  " + " ".repeat(e) + "^".repeat(i));
                    } else if (a > e) {
                      if (n > s) {
                        const e = Math.max(Math.min(n - s, l), 1);
                        r.push("   |  " + "^".repeat(e));
                      }
                      s += l + 1;
                    }
                  }
                  break;
                }
              return r.join("\n");
            }),
            (t.getGlobalThis = () =>
              x ||
              (x =
                "undefined" != typeof globalThis
                  ? globalThis
                  : "undefined" != typeof self
                  ? self
                  : "undefined" != typeof window
                  ? window
                  : void 0 !== e
                  ? e
                  : {})),
            (t.hasChanged = (e, t) => e !== t && (e == e || t == t)),
            (t.hasOwn = (e, t) => k.call(e, t)),
            (t.hyphenate = G),
            (t.invokeArrayFns = (e, t) => {
              for (let n = 0; n < e.length; n++) e[n](t);
            }),
            (t.isArray = M),
            (t.isBooleanAttr = o),
            (t.isDate = L),
            (t.isFunction = P),
            (t.isGloballyWhitelisted = s),
            (t.isHTMLTag = m),
            (t.isIntegerKey = (e) =>
              I(e) &&
              "NaN" !== e &&
              "-" !== e[0] &&
              "" + parseInt(e, 10) === e),
            (t.isKnownAttr = u),
            (t.isMap = O),
            (t.isModelListener = (e) => e.startsWith("onUpdate:")),
            (t.isNoUnitNumericStyleProp = d),
            (t.isObject = $),
            (t.isOn = (e) => C.test(e)),
            (t.isPlainObject = R),
            (t.isPromise = (e) => $(e) && P(e.then) && P(e.catch)),
            (t.isReservedProp = D),
            (t.isSSRSafeAttrName = function (e) {
              if (c.hasOwnProperty(e)) return c[e];
              const t = l.test(e);
              return (
                t && console.error("unsafe attribute name: " + e), (c[e] = !t)
              );
            }),
            (t.isSVGTag = g),
            (t.isSet = A),
            (t.isSpecialBooleanAttr = a),
            (t.isString = I),
            (t.isSymbol = (e) => "symbol" == typeof e),
            (t.isVoidTag = v),
            (t.looseEqual = y),
            (t.looseIndexOf = function (e, t) {
              return e.findIndex((e) => y(e, t));
            }),
            (t.makeMap = n),
            (t.normalizeClass = function e(t) {
              let n = "";
              if (I(t)) n = t;
              else if (M(t))
                for (let i = 0; i < t.length; i++) {
                  const s = e(t[i]);
                  s && (n += s + " ");
                }
              else if ($(t)) for (const e in t) t[e] && (n += e + " ");
              return n.trim();
            }),
            (t.normalizeStyle = function e(t) {
              if (M(t)) {
                const n = {};
                for (let i = 0; i < t.length; i++) {
                  const s = t[i],
                    r = e(I(s) ? h(s) : s);
                  if (r) for (const e in r) n[e] = r[e];
                }
                return n;
              }
              if ($(t)) return t;
            }),
            (t.objectToString = z),
            (t.parseStringStyle = h),
            (t.propsToAttrMap = {
              acceptCharset: "accept-charset",
              className: "class",
              htmlFor: "for",
              httpEquiv: "http-equiv",
            }),
            (t.remove = (e, t) => {
              const n = e.indexOf(t);
              n > -1 && e.splice(n, 1);
            }),
            (t.slotFlagsText = { 1: "STABLE", 2: "DYNAMIC", 3: "FORWARDED" }),
            (t.stringifyStyle = function (e) {
              let t = "";
              if (!e) return t;
              for (const n in e) {
                const i = e[n],
                  s = n.startsWith("--") ? n : G(n);
                (I(i) || ("number" == typeof i && d(s))) && (t += `${s}:${i};`);
              }
              return t;
            }),
            (t.toDisplayString = (e) =>
              null == e ? "" : $(e) ? JSON.stringify(e, _, 2) : String(e)),
            (t.toHandlerKey = W),
            (t.toNumber = (e) => {
              const t = parseFloat(e);
              return isNaN(t) ? e : t;
            }),
            (t.toRawType = (e) => N(e).slice(8, -1)),
            (t.toTypeString = N);
        }),
        m = f((e, t) => {
          t.exports = h();
        }),
        g = f((e) => {
          Object.defineProperty(e, "__esModule", { value: !0 });
          var t,
            n = m(),
            i = new WeakMap(),
            s = [],
            r = Symbol("iterate"),
            a = Symbol("Map key iterate");
          function o(e, i = n.EMPTY_OBJ) {
            (function (e) {
              return e && !0 === e._isEffect;
            })(e) && (e = e.raw);
            const r = (function (e, n) {
              const i = function () {
                if (!i.active) return e();
                if (!s.includes(i)) {
                  c(i);
                  try {
                    return f(), s.push(i), (t = i), e();
                  } finally {
                    s.pop(), h(), (t = s[s.length - 1]);
                  }
                }
              };
              return (
                (i.id = l++),
                (i.allowRecurse = !!n.allowRecurse),
                (i._isEffect = !0),
                (i.active = !0),
                (i.raw = e),
                (i.deps = []),
                (i.options = n),
                i
              );
            })(e, i);
            return i.lazy || r(), r;
          }
          var l = 0;
          function c(e) {
            const { deps: t } = e;
            if (t.length) {
              for (let n = 0; n < t.length; n++) t[n].delete(e);
              t.length = 0;
            }
          }
          var d = !0,
            u = [];
          function p() {
            u.push(d), (d = !1);
          }
          function f() {
            u.push(d), (d = !0);
          }
          function h() {
            const e = u.pop();
            d = void 0 === e || e;
          }
          function g(e, n, s) {
            if (!d || void 0 === t) return;
            let r = i.get(e);
            r || i.set(e, (r = new Map()));
            let a = r.get(s);
            a || r.set(s, (a = new Set())),
              a.has(t) ||
                (a.add(t),
                t.deps.push(a),
                t.options.onTrack &&
                  t.options.onTrack({ effect: t, target: e, type: n, key: s }));
          }
          function v(e, s, o, l, c, d) {
            const u = i.get(e);
            if (!u) return;
            const p = new Set(),
              f = (e) => {
                e &&
                  e.forEach((e) => {
                    (e !== t || e.allowRecurse) && p.add(e);
                  });
              };
            if ("clear" === s) u.forEach(f);
            else if ("length" === o && n.isArray(e))
              u.forEach((e, t) => {
                ("length" === t || t >= l) && f(e);
              });
            else
              switch ((void 0 !== o && f(u.get(o)), s)) {
                case "add":
                  n.isArray(e)
                    ? n.isIntegerKey(o) && f(u.get("length"))
                    : (f(u.get(r)), n.isMap(e) && f(u.get(a)));
                  break;
                case "delete":
                  n.isArray(e) || (f(u.get(r)), n.isMap(e) && f(u.get(a)));
                  break;
                case "set":
                  n.isMap(e) && f(u.get(r));
              }
            p.forEach((t) => {
              t.options.onTrigger &&
                t.options.onTrigger({
                  effect: t,
                  target: e,
                  key: o,
                  type: s,
                  newValue: l,
                  oldValue: c,
                  oldTarget: d,
                }),
                t.options.scheduler ? t.options.scheduler(t) : t();
            });
          }
          var b = n.makeMap("__proto__,__v_isRef,__isVue"),
            w = new Set(
              Object.getOwnPropertyNames(Symbol)
                .map((e) => Symbol[e])
                .filter(n.isSymbol)
            ),
            y = C(),
            x = C(!1, !0),
            _ = C(!0),
            E = C(!0, !0),
            T = {};
          function C(e = !1, t = !1) {
            return function (i, s, r) {
              if ("__v_isReactive" === s) return !e;
              if ("__v_isReadonly" === s) return e;
              if (
                "__v_raw" === s &&
                r === (e ? (t ? ae : re) : t ? se : ie).get(i)
              )
                return i;
              const a = n.isArray(i);
              if (!e && a && n.hasOwn(T, s)) return Reflect.get(T, s, r);
              const o = Reflect.get(i, s, r);
              return (n.isSymbol(s) ? w.has(s) : b(s))
                ? o
                : (e || g(i, "get", s),
                  t
                    ? o
                    : me(o)
                    ? a && n.isIntegerKey(s)
                      ? o
                      : o.value
                    : n.isObject(o)
                    ? e
                      ? le(o)
                      : oe(o)
                    : o);
            };
          }
          ["includes", "indexOf", "lastIndexOf"].forEach((e) => {
            const t = Array.prototype[e];
            T[e] = function (...e) {
              const n = fe(this);
              for (let e = 0, t = this.length; e < t; e++) g(n, "get", e + "");
              const i = t.apply(n, e);
              return -1 === i || !1 === i ? t.apply(n, e.map(fe)) : i;
            };
          }),
            ["push", "pop", "shift", "unshift", "splice"].forEach((e) => {
              const t = Array.prototype[e];
              T[e] = function (...e) {
                p();
                const n = t.apply(this, e);
                return h(), n;
              };
            });
          var S = M(),
            k = M(!0);
          function M(e = !1) {
            return function (t, i, s, r) {
              let a = t[i];
              if (
                !e &&
                ((s = fe(s)), (a = fe(a)), !n.isArray(t) && me(a) && !me(s))
              )
                return (a.value = s), !0;
              const o =
                  n.isArray(t) && n.isIntegerKey(i)
                    ? Number(i) < t.length
                    : n.hasOwn(t, i),
                l = Reflect.set(t, i, s, r);
              return (
                t === fe(r) &&
                  (o
                    ? n.hasChanged(s, a) && v(t, "set", i, s, a)
                    : v(t, "add", i, s)),
                l
              );
            };
          }
          var O = {
              get: y,
              set: S,
              deleteProperty: function (e, t) {
                const i = n.hasOwn(e, t),
                  s = e[t],
                  r = Reflect.deleteProperty(e, t);
                return r && i && v(e, "delete", t, void 0, s), r;
              },
              has: function (e, t) {
                const i = Reflect.has(e, t);
                return (n.isSymbol(t) && w.has(t)) || g(e, "has", t), i;
              },
              ownKeys: function (e) {
                return (
                  g(e, "iterate", n.isArray(e) ? "length" : r),
                  Reflect.ownKeys(e)
                );
              },
            },
            A = {
              get: _,
              set: (e, t) => (
                console.warn(
                  `Set operation on key "${String(
                    t
                  )}" failed: target is readonly.`,
                  e
                ),
                !0
              ),
              deleteProperty: (e, t) => (
                console.warn(
                  `Delete operation on key "${String(
                    t
                  )}" failed: target is readonly.`,
                  e
                ),
                !0
              ),
            },
            L = n.extend({}, O, { get: x, set: k }),
            P = n.extend({}, A, { get: E }),
            I = (e) => (n.isObject(e) ? oe(e) : e),
            $ = (e) => (n.isObject(e) ? le(e) : e),
            z = (e) => e,
            N = (e) => Reflect.getPrototypeOf(e);
          function R(e, t, n = !1, i = !1) {
            const s = fe((e = e.__v_raw)),
              r = fe(t);
            t !== r && !n && g(s, "get", t), !n && g(s, "get", r);
            const { has: a } = N(s),
              o = i ? z : n ? $ : I;
            return a.call(s, t)
              ? o(e.get(t))
              : a.call(s, r)
              ? o(e.get(r))
              : void (e !== s && e.get(t));
          }
          function D(e, t = !1) {
            const n = this.__v_raw,
              i = fe(n),
              s = fe(e);
            return (
              e !== s && !t && g(i, "has", e),
              !t && g(i, "has", s),
              e === s ? n.has(e) : n.has(e) || n.has(s)
            );
          }
          function j(e, t = !1) {
            return (
              (e = e.__v_raw),
              !t && g(fe(e), "iterate", r),
              Reflect.get(e, "size", e)
            );
          }
          function B(e) {
            e = fe(e);
            const t = fe(this);
            return N(t).has.call(t, e) || (t.add(e), v(t, "add", e, e)), this;
          }
          function V(e, t) {
            t = fe(t);
            const i = fe(this),
              { has: s, get: r } = N(i);
            let a = s.call(i, e);
            a ? ne(i, s, e) : ((e = fe(e)), (a = s.call(i, e)));
            const o = r.call(i, e);
            return (
              i.set(e, t),
              a
                ? n.hasChanged(t, o) && v(i, "set", e, t, o)
                : v(i, "add", e, t),
              this
            );
          }
          function F(e) {
            const t = fe(this),
              { has: n, get: i } = N(t);
            let s = n.call(t, e);
            s ? ne(t, n, e) : ((e = fe(e)), (s = n.call(t, e)));
            const r = i ? i.call(t, e) : void 0,
              a = t.delete(e);
            return s && v(t, "delete", e, void 0, r), a;
          }
          function G() {
            const e = fe(this),
              t = 0 !== e.size,
              i = n.isMap(e) ? new Map(e) : new Set(e),
              s = e.clear();
            return t && v(e, "clear", void 0, void 0, i), s;
          }
          function H(e, t) {
            return function (n, i) {
              const s = this,
                a = s.__v_raw,
                o = fe(a),
                l = t ? z : e ? $ : I;
              return (
                !e && g(o, "iterate", r),
                a.forEach((e, t) => n.call(i, l(e), l(t), s))
              );
            };
          }
          function W(e, t, i) {
            return function (...s) {
              const o = this.__v_raw,
                l = fe(o),
                c = n.isMap(l),
                d = "entries" === e || (e === Symbol.iterator && c),
                u = "keys" === e && c,
                p = o[e](...s),
                f = i ? z : t ? $ : I;
              return (
                !t && g(l, "iterate", u ? a : r),
                {
                  next() {
                    const { value: e, done: t } = p.next();
                    return t
                      ? { value: e, done: t }
                      : { value: d ? [f(e[0]), f(e[1])] : f(e), done: t };
                  },
                  [Symbol.iterator]() {
                    return this;
                  },
                }
              );
            };
          }
          function q(e) {
            return function (...t) {
              {
                const i = t[0] ? `on key "${t[0]}" ` : "";
                console.warn(
                  `${n.capitalize(
                    e
                  )} operation ${i}failed: target is readonly.`,
                  fe(this)
                );
              }
              return "delete" !== e && this;
            };
          }
          var Y = {
              get(e) {
                return R(this, e);
              },
              get size() {
                return j(this);
              },
              has: D,
              add: B,
              set: V,
              delete: F,
              clear: G,
              forEach: H(!1, !1),
            },
            U = {
              get(e) {
                return R(this, e, !1, !0);
              },
              get size() {
                return j(this);
              },
              has: D,
              add: B,
              set: V,
              delete: F,
              clear: G,
              forEach: H(!1, !0),
            },
            X = {
              get(e) {
                return R(this, e, !0);
              },
              get size() {
                return j(this, !0);
              },
              has(e) {
                return D.call(this, e, !0);
              },
              add: q("add"),
              set: q("set"),
              delete: q("delete"),
              clear: q("clear"),
              forEach: H(!0, !1),
            },
            K = {
              get(e) {
                return R(this, e, !0, !0);
              },
              get size() {
                return j(this, !0);
              },
              has(e) {
                return D.call(this, e, !0);
              },
              add: q("add"),
              set: q("set"),
              delete: q("delete"),
              clear: q("clear"),
              forEach: H(!0, !0),
            };
          function J(e, t) {
            const i = t ? (e ? K : U) : e ? X : Y;
            return (t, s, r) =>
              "__v_isReactive" === s
                ? !e
                : "__v_isReadonly" === s
                ? e
                : "__v_raw" === s
                ? t
                : Reflect.get(n.hasOwn(i, s) && s in t ? i : t, s, r);
          }
          ["keys", "values", "entries", Symbol.iterator].forEach((e) => {
            (Y[e] = W(e, !1, !1)),
              (X[e] = W(e, !0, !1)),
              (U[e] = W(e, !1, !0)),
              (K[e] = W(e, !0, !0));
          });
          var Z = { get: J(!1, !1) },
            Q = { get: J(!1, !0) },
            ee = { get: J(!0, !1) },
            te = { get: J(!0, !0) };
          function ne(e, t, i) {
            const s = fe(i);
            if (s !== i && t.call(e, s)) {
              const t = n.toRawType(e);
              console.warn(
                `Reactive ${t} contains both the raw and reactive versions of the same object${
                  "Map" === t ? " as keys" : ""
                }, which can lead to inconsistencies. Avoid differentiating between the raw and reactive versions of an object and only use the reactive version if possible.`
              );
            }
          }
          var ie = new WeakMap(),
            se = new WeakMap(),
            re = new WeakMap(),
            ae = new WeakMap();
          function oe(e) {
            return e && e.__v_isReadonly ? e : ce(e, !1, O, Z, ie);
          }
          function le(e) {
            return ce(e, !0, A, ee, re);
          }
          function ce(e, t, i, s, r) {
            if (!n.isObject(e))
              return (
                console.warn("value cannot be made reactive: " + String(e)), e
              );
            if (e.__v_raw && (!t || !e.__v_isReactive)) return e;
            const a = r.get(e);
            if (a) return a;
            const o =
              (l = e).__v_skip || !Object.isExtensible(l)
                ? 0
                : (function (e) {
                    switch (n.toRawType(l)) {
                      case "Object":
                      case "Array":
                        return 1;
                      case "Map":
                      case "Set":
                      case "WeakMap":
                      case "WeakSet":
                        return 2;
                      default:
                        return 0;
                    }
                  })();
            var l;
            if (0 === o) return e;
            const c = new Proxy(e, 2 === o ? s : i);
            return r.set(e, c), c;
          }
          function de(e) {
            return ue(e) ? de(e.__v_raw) : !(!e || !e.__v_isReactive);
          }
          function ue(e) {
            return !(!e || !e.__v_isReadonly);
          }
          function pe(e) {
            return de(e) || ue(e);
          }
          function fe(e) {
            return (e && fe(e.__v_raw)) || e;
          }
          var he = (e) => (n.isObject(e) ? oe(e) : e);
          function me(e) {
            return Boolean(e && !0 === e.__v_isRef);
          }
          function ge(e, t = !1) {
            return me(e)
              ? e
              : new (class {
                  constructor(e, t = !1) {
                    (this._rawValue = e),
                      (this._shallow = t),
                      (this.__v_isRef = !0),
                      (this._value = t ? e : he(e));
                  }
                  get value() {
                    return g(fe(this), "get", "value"), this._value;
                  }
                  set value(e) {
                    n.hasChanged(fe(e), this._rawValue) &&
                      ((this._rawValue = e),
                      (this._value = this._shallow ? e : he(e)),
                      v(fe(this), "set", "value", e));
                  }
                })(e, t);
          }
          function ve(e) {
            return me(e) ? e.value : e;
          }
          var be = {
            get: (e, t, n) => ve(Reflect.get(e, t, n)),
            set: (e, t, n, i) => {
              const s = e[t];
              return me(s) && !me(n)
                ? ((s.value = n), !0)
                : Reflect.set(e, t, n, i);
            },
          };
          function we(e, t) {
            return me(e[t])
              ? e[t]
              : new (class {
                  constructor(e, t) {
                    (this._object = e), (this._key = t), (this.__v_isRef = !0);
                  }
                  get value() {
                    return this._object[this._key];
                  }
                  set value(e) {
                    this._object[this._key] = e;
                  }
                })(e, t);
          }
          (e.ITERATE_KEY = r),
            (e.computed = function (e) {
              let t, i;
              return (
                n.isFunction(e)
                  ? ((t = e),
                    (i = () => {
                      console.warn(
                        "Write operation failed: computed value is readonly"
                      );
                    }))
                  : ((t = e.get), (i = e.set)),
                new (class {
                  constructor(e, t, n) {
                    (this._setter = t),
                      (this._dirty = !0),
                      (this.__v_isRef = !0),
                      (this.effect = o(e, {
                        lazy: !0,
                        scheduler: () => {
                          this._dirty ||
                            ((this._dirty = !0), v(fe(this), "set", "value"));
                        },
                      })),
                      (this.__v_isReadonly = n);
                  }
                  get value() {
                    const e = fe(this);
                    return (
                      e._dirty && ((e._value = this.effect()), (e._dirty = !1)),
                      g(e, "get", "value"),
                      e._value
                    );
                  }
                  set value(e) {
                    this._setter(e);
                  }
                })(t, i, n.isFunction(e) || !e.set)
              );
            }),
            (e.customRef = function (e) {
              return new (class {
                constructor(e) {
                  this.__v_isRef = !0;
                  const { get: t, set: n } = e(
                    () => g(this, "get", "value"),
                    () => v(this, "set", "value")
                  );
                  (this._get = t), (this._set = n);
                }
                get value() {
                  return this._get();
                }
                set value(e) {
                  this._set(e);
                }
              })(e);
            }),
            (e.effect = o),
            (e.enableTracking = f),
            (e.isProxy = pe),
            (e.isReactive = de),
            (e.isReadonly = ue),
            (e.isRef = me),
            (e.markRaw = function (e) {
              return n.def(e, "__v_skip", !0), e;
            }),
            (e.pauseTracking = p),
            (e.proxyRefs = function (e) {
              return de(e) ? e : new Proxy(e, be);
            }),
            (e.reactive = oe),
            (e.readonly = le),
            (e.ref = function (e) {
              return ge(e);
            }),
            (e.resetTracking = h),
            (e.shallowReactive = function (e) {
              return ce(e, !1, L, Q, se);
            }),
            (e.shallowReadonly = function (e) {
              return ce(e, !0, P, te, ae);
            }),
            (e.shallowRef = function (e) {
              return ge(e, !0);
            }),
            (e.stop = function (e) {
              e.active &&
                (c(e), e.options.onStop && e.options.onStop(), (e.active = !1));
            }),
            (e.toRaw = fe),
            (e.toRef = we),
            (e.toRefs = function (e) {
              pe(e) ||
                console.warn(
                  "toRefs() expects a reactive object but received a plain one."
                );
              const t = n.isArray(e) ? new Array(e.length) : {};
              for (const n in e) t[n] = we(e, n);
              return t;
            }),
            (e.track = g),
            (e.trigger = v),
            (e.triggerRef = function (e) {
              v(fe(e), "set", "value", e.value);
            }),
            (e.unref = ve);
        }),
        v = f((e, t) => {
          t.exports = g();
        }),
        b = !1,
        w = !1,
        y = [];
      function x() {
        (b = !1), (w = !0);
        for (let e = 0; e < y.length; e++) y[e]();
        (y.length = 0), (w = !1);
      }
      var _ = !0;
      function E(e) {
        s = e;
      }
      var T = [],
        C = [],
        S = [];
      function k(e, t) {
        e._x_attributeCleanups &&
          Object.entries(e._x_attributeCleanups).forEach(([n, i]) => {
            (void 0 === t || t.includes(n)) &&
              (i.forEach((e) => e()), delete e._x_attributeCleanups[n]);
          });
      }
      var M = new MutationObserver(N),
        O = !1;
      function A() {
        M.observe(document, {
          subtree: !0,
          childList: !0,
          attributes: !0,
          attributeOldValue: !0,
        }),
          (O = !0);
      }
      var L = [],
        P = !1;
      function I(e) {
        if (!O) return e();
        (L = L.concat(M.takeRecords())).length &&
          !P &&
          ((P = !0),
          queueMicrotask(() => {
            N(L), (L.length = 0), (P = !1);
          })),
          M.disconnect(),
          (O = !1);
        let t = e();
        return A(), t;
      }
      var $ = !1,
        z = [];
      function N(e) {
        if ($) return void (z = z.concat(e));
        let t = [],
          n = [],
          i = new Map(),
          s = new Map();
        for (let r = 0; r < e.length; r++)
          if (
            !e[r].target._x_ignoreMutationObserver &&
            ("childList" === e[r].type &&
              (e[r].addedNodes.forEach((e) => 1 === e.nodeType && t.push(e)),
              e[r].removedNodes.forEach((e) => 1 === e.nodeType && n.push(e))),
            "attributes" === e[r].type)
          ) {
            let t = e[r].target,
              n = e[r].attributeName,
              a = e[r].oldValue,
              o = () => {
                i.has(t) || i.set(t, []),
                  i.get(t).push({ name: n, value: t.getAttribute(n) });
              },
              l = () => {
                s.has(t) || s.set(t, []), s.get(t).push(n);
              };
            t.hasAttribute(n) && null === a
              ? o()
              : t.hasAttribute(n)
              ? (l(), o())
              : l();
          }
        s.forEach((e, t) => {
          k(t, e);
        }),
          i.forEach((e, t) => {
            T.forEach((n) => n(t, e));
          });
        for (let e of t) n.includes(e) || S.forEach((t) => t(e));
        for (let e of n) t.includes(e) || C.forEach((t) => t(e));
        (t = null), (n = null), (i = null), (s = null);
      }
      function R(e, t, n) {
        return (
          (e._x_dataStack = [t, ...j(n || e)]),
          () => {
            e._x_dataStack = e._x_dataStack.filter((e) => e !== t);
          }
        );
      }
      function D(e, t) {
        let n = e._x_dataStack[0];
        Object.entries(t).forEach(([e, t]) => {
          n[e] = t;
        });
      }
      function j(e) {
        return e._x_dataStack
          ? e._x_dataStack
          : "function" == typeof ShadowRoot && e instanceof ShadowRoot
          ? j(e.host)
          : e.parentNode
          ? j(e.parentNode)
          : [];
      }
      function B(e) {
        let t = new Proxy(
          {},
          {
            ownKeys: () =>
              Array.from(new Set(e.flatMap((e) => Object.keys(e)))),
            has: (t, n) => e.some((e) => e.hasOwnProperty(n)),
            get: (n, i) =>
              (e.find((e) => {
                if (e.hasOwnProperty(i)) {
                  let n = Object.getOwnPropertyDescriptor(e, i);
                  if (
                    (n.get && n.get._x_alreadyBound) ||
                    (n.set && n.set._x_alreadyBound)
                  )
                    return !0;
                  if ((n.get || n.set) && n.enumerable) {
                    let s = n.get,
                      r = n.set,
                      a = n;
                    (s = s && s.bind(t)),
                      (r = r && r.bind(t)),
                      s && (s._x_alreadyBound = !0),
                      r && (r._x_alreadyBound = !0),
                      Object.defineProperty(e, i, { ...a, get: s, set: r });
                  }
                  return !0;
                }
                return !1;
              }) || {})[i],
            set: (t, n, i) => {
              let s = e.find((e) => e.hasOwnProperty(n));
              return s ? (s[n] = i) : (e[e.length - 1][n] = i), !0;
            },
          }
        );
        return t;
      }
      function V(e, t = () => {}) {
        let n = {
          initialValue: void 0,
          _x_interceptor: !0,
          initialize(t, n, i) {
            return e(
              this.initialValue,
              () =>
                (function (e, t) {
                  return n.split(".").reduce((e, t) => e[t], e);
                })(t),
              (e) =>
                (function e(t, n, i) {
                  if (
                    ("string" == typeof n && (n = n.split(".")), 1 !== n.length)
                  ) {
                    if (0 === n.length) throw error;
                    return t[n[0]] || (t[n[0]] = {}), e(t[n[0]], n.slice(1), i);
                  }
                  t[n[0]] = i;
                })(t, n, e),
              n,
              i
            );
          },
        };
        return (
          t(n),
          (e) => {
            if ("object" == typeof e && null !== e && e._x_interceptor) {
              let t = n.initialize.bind(n);
              n.initialize = (i, s, r) => {
                let a = e.initialize(i, s, r);
                return (n.initialValue = a), t(i, s, r);
              };
            } else n.initialValue = e;
            return n;
          }
        );
      }
      var F = {};
      function G(e, t) {
        F[e] = t;
      }
      function H(e, t) {
        return (
          Object.entries(F).forEach(([n, i]) => {
            Object.defineProperty(e, "$" + n, {
              get: () => i(t, { Alpine: Ve, interceptor: V }),
              enumerable: !1,
            });
          }),
          e
        );
      }
      function W(e, t, n = {}) {
        let i;
        return q(e, t)((e) => (i = e), n), i;
      }
      function q(...e) {
        return Y(...e);
      }
      var Y = U;
      function U(e, t) {
        let n = {};
        H(n, e);
        let i = [n, ...j(e)];
        if ("function" == typeof t)
          return (function (e, t) {
            return (n = () => {}, { scope: i = {}, params: s = [] } = {}) => {
              K(n, t.apply(B([i, ...e]), s));
            };
          })(i, t);
        let s = (function (e, t) {
          let n = (function (e) {
            if (X[e]) return X[e];
            let t = new (0,
            Object.getPrototypeOf(async function () {}).constructor)(
              ["__self", "scope"],
              `with (scope) { __self.result = ${
                /^[\n\s]*if.*\(.*\)/.test(e) || /^(let|const)/.test(e)
                  ? `(() => { ${e} })()`
                  : e
              } }; __self.finished = true; return __self.result;`
            );
            return (X[e] = t), t;
          })(t);
          return (t = () => {}, { scope: i = {}, params: s = [] } = {}) => {
            (n.result = void 0), (n.finished = !1);
            let r = B([i, ...e]),
              a = n(n, r);
            n.finished
              ? K(t, n.result, r, s)
              : a.then((e) => {
                  K(t, e, r, s);
                });
          };
        })(i, t);
        return function (e, t, n, ...i) {
          try {
            return n(...i);
          } catch (n) {
            throw (
              (console.warn(
                `Alpine Expression Error: ${n.message}\n\nExpression: "${t}"\n\n`,
                e
              ),
              n)
            );
          }
        }.bind(null, e, t, s);
      }
      var X = {};
      function K(e, t, n, i) {
        if ("function" == typeof t) {
          let s = t.apply(n, i);
          s instanceof Promise ? s.then((t) => K(e, t, n, i)) : e(s);
        } else e(t);
      }
      var J = "x-";
      function Z(e = "") {
        return J + e;
      }
      var Q = {};
      function ee(e, t) {
        Q[e] = t;
      }
      function te(e, t, n) {
        let i = {};
        return Array.from(t)
          .map(ae((e, t) => (i[e] = t)))
          .filter(ce)
          .map(
            (function (e, t) {
              return ({ name: n, value: i }) => {
                let s = n.match(de()),
                  r = n.match(/:([a-zA-Z0-9\-:]+)/),
                  a = n.match(/\.[^.\]]+(?=[^\]]*$)/g) || [],
                  o = t || e[n] || n;
                return {
                  type: s ? s[1] : null,
                  value: r ? r[1] : null,
                  modifiers: a.map((e) => e.replace(".", "")),
                  expression: i,
                  original: o,
                };
              };
            })(i, n)
          )
          .sort(pe)
          .map((t) =>
            (function (e, t) {
              let n = Q[t.type] || (() => {}),
                i = [],
                [a, o] = (function (e) {
                  let t = () => {};
                  return [
                    (n) => {
                      let i = s(n);
                      e._x_effects ||
                        ((e._x_effects = new Set()),
                        (e._x_runEffects = () => {
                          e._x_effects.forEach((e) => e());
                        })),
                        e._x_effects.add(i),
                        (t = () => {
                          void 0 !== i && (e._x_effects.delete(i), r(i));
                        });
                    },
                    () => {
                      t();
                    },
                  ];
                })(e);
              i.push(o);
              let l = {
                  Alpine: Ve,
                  effect: a,
                  cleanup: (e) => i.push(e),
                  evaluateLater: q.bind(q, e),
                  evaluate: W.bind(W, e),
                },
                c = () => i.forEach((e) => e());
              !(function (e, t, n) {
                e._x_attributeCleanups || (e._x_attributeCleanups = {}),
                  e._x_attributeCleanups[t] || (e._x_attributeCleanups[t] = []),
                  e._x_attributeCleanups[t].push(n);
              })(e, t.original, c);
              let d = () => {
                e._x_ignore ||
                  e._x_ignoreSelf ||
                  (n.inline && n.inline(e, t, l),
                  (n = n.bind(n, e, t, l)),
                  ne ? ie.get(se).push(n) : n());
              };
              return (d.runCleanups = c), d;
            })(e, t)
          );
      }
      var ne = !1,
        ie = new Map(),
        se = Symbol(),
        re =
          (e, t) =>
          ({ name: n, value: i }) => (
            n.startsWith(e) && (n = n.replace(e, t)), { name: n, value: i }
          );
      function ae(e = () => {}) {
        return ({ name: t, value: n }) => {
          let { name: i, value: s } = oe.reduce((e, t) => t(e), {
            name: t,
            value: n,
          });
          return i !== t && e(i, t), { name: i, value: s };
        };
      }
      var oe = [];
      function le(e) {
        oe.push(e);
      }
      function ce({ name: e }) {
        return de().test(e);
      }
      var de = () => new RegExp(`^${J}([^:^.]+)\\b`),
        ue = [
          "ignore",
          "ref",
          "data",
          "bind",
          "init",
          "for",
          "model",
          "transition",
          "show",
          "if",
          "DEFAULT",
          "element",
        ];
      function pe(e, t) {
        let n = -1 === ue.indexOf(e.type) ? "DEFAULT" : e.type,
          i = -1 === ue.indexOf(t.type) ? "DEFAULT" : t.type;
        return ue.indexOf(n) - ue.indexOf(i);
      }
      function fe(e, t, n = {}) {
        e.dispatchEvent(
          new CustomEvent(t, {
            detail: n,
            bubbles: !0,
            composed: !0,
            cancelable: !0,
          })
        );
      }
      var he = [],
        me = !1;
      function ge(e) {
        he.push(e),
          queueMicrotask(() => {
            me ||
              setTimeout(() => {
                ve();
              });
          });
      }
      function ve() {
        for (me = !1; he.length; ) he.shift()();
      }
      function be(e, t) {
        if ("function" == typeof ShadowRoot && e instanceof ShadowRoot)
          return void Array.from(e.children).forEach((e) => be(e, t));
        let n = !1;
        if ((t(e, () => (n = !0)), n)) return;
        let i = e.firstElementChild;
        for (; i; ) be(i, t), (i = i.nextElementSibling);
      }
      function we(e, ...t) {
        console.warn("Alpine Warning: " + e, ...t);
      }
      var ye = [],
        xe = [];
      function _e() {
        return ye.map((e) => e());
      }
      function Ee() {
        return ye.concat(xe).map((e) => e());
      }
      function Te(e) {
        ye.push(e);
      }
      function Ce(e, t = !1) {
        if (e)
          return (t ? Ee() : _e()).some((t) => e.matches(t))
            ? e
            : e.parentElement
            ? Ce(e.parentElement, t)
            : void 0;
      }
      function Se(e, t = be) {
        !(function (e) {
          ne = !0;
          let t = Symbol();
          (se = t), ie.set(t, []);
          let n = () => {
            for (; ie.get(t).length; ) ie.get(t).shift()();
            ie.delete(t);
          };
          e(), (ne = !1), n();
        })(() => {
          t(e, (e, t) => {
            te(e, e.attributes).forEach((e) => e()), e._x_ignore && t();
          });
        });
      }
      function ke(e, t) {
        return Array.isArray(t)
          ? Me(e, t.join(" "))
          : "object" == typeof t && null !== t
          ? (function (e, t) {
              let n = (e) => e.split(" ").filter(Boolean),
                i = Object.entries(t)
                  .flatMap(([e, t]) => !!t && n(e))
                  .filter(Boolean),
                s = Object.entries(t)
                  .flatMap(([e, t]) => !t && n(e))
                  .filter(Boolean),
                r = [],
                a = [];
              return (
                s.forEach((t) => {
                  e.classList.contains(t) && (e.classList.remove(t), a.push(t));
                }),
                i.forEach((t) => {
                  e.classList.contains(t) || (e.classList.add(t), r.push(t));
                }),
                () => {
                  a.forEach((t) => e.classList.add(t)),
                    r.forEach((t) => e.classList.remove(t));
                }
              );
            })(e, t)
          : "function" == typeof t
          ? ke(e, t())
          : Me(e, t);
      }
      function Me(e, t) {
        return (
          (t = !0 === t ? (t = "") : t || ""),
          (n = t
            .split(" ")
            .filter((t) => !e.classList.contains(t))
            .filter(Boolean)),
          e.classList.add(...n),
          () => {
            e.classList.remove(...n);
          }
        );
        var n;
      }
      function Oe(e, t) {
        return "object" == typeof t && null !== t
          ? (function (e, t) {
              let n = {};
              return (
                Object.entries(t).forEach(([t, i]) => {
                  (n[t] = e.style[t]),
                    e.style.setProperty(
                      t.replace(/([a-z])([A-Z])/g, "$1-$2").toLowerCase(),
                      i
                    );
                }),
                setTimeout(() => {
                  0 === e.style.length && e.removeAttribute("style");
                }),
                () => {
                  Oe(e, n);
                }
              );
            })(e, t)
          : (function (e, t) {
              let n = e.getAttribute("style", t);
              return (
                e.setAttribute("style", t),
                () => {
                  e.setAttribute("style", n);
                }
              );
            })(e, t);
      }
      function Ae(e, t = () => {}) {
        let n = !1;
        return function () {
          n ? t.apply(this, arguments) : ((n = !0), e.apply(this, arguments));
        };
      }
      function Le(e, t, n = {}) {
        e._x_transition ||
          (e._x_transition = {
            enter: { during: n, start: n, end: n },
            leave: { during: n, start: n, end: n },
            in(n = () => {}, i = () => {}) {
              Pe(
                e,
                t,
                {
                  during: this.enter.during,
                  start: this.enter.start,
                  end: this.enter.end,
                },
                n,
                i
              );
            },
            out(n = () => {}, i = () => {}) {
              Pe(
                e,
                t,
                {
                  during: this.leave.during,
                  start: this.leave.start,
                  end: this.leave.end,
                },
                n,
                i
              );
            },
          });
      }
      function Pe(
        e,
        t,
        { during: n, start: i, end: s } = {},
        r = () => {},
        a = () => {}
      ) {
        if (
          (e._x_transitioning && e._x_transitioning.cancel(),
          0 === Object.keys(n).length &&
            0 === Object.keys(i).length &&
            0 === Object.keys(s).length)
        )
          return r(), void a();
        let o, l, c;
        !(function (e, t) {
          let n,
            i,
            s,
            r = Ae(() => {
              I(() => {
                (n = !0),
                  i || t.before(),
                  s || (t.end(), ve()),
                  t.after(),
                  e.isConnected && t.cleanup(),
                  delete e._x_transitioning;
              });
            });
          (e._x_transitioning = {
            beforeCancels: [],
            beforeCancel(e) {
              this.beforeCancels.push(e);
            },
            cancel: Ae(function () {
              for (; this.beforeCancels.length; ) this.beforeCancels.shift()();
              r();
            }),
            finish: r,
          }),
            I(() => {
              t.start(), t.during();
            }),
            (me = !0),
            requestAnimationFrame(() => {
              if (n) return;
              let r =
                  1e3 *
                  Number(
                    getComputedStyle(e)
                      .transitionDuration.replace(/,.*/, "")
                      .replace("s", "")
                  ),
                a =
                  1e3 *
                  Number(
                    getComputedStyle(e)
                      .transitionDelay.replace(/,.*/, "")
                      .replace("s", "")
                  );
              0 === r &&
                (r =
                  1e3 *
                  Number(
                    getComputedStyle(e).animationDuration.replace("s", "")
                  )),
                I(() => {
                  t.before();
                }),
                (i = !0),
                requestAnimationFrame(() => {
                  n ||
                    (I(() => {
                      t.end();
                    }),
                    ve(),
                    setTimeout(e._x_transitioning.finish, r + a),
                    (s = !0));
                });
            });
        })(e, {
          start() {
            o = t(e, i);
          },
          during() {
            l = t(e, n);
          },
          before: r,
          end() {
            o(), (c = t(e, s));
          },
          after: a,
          cleanup() {
            l(), c();
          },
        });
      }
      function Ie(e, t, n) {
        if (-1 === e.indexOf(t)) return n;
        const i = e[e.indexOf(t) + 1];
        if (!i) return n;
        if ("scale" === t && isNaN(i)) return n;
        if ("duration" === t) {
          let e = i.match(/([0-9]+)ms/);
          if (e) return e[1];
        }
        return "origin" === t &&
          ["top", "right", "left", "center", "bottom"].includes(
            e[e.indexOf(t) + 2]
          )
          ? [i, e[e.indexOf(t) + 2]].join(" ")
          : i;
      }
      function $e(e, t) {
        var n;
        return function () {
          var i = this,
            s = arguments;
          clearTimeout(n),
            (n = setTimeout(function () {
              (n = null), e.apply(i, s);
            }, t));
        };
      }
      function ze(e, t) {
        let n;
        return function () {
          let i = arguments;
          n || (e.apply(this, i), (n = !0), setTimeout(() => (n = !1), t));
        };
      }
      ee(
        "transition",
        (e, { value: t, modifiers: n, expression: i }, { evaluate: s }) => {
          "function" == typeof i && (i = s(i)),
            i
              ? (function (e, t, n) {
                  Le(e, ke, ""),
                    {
                      enter: (t) => {
                        e._x_transition.enter.during = t;
                      },
                      "enter-start": (t) => {
                        e._x_transition.enter.start = t;
                      },
                      "enter-end": (t) => {
                        e._x_transition.enter.end = t;
                      },
                      leave: (t) => {
                        e._x_transition.leave.during = t;
                      },
                      "leave-start": (t) => {
                        e._x_transition.leave.start = t;
                      },
                      "leave-end": (t) => {
                        e._x_transition.leave.end = t;
                      },
                    }[n](t);
                })(e, i, t)
              : (function (e, t, n) {
                  Le(e, Oe);
                  let i = !t.includes("in") && !t.includes("out") && !n,
                    s = i || t.includes("in") || ["enter"].includes(n),
                    r = i || t.includes("out") || ["leave"].includes(n);
                  t.includes("in") &&
                    !i &&
                    (t = t.filter((e, n) => n < t.indexOf("out"))),
                    t.includes("out") &&
                      !i &&
                      (t = t.filter((e, n) => n > t.indexOf("out")));
                  let a = !t.includes("opacity") && !t.includes("scale"),
                    o = a || t.includes("opacity") ? 0 : 1,
                    l = a || t.includes("scale") ? Ie(t, "scale", 95) / 100 : 1,
                    c = Ie(t, "delay", 0),
                    d = Ie(t, "origin", "center"),
                    u = Ie(t, "duration", 150) / 1e3,
                    p = Ie(t, "duration", 75) / 1e3,
                    f = "cubic-bezier(0.4, 0.0, 0.2, 1)";
                  s &&
                    ((e._x_transition.enter.during = {
                      transformOrigin: d,
                      transitionDelay: c,
                      transitionProperty: "opacity, transform",
                      transitionDuration: u + "s",
                      transitionTimingFunction: f,
                    }),
                    (e._x_transition.enter.start = {
                      opacity: o,
                      transform: `scale(${l})`,
                    }),
                    (e._x_transition.enter.end = {
                      opacity: 1,
                      transform: "scale(1)",
                    })),
                    r &&
                      ((e._x_transition.leave.during = {
                        transformOrigin: d,
                        transitionDelay: c,
                        transitionProperty: "opacity, transform",
                        transitionDuration: p + "s",
                        transitionTimingFunction: f,
                      }),
                      (e._x_transition.leave.start = {
                        opacity: 1,
                        transform: "scale(1)",
                      }),
                      (e._x_transition.leave.end = {
                        opacity: o,
                        transform: `scale(${l})`,
                      }));
                })(e, n, t);
        }
      ),
        (window.Element.prototype._x_toggleAndCascadeWithTransitions =
          function (e, t, n, i) {
            t
              ? e._x_transition
                ? e._x_transition.in(n)
                : "visible" === document.visibilityState
                ? requestAnimationFrame(n)
                : setTimeout(n)
              : ((e._x_hidePromise = e._x_transition
                  ? new Promise((t, n) => {
                      e._x_transition.out(
                        () => {},
                        () => t(i)
                      ),
                        e._x_transitioning.beforeCancel(() =>
                          n({ isFromCancelledTransition: !0 })
                        );
                    })
                  : Promise.resolve(i)),
                queueMicrotask(() => {
                  let t = (function e(t) {
                    let n = t.parentNode;
                    if (n) return n._x_hidePromise ? n : e(n);
                  })(e);
                  t
                    ? (t._x_hideChildren || (t._x_hideChildren = []),
                      t._x_hideChildren.push(e))
                    : queueMicrotask(() => {
                        let t = (e) => {
                          let n = Promise.all([
                            e._x_hidePromise,
                            ...(e._x_hideChildren || []).map(t),
                          ]).then(([e]) => e());
                          return (
                            delete e._x_hidePromise, delete e._x_hideChildren, n
                          );
                        };
                        t(e).catch((e) => {
                          if (!e.isFromCancelledTransition) throw e;
                        });
                      });
                }));
          });
      var Ne = {},
        Re = !1,
        De = !1;
      function je(e) {
        return (...t) => De || e(...t);
      }
      var Be = {},
        Ve = {
          get reactive() {
            return i;
          },
          get release() {
            return r;
          },
          get effect() {
            return s;
          },
          get raw() {
            return a;
          },
          version: "3.4.2",
          flushAndStopDeferringMutations: function () {
            ($ = !1), N(z), (z = []);
          },
          disableEffectScheduling: function (e) {
            (_ = !1), e(), (_ = !0);
          },
          setReactivityEngine: function (e) {
            (i = e.reactive),
              (r = e.release),
              (s = (t) =>
                e.effect(t, {
                  scheduler: (e) => {
                    _
                      ? (function (e) {
                          !(function (e) {
                            y.includes(e) || y.push(e),
                              w || b || ((b = !0), queueMicrotask(x));
                          })(e);
                        })(e)
                      : e();
                  },
                })),
              (a = e.raw);
          },
          addRootSelector: Te,
          deferMutations: function () {
            $ = !0;
          },
          mapAttributes: le,
          evaluateLater: q,
          setEvaluator: function (e) {
            Y = e;
          },
          closestRoot: Ce,
          interceptor: V,
          transition: Pe,
          setStyles: Oe,
          mutateDom: I,
          directive: ee,
          throttle: ze,
          debounce: $e,
          evaluate: W,
          initTree: Se,
          nextTick: ge,
          prefix: function (e) {
            J = e;
          },
          plugin: function (e) {
            e(Ve);
          },
          magic: G,
          store: function (e, t) {
            if ((Re || ((Ne = i(Ne)), (Re = !0)), void 0 === t)) return Ne[e];
            (Ne[e] = t),
              "object" == typeof t &&
                null !== t &&
                t.hasOwnProperty("init") &&
                "function" == typeof t.init &&
                Ne[e].init();
          },
          start: function () {
            var e;
            document.body ||
              we(
                "Unable to initialize. Trying to load Alpine before `<body>` is available. Did you forget to add `defer` in Alpine's `<script>` tag?"
              ),
              fe(document, "alpine:init"),
              fe(document, "alpine:initializing"),
              A(),
              (e = (e) => Se(e, be)),
              S.push(e),
              C.push((e) =>
                ge(() => {
                  be(e, (e) => k(e));
                })
              ),
              T.push((e, t) => {
                te(e, t).forEach((e) => e());
              }),
              Array.from(document.querySelectorAll(Ee()))
                .filter((e) => !Ce(e.parentElement, !0))
                .forEach((e) => {
                  Se(e);
                }),
              fe(document, "alpine:initialized");
          },
          clone: function (e, t) {
            (t._x_dataStack = e._x_dataStack),
              (De = !0),
              (function (e) {
                let t = s;
                E((e, n) => {
                  let i = t(e);
                  return r(i), () => {};
                }),
                  e(),
                  E(t);
              })(() => {
                !(function (e) {
                  let t = !1;
                  Se(e, (e, n) => {
                    be(e, (e, i) => {
                      if (
                        t &&
                        (function (e) {
                          return _e().some((t) => e.matches(t));
                        })(e)
                      )
                        return i();
                      (t = !0), n(e, i);
                    });
                  });
                })(t);
              }),
              (De = !1);
          },
          data: function (e, t) {
            Be[e] = t;
          },
        },
        Fe = ((e) => {
          return ((e, t, n) => {
            if ((t && "object" == typeof t) || "function" == typeof t)
              for (let i of u(t))
                d.call(e, i) ||
                  "default" === i ||
                  l(e, i, {
                    get: () => t[i],
                    enumerable: !(n = p(t, i)) || n.enumerable,
                  });
            return e;
          })(
            ((t = l(
              null != e ? o(c(e)) : {},
              "default",
              e && e.__esModule && "default" in e
                ? { get: () => e.default, enumerable: !0 }
                : { value: e, enumerable: !0 }
            )),
            l(t, "__esModule", { value: !0 })),
            e
          );
          var t;
        })(v());
      G("nextTick", () => ge),
        G("dispatch", (e) => fe.bind(fe, e)),
        G("watch", (e) => (t, n) => {
          let i,
            r = q(e, t),
            a = !0;
          s(() =>
            r((e) => {
              (document.createElement("div").dataset.throwAway = e),
                a
                  ? (i = e)
                  : queueMicrotask(() => {
                      n(e, i), (i = e);
                    }),
                (a = !1);
            })
          );
        }),
        G("store", function () {
          return Ne;
        }),
        G("root", (e) => Ce(e)),
        G(
          "refs",
          (e) => (
            e._x_refs_proxy ||
              (e._x_refs_proxy = B(
                (function (e) {
                  let t = [],
                    n = e;
                  for (; n; )
                    n._x_refs && t.push(n._x_refs), (n = n.parentNode);
                  return t;
                })(e)
              )),
            e._x_refs_proxy
          )
        ),
        G("el", (e) => e);
      var Ge,
        He = () => {};
      function We(e, t, n, s = []) {
        switch (
          (e._x_bindings || (e._x_bindings = i({})),
          (e._x_bindings[t] = n),
          (t = s.includes("camel")
            ? t.toLowerCase().replace(/-(\w)/g, (e, t) => t.toUpperCase())
            : t))
        ) {
          case "value":
            !(function (e, t) {
              if ("radio" === e.type)
                void 0 === e.attributes.value && (e.value = t),
                  window.fromModel && (e.checked = qe(e.value, t));
              else if ("checkbox" === e.type)
                Number.isInteger(t)
                  ? (e.value = t)
                  : Number.isInteger(t) ||
                    Array.isArray(t) ||
                    "boolean" == typeof t ||
                    [null, void 0].includes(t)
                  ? Array.isArray(t)
                    ? (e.checked = t.some((t) => qe(t, e.value)))
                    : (e.checked = !!t)
                  : (e.value = String(t));
              else if ("SELECT" === e.tagName)
                !(function (e, t) {
                  const n = [].concat(t).map((e) => e + "");
                  Array.from(e.options).forEach((e) => {
                    e.selected = n.includes(e.value);
                  });
                })(e, t);
              else {
                if (e.value === t) return;
                e.value = t;
              }
            })(e, n);
            break;
          case "style":
            !(function (e, t) {
              e._x_undoAddedStyles && e._x_undoAddedStyles(),
                (e._x_undoAddedStyles = Oe(e, t));
            })(e, n);
            break;
          case "class":
            !(function (e, t) {
              e._x_undoAddedClasses && e._x_undoAddedClasses(),
                (e._x_undoAddedClasses = ke(e, t));
            })(e, n);
            break;
          default:
            !(function (e, t, n) {
              [null, void 0, !1].includes(n) &&
              !["aria-pressed", "aria-checked", "aria-expanded"].includes(t)
                ? e.removeAttribute(t)
                : ([
                    "disabled",
                    "checked",
                    "required",
                    "readonly",
                    "hidden",
                    "open",
                    "selected",
                    "autofocus",
                    "itemscope",
                    "multiple",
                    "novalidate",
                    "allowfullscreen",
                    "allowpaymentrequest",
                    "formnovalidate",
                    "autoplay",
                    "controls",
                    "loop",
                    "muted",
                    "playsinline",
                    "default",
                    "ismap",
                    "reversed",
                    "async",
                    "defer",
                    "nomodule",
                  ].includes(t) && (n = t),
                  (function (e, t, n) {
                    e.getAttribute(t) != n && e.setAttribute(t, n);
                  })(e, t, n));
            })(e, t, n);
        }
      }
      function qe(e, t) {
        return e == t;
      }
      function Ye(e, t, n, i) {
        let s = e,
          r = (e) => i(e),
          a = {},
          o = (e, t) => (n) => t(e, n);
        if (
          (n.includes("dot") && (t = t.replace(/-/g, ".")),
          n.includes("camel") &&
            (t = t.toLowerCase().replace(/-(\w)/g, (e, t) => t.toUpperCase())),
          n.includes("passive") && (a.passive = !0),
          n.includes("capture") && (a.capture = !0),
          n.includes("window") && (s = window),
          n.includes("document") && (s = document),
          n.includes("prevent") &&
            (r = o(r, (e, t) => {
              t.preventDefault(), e(t);
            })),
          n.includes("stop") &&
            (r = o(r, (e, t) => {
              t.stopPropagation(), e(t);
            })),
          n.includes("self") &&
            (r = o(r, (t, n) => {
              n.target === e && t(n);
            })),
          (n.includes("away") || n.includes("outside")) &&
            ((s = document),
            (r = o(r, (t, n) => {
              e.contains(n.target) ||
                (e.offsetWidth < 1 && e.offsetHeight < 1) ||
                t(n);
            }))),
          (r = o(r, (e, i) => {
            ((function (e) {
              return ["keydown", "keyup"].includes(t);
            })() &&
              (function (e, t) {
                let n = t.filter(
                  (e) =>
                    !["window", "document", "prevent", "stop", "once"].includes(
                      e
                    )
                );
                if (n.includes("debounce")) {
                  let e = n.indexOf("debounce");
                  n.splice(
                    e,
                    Ue((n[e + 1] || "invalid-wait").split("ms")[0]) ? 2 : 1
                  );
                }
                if (0 === n.length) return !1;
                if (1 === n.length && Xe(e.key).includes(n[0])) return !1;
                const i = [
                  "ctrl",
                  "shift",
                  "alt",
                  "meta",
                  "cmd",
                  "super",
                ].filter((e) => n.includes(e));
                return (
                  (n = n.filter((e) => !i.includes(e))),
                  !(
                    i.length > 0 &&
                    i.filter(
                      (t) => (
                        ("cmd" !== t && "super" !== t) || (t = "meta"),
                        e[t + "Key"]
                      )
                    ).length === i.length &&
                    Xe(e.key).includes(n[0])
                  )
                );
              })(i, n)) ||
              e(i);
          })),
          n.includes("debounce"))
        ) {
          let e = n[n.indexOf("debounce") + 1] || "invalid-wait",
            t = Ue(e.split("ms")[0]) ? Number(e.split("ms")[0]) : 250;
          r = $e(r, t);
        }
        if (n.includes("throttle")) {
          let e = n[n.indexOf("throttle") + 1] || "invalid-wait",
            t = Ue(e.split("ms")[0]) ? Number(e.split("ms")[0]) : 250;
          r = ze(r, t);
        }
        return (
          n.includes("once") &&
            (r = o(r, (e, n) => {
              e(n), s.removeEventListener(t, r, a);
            })),
          s.addEventListener(t, r, a),
          () => {
            s.removeEventListener(t, r, a);
          }
        );
      }
      function Ue(e) {
        return !Array.isArray(e) && !isNaN(e);
      }
      function Xe(e) {
        if (!e) return [];
        e = e
          .replace(/([a-z])([A-Z])/g, "$1-$2")
          .replace(/[_\s]/, "-")
          .toLowerCase();
        let t = {
          ctrl: "control",
          slash: "/",
          space: "-",
          spacebar: "-",
          cmd: "meta",
          esc: "escape",
          up: "arrow-up",
          down: "arrow-down",
          left: "arrow-left",
          right: "arrow-right",
          period: ".",
          equal: "=",
        };
        return (
          (t[e] = e),
          Object.keys(t)
            .map((n) => {
              if (t[n] === e) return n;
            })
            .filter((e) => e)
        );
      }
      function Ke(e) {
        let t = e ? parseFloat(e) : null;
        return (n = t), Array.isArray(n) || isNaN(n) ? e : t;
        var n;
      }
      function Je(e, t, n, i) {
        let s = {};
        return (
          /^\[.*\]$/.test(e.item) && Array.isArray(t)
            ? e.item
                .replace("[", "")
                .replace("]", "")
                .split(",")
                .map((e) => e.trim())
                .forEach((e, n) => {
                  s[e] = t[n];
                })
            : /^\{.*\}$/.test(e.item) &&
              !Array.isArray(t) &&
              "object" == typeof t
            ? e.item
                .replace("{", "")
                .replace("}", "")
                .split(",")
                .map((e) => e.trim())
                .forEach((e) => {
                  s[e] = t[e];
                })
            : (s[e.item] = t),
          e.index && (s[e.index] = n),
          e.collection && (s[e.collection] = i),
          s
        );
      }
      function Ze() {}
      (He.inline = (e, { modifiers: t }, { cleanup: n }) => {
        t.includes("self") ? (e._x_ignoreSelf = !0) : (e._x_ignore = !0),
          n(() => {
            t.includes("self") ? delete e._x_ignoreSelf : delete e._x_ignore;
          });
      }),
        ee("ignore", He),
        ee("effect", (e, { expression: t }, { effect: n }) => n(q(e, t))),
        ee(
          "model",
          (e, { modifiers: t, expression: n }, { effect: i, cleanup: s }) => {
            let r = q(e, n),
              a = q(e, `${n} = rightSideOfExpression($event, ${n})`);
            var o =
              "select" === e.tagName.toLowerCase() ||
              ["checkbox", "radio"].includes(e.type) ||
              t.includes("lazy")
                ? "change"
                : "input";
            let l = (function (e, t, n) {
                return (
                  "radio" === e.type &&
                    I(() => {
                      e.hasAttribute("name") || e.setAttribute("name", n);
                    }),
                  (n, i) =>
                    I(() => {
                      if (n instanceof CustomEvent && void 0 !== n.detail)
                        return n.detail || n.target.value;
                      if ("checkbox" === e.type) {
                        if (Array.isArray(i)) {
                          let e = t.includes("number")
                            ? Ke(n.target.value)
                            : n.target.value;
                          return n.target.checked
                            ? i.concat([e])
                            : i.filter((t) => !(t == e));
                        }
                        return n.target.checked;
                      }
                      if ("select" === e.tagName.toLowerCase() && e.multiple)
                        return t.includes("number")
                          ? Array.from(n.target.selectedOptions).map((e) =>
                              Ke(e.value || e.text)
                            )
                          : Array.from(n.target.selectedOptions).map(
                              (e) => e.value || e.text
                            );
                      {
                        let e = n.target.value;
                        return t.includes("number")
                          ? Ke(e)
                          : t.includes("trim")
                          ? e.trim()
                          : e;
                      }
                    })
                );
              })(e, t, n),
              c = Ye(e, o, t, (e) => {
                a(() => {}, { scope: { $event: e, rightSideOfExpression: l } });
              });
            s(() => c()),
              (e._x_forceModelUpdate = () => {
                r((t) => {
                  void 0 === t && n.match(/\./) && (t = ""),
                    (window.fromModel = !0),
                    I(() => We(e, "value", t)),
                    delete window.fromModel;
                });
              }),
              i(() => {
                (t.includes("unintrusive") &&
                  document.activeElement.isSameNode(e)) ||
                  e._x_forceModelUpdate();
              });
          }
        ),
        ee("cloak", (e) =>
          queueMicrotask(() => I(() => e.removeAttribute(Z("cloak"))))
        ),
        (Ge = () => `[${Z("init")}]`),
        xe.push(Ge),
        ee(
          "init",
          je((e, { expression: t }) =>
            "string" == typeof t ? !!t.trim() && W(e, t, {}) : W(e, t, {})
          )
        ),
        ee("text", (e, { expression: t }, { effect: n, evaluateLater: i }) => {
          let s = i(t);
          n(() => {
            s((t) => {
              I(() => {
                e.textContent = t;
              });
            });
          });
        }),
        ee("html", (e, { expression: t }, { effect: n, evaluateLater: i }) => {
          let s = i(t);
          n(() => {
            s((t) => {
              e.innerHTML = t;
            });
          });
        }),
        le(re(":", Z("bind:"))),
        ee(
          "bind",
          (
            e,
            { value: t, modifiers: n, expression: i, original: s },
            { effect: r }
          ) => {
            if (!t)
              return (function (e, t, n, i) {
                let s = q(e, t),
                  r = [];
                i(() => {
                  for (; r.length; ) r.pop()();
                  s((t) => {
                    let i = Object.entries(t).map(([e, t]) => ({
                      name: e,
                      value: t,
                    }));
                    (function (e) {
                      return Array.from(e)
                        .map(ae())
                        .filter((e) => !ce(e));
                    })(i).forEach(({ name: e, value: t }, n) => {
                      i[n] = { name: "x-bind:" + e, value: `"${t}"` };
                    }),
                      te(e, i, n).map((e) => {
                        r.push(e.runCleanups), e();
                      });
                  });
                });
              })(e, i, s, r);
            if ("key" === t)
              return (function (e, t) {
                e._x_keyExpression = t;
              })(e, i);
            let a = q(e, i);
            r(() =>
              a((s) => {
                void 0 === s && i.match(/\./) && (s = ""),
                  I(() => We(e, t, s, n));
              })
            );
          }
        ),
        Te(() => `[${Z("data")}]`),
        ee(
          "data",
          je((e, { expression: t }, { cleanup: n }) => {
            t = "" === t ? "{}" : t;
            let s = {};
            H(s, e);
            let r = {};
            var a, o;
            (a = r),
              (o = s),
              Object.entries(Be).forEach(([e, t]) => {
                Object.defineProperty(a, e, {
                  get:
                    () =>
                    (...e) =>
                      t.bind(o)(...e),
                  enumerable: !1,
                });
              });
            let l = W(e, t, { scope: r });
            H(l, e);
            let c = i(l);
            !(function (e) {
              let t = (n, i = "") => {
                Object.entries(n).forEach(([s, r]) => {
                  let a = "" === i ? s : `${i}.${s}`;
                  var o;
                  "object" == typeof r && null !== r && r._x_interceptor
                    ? (n[s] = r.initialize(e, a, s))
                    : "object" != typeof (o = r) ||
                      Array.isArray(o) ||
                      null === o ||
                      r === n ||
                      r instanceof Element ||
                      t(r, a);
                });
              };
              t(e);
            })(c);
            let d = R(e, c);
            c.init && W(e, c.init),
              n(() => {
                d(), c.destroy && W(e, c.destroy);
              });
          })
        ),
        ee("show", (e, { modifiers: t, expression: n }, { effect: i }) => {
          let s,
            r = q(e, n),
            a = () =>
              I(() => {
                (e.style.display = "none"), (e._x_isShown = !1);
              }),
            o = () =>
              I(() => {
                1 === e.style.length && "none" === e.style.display
                  ? e.removeAttribute("style")
                  : e.style.removeProperty("display"),
                  (e._x_isShown = !0);
              }),
            l = () => setTimeout(o),
            c = Ae(
              (e) => (e ? o() : a()),
              (t) => {
                "function" == typeof e._x_toggleAndCascadeWithTransitions
                  ? e._x_toggleAndCascadeWithTransitions(e, t, o, a)
                  : t
                  ? l()
                  : a();
              }
            ),
            d = !0;
          i(() =>
            r((e) => {
              (d || e !== s) &&
                (t.includes("immediate") && (e ? l() : a()),
                c(e),
                (s = e),
                (d = !1));
            })
          );
        }),
        ee("for", (e, { expression: t }, { effect: n, cleanup: s }) => {
          let r = (function (e) {
              let t = /,([^,\}\]]*)(?:,([^,\}\]]*))?$/,
                n = e.match(/([\s\S]*?)\s+(?:in|of)\s+([\s\S]*)/);
              if (!n) return;
              let i = {};
              i.items = n[2].trim();
              let s = n[1].replace(/^\s*\(|\)\s*$/g, "").trim(),
                r = s.match(t);
              return (
                r
                  ? ((i.item = s.replace(t, "").trim()),
                    (i.index = r[1].trim()),
                    r[2] && (i.collection = r[2].trim()))
                  : (i.item = s),
                i
              );
            })(t),
            a = q(e, r.items),
            o = q(e, e._x_keyExpression || "index");
          (e._x_prevKeys = []),
            (e._x_lookup = {}),
            n(() =>
              (function (e, t, n, s) {
                let r = e;
                a((n) => {
                  var a;
                  (a = n),
                    !Array.isArray(a) &&
                      !isNaN(a) &&
                      n >= 0 &&
                      (n = Array.from(Array(n).keys(), (e) => e + 1)),
                    void 0 === n && (n = []);
                  let o = e._x_lookup,
                    l = e._x_prevKeys,
                    c = [],
                    d = [];
                  if ("object" != typeof (u = n) || Array.isArray(u))
                    for (let e = 0; e < n.length; e++) {
                      let i = Je(t, n[e], e, n);
                      s((e) => d.push(e), { scope: { index: e, ...i } }),
                        c.push(i);
                    }
                  else
                    n = Object.entries(n).map(([e, i]) => {
                      let r = Je(t, i, e, n);
                      s((e) => d.push(e), { scope: { index: e, ...r } }),
                        c.push(r);
                    });
                  var u;
                  let p = [],
                    f = [],
                    h = [],
                    m = [];
                  for (let e = 0; e < l.length; e++) {
                    let t = l[e];
                    -1 === d.indexOf(t) && h.push(t);
                  }
                  l = l.filter((e) => !h.includes(e));
                  let g = "template";
                  for (let e = 0; e < d.length; e++) {
                    let t = d[e],
                      n = l.indexOf(t);
                    if (-1 === n) l.splice(e, 0, t), p.push([g, e]);
                    else if (n !== e) {
                      let t = l.splice(e, 1)[0],
                        i = l.splice(n - 1, 1)[0];
                      l.splice(e, 0, i), l.splice(n, 0, t), f.push([t, i]);
                    } else m.push(t);
                    g = t;
                  }
                  for (let e = 0; e < h.length; e++) {
                    let t = h[e];
                    o[t].remove(), (o[t] = null), delete o[t];
                  }
                  for (let e = 0; e < f.length; e++) {
                    let [t, n] = f[e],
                      i = o[t],
                      s = o[n],
                      r = document.createElement("div");
                    I(() => {
                      s.after(r), i.after(s), r.before(i), r.remove();
                    }),
                      D(s, c[d.indexOf(n)]);
                  }
                  for (let e = 0; e < p.length; e++) {
                    let [t, n] = p[e],
                      s = "template" === t ? r : o[t],
                      a = c[n],
                      l = d[n],
                      u = document.importNode(r.content, !0).firstElementChild;
                    R(u, i(a), r),
                      I(() => {
                        s.after(u), Se(u);
                      }),
                      "object" == typeof l &&
                        we(
                          "x-for key cannot be an object, it must be a string or an integer",
                          r
                        ),
                      (o[l] = u);
                  }
                  for (let e = 0; e < m.length; e++)
                    D(o[m[e]], c[d.indexOf(m[e])]);
                  r._x_prevKeys = d;
                });
              })(e, r, 0, o)
            ),
            s(() => {
              Object.values(e._x_lookup).forEach((e) => e.remove()),
                delete e._x_prevKeys,
                delete e._x_lookup;
            });
        }),
        (Ze.inline = (e, { expression: t }, { cleanup: n }) => {
          let i = Ce(e);
          i._x_refs || (i._x_refs = {}),
            (i._x_refs[t] = e),
            n(() => delete i._x_refs[t]);
        }),
        ee("ref", Ze),
        ee("if", (e, { expression: t }, { effect: n, cleanup: i }) => {
          let s = q(e, t);
          n(() =>
            s((t) => {
              t
                ? (() => {
                    if (e._x_currentIfEl) return e._x_currentIfEl;
                    let t = e.content.cloneNode(!0).firstElementChild;
                    R(t, {}, e),
                      I(() => {
                        e.after(t), Se(t);
                      }),
                      (e._x_currentIfEl = t),
                      (e._x_undoIf = () => {
                        t.remove(), delete e._x_currentIfEl;
                      });
                  })()
                : e._x_undoIf && (e._x_undoIf(), delete e._x_undoIf);
            })
          ),
            i(() => e._x_undoIf && e._x_undoIf());
        }),
        le(re("@", Z("on:"))),
        ee(
          "on",
          je((e, { value: t, modifiers: n, expression: i }, { cleanup: s }) => {
            let r = i ? q(e, i) : () => {},
              a = Ye(e, t, n, (e) => {
                r(() => {}, { scope: { $event: e }, params: [e] });
              });
            s(() => a());
          })
        ),
        Ve.setEvaluator(U),
        Ve.setReactivityEngine({
          reactive: Fe.reactive,
          effect: Fe.effect,
          release: Fe.stop,
          raw: Fe.toRaw,
        });
      var Qe = Ve;
    }).call(this, n(4));
  },
  function (e, t, n) {
    var i, s, r;
    (r = function () {
      function e() {
        for (var e = 0, t = {}; e < arguments.length; e++) {
          var n = arguments[e];
          for (var i in n) t[i] = n[i];
        }
        return t;
      }
      function t(e) {
        return e.replace(/(%[0-9A-Z]{2})+/g, decodeURIComponent);
      }
      return (function n(i) {
        function s() {}
        function r(t, n, r) {
          if ("undefined" != typeof document) {
            "number" == typeof (r = e({ path: "/" }, s.defaults, r)).expires &&
              (r.expires = new Date(1 * new Date() + 864e5 * r.expires)),
              (r.expires = r.expires ? r.expires.toUTCString() : "");
            try {
              var a = JSON.stringify(n);
              /^[\{\[]/.test(a) && (n = a);
            } catch (e) {}
            (n = i.write
              ? i.write(n, t)
              : encodeURIComponent(String(n)).replace(
                  /%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,
                  decodeURIComponent
                )),
              (t = encodeURIComponent(String(t))
                .replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent)
                .replace(/[\(\)]/g, escape));
            var o = "";
            for (var l in r)
              r[l] &&
                ((o += "; " + l),
                !0 !== r[l] && (o += "=" + r[l].split(";")[0]));
            return (document.cookie = t + "=" + n + o);
          }
        }
        function a(e, n) {
          if ("undefined" != typeof document) {
            for (
              var s = {},
                r = document.cookie ? document.cookie.split("; ") : [],
                a = 0;
              a < r.length;
              a++
            ) {
              var o = r[a].split("="),
                l = o.slice(1).join("=");
              n || '"' !== l.charAt(0) || (l = l.slice(1, -1));
              try {
                var c = t(o[0]);
                if (((l = (i.read || i)(l, c) || t(l)), n))
                  try {
                    l = JSON.parse(l);
                  } catch (e) {}
                if (((s[c] = l), e === c)) break;
              } catch (e) {}
            }
            return e ? s[e] : s;
          }
        }
        return (
          (s.set = r),
          (s.get = function (e) {
            return a(e, !1);
          }),
          (s.getJSON = function (e) {
            return a(e, !0);
          }),
          (s.remove = function (t, n) {
            r(t, "", e(n, { expires: -1 }));
          }),
          (s.defaults = {}),
          (s.withConverter = n),
          s
        );
      })(function () {});
    }),
      void 0 === (s = "function" == typeof (i = r) ? i.call(t, n, t, e) : i) ||
        (e.exports = s),
      (e.exports = r());
  },
  function (e, t, n) {
    var i, s;
    void 0 ===
      (s =
        "function" ==
        typeof (i =
          () =>
          ({
            selector: e,
            enter: t = () => {},
            exit: n = () => {},
            progress: i = () => {},
            offset: s = 0,
            once: r = !1,
          }) => {
            let a = null,
              o = !1,
              l = [],
              c = 0;
            function d() {
              const e = document.documentElement.clientHeight,
                t = window.innerHeight || 0;
              c = Math.max(e, t);
            }
            function u() {
              o = !1;
              const e = (function () {
                if (s && "number" == typeof s) {
                  const e = Math.min(Math.max(0, s), 1);
                  return c - e * c;
                }
                return c;
              })();
              (l = l.filter((s) => {
                const {
                    top: a,
                    bottom: o,
                    height: l,
                  } = s.getBoundingClientRect(),
                  c = a < e,
                  d = o < e;
                if (c && !s.__ev_entered) {
                  if ((t(s), (s.__ev_progress = 0), i(s, s.__ev_progress), r))
                    return !1;
                } else
                  !c &&
                    s.__ev_entered &&
                    ((s.__ev_progress = 0), i(s, s.__ev_progress), n(s));
                if (c && !d) {
                  const t = (e - a) / l;
                  (s.__ev_progress = Math.min(1, Math.max(0, t))),
                    i(s, s.__ev_progress);
                }
                return (
                  c &&
                    d &&
                    1 !== s.__ev_progress &&
                    ((s.__ev_progress = 1), i(s, s.__ev_progress)),
                  (s.__ev_entered = c),
                  !0
                );
              })).length ||
                (window.removeEventListener("scroll", p, !0),
                window.removeEventListener("resize", f, !0),
                window.removeEventListener("load", h, !0));
            }
            function p() {
              o || ((o = !0), a(u));
            }
            function f() {
              d(), u();
            }
            function h() {
              d(), u();
            }
            function m(e) {
              const t = e.length,
                n = [];
              for (let i = 0; i < t; i += 1) n.push(e[i]);
              return n;
            }
            e
              ? (l = (function (e, t = document) {
                  return "string" == typeof e
                    ? m(t.querySelectorAll(e))
                    : e instanceof NodeList
                    ? m(e)
                    : e instanceof Array
                    ? e
                    : void 0;
                })(e)) && l.length
                ? ((a =
                    window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    window.msRequestAnimationFrame ||
                    function (e) {
                      return setTimeout(e, 1e3 / 60);
                    }),
                  window.addEventListener("resize", f, !0),
                  window.addEventListener("scroll", p, !0),
                  window.addEventListener("load", h, !0),
                  f(),
                  u())
                : console.error("no selector elements found")
              : console.error("must pass a selector");
          })
          ? i.call(t, n, t, e)
          : i) || (e.exports = s);
  },
  function (e, t, n) {
    e.exports = (function () {
      "use strict";
      function e() {
        return (e =
          Object.assign ||
          function (e) {
            for (var t = 1; t < arguments.length; t++) {
              var n = arguments[t];
              for (var i in n)
                Object.prototype.hasOwnProperty.call(n, i) && (e[i] = n[i]);
            }
            return e;
          }).apply(this, arguments);
      }
      var t = "undefined" != typeof window,
        n =
          (t && !("onscroll" in window)) ||
          ("undefined" != typeof navigator &&
            /(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent)),
        i = t && "IntersectionObserver" in window,
        s = t && "classList" in document.createElement("p"),
        r = t && window.devicePixelRatio > 1,
        a = {
          elements_selector: ".lazy",
          container: n || t ? document : null,
          threshold: 300,
          thresholds: null,
          data_src: "src",
          data_srcset: "srcset",
          data_sizes: "sizes",
          data_bg: "bg",
          data_bg_hidpi: "bg-hidpi",
          data_bg_multi: "bg-multi",
          data_bg_multi_hidpi: "bg-multi-hidpi",
          data_poster: "poster",
          class_applied: "applied",
          class_loading: "loading",
          class_loaded: "loaded",
          class_error: "error",
          class_entered: "entered",
          class_exited: "exited",
          unobserve_completed: !0,
          unobserve_entered: !1,
          cancel_on_exit: !0,
          callback_enter: null,
          callback_exit: null,
          callback_applied: null,
          callback_loading: null,
          callback_loaded: null,
          callback_error: null,
          callback_finish: null,
          callback_cancel: null,
          use_native: !1,
        },
        o = function (t) {
          return e({}, a, t);
        },
        l = function (e, t) {
          var n,
            i = "LazyLoad::Initialized",
            s = new e(t);
          try {
            n = new CustomEvent(i, { detail: { instance: s } });
          } catch (e) {
            (n = document.createEvent("CustomEvent")).initCustomEvent(
              i,
              !1,
              !1,
              { instance: s }
            );
          }
          window.dispatchEvent(n);
        },
        c = "loading",
        d = "loaded",
        u = "applied",
        p = "error",
        f = "native",
        h = function (e, t) {
          return e.getAttribute("data-" + t);
        },
        m = function (e) {
          return h(e, "ll-status");
        },
        g = function (e, t) {
          return (function (e, t, n) {
            var i = "data-ll-status";
            null !== n ? e.setAttribute(i, n) : e.removeAttribute(i);
          })(e, 0, t);
        },
        v = function (e) {
          return g(e, null);
        },
        b = function (e) {
          return null === m(e);
        },
        w = function (e) {
          return m(e) === f;
        },
        y = [c, d, u, p],
        x = function (e, t, n, i) {
          e && (void 0 === i ? (void 0 === n ? e(t) : e(t, n)) : e(t, n, i));
        },
        _ = function (e, t) {
          s
            ? e.classList.add(t)
            : (e.className += (e.className ? " " : "") + t);
        },
        E = function (e, t) {
          s
            ? e.classList.remove(t)
            : (e.className = e.className
                .replace(new RegExp("(^|\\s+)" + t + "(\\s+|$)"), " ")
                .replace(/^\s+/, "")
                .replace(/\s+$/, ""));
        },
        T = function (e) {
          return e.llTempImage;
        },
        C = function (e, t) {
          if (t) {
            var n = t._observer;
            n && n.unobserve(e);
          }
        },
        S = function (e, t) {
          e && (e.loadingCount += t);
        },
        k = function (e, t) {
          e && (e.toLoadCount = t);
        },
        M = function (e) {
          for (var t, n = [], i = 0; (t = e.children[i]); i += 1)
            "SOURCE" === t.tagName && n.push(t);
          return n;
        },
        O = function (e, t, n) {
          n && e.setAttribute(t, n);
        },
        A = function (e, t) {
          e.removeAttribute(t);
        },
        L = function (e) {
          return !!e.llOriginalAttrs;
        },
        P = function (e) {
          if (!L(e)) {
            var t = {};
            (t.src = e.getAttribute("src")),
              (t.srcset = e.getAttribute("srcset")),
              (t.sizes = e.getAttribute("sizes")),
              (e.llOriginalAttrs = t);
          }
        },
        I = function (e) {
          if (L(e)) {
            var t = e.llOriginalAttrs;
            O(e, "src", t.src),
              O(e, "srcset", t.srcset),
              O(e, "sizes", t.sizes);
          }
        },
        $ = function (e, t) {
          O(e, "sizes", h(e, t.data_sizes)),
            O(e, "srcset", h(e, t.data_srcset)),
            O(e, "src", h(e, t.data_src));
        },
        z = function (e) {
          A(e, "src"), A(e, "srcset"), A(e, "sizes");
        },
        N = function (e, t) {
          var n = e.parentNode;
          n && "PICTURE" === n.tagName && M(n).forEach(t);
        },
        R = {
          IMG: function (e, t) {
            N(e, function (e) {
              P(e), $(e, t);
            }),
              P(e),
              $(e, t);
          },
          IFRAME: function (e, t) {
            O(e, "src", h(e, t.data_src));
          },
          VIDEO: function (e, t) {
            !(function (e, n) {
              M(e).forEach(function (e) {
                O(e, "src", h(e, t.data_src));
              });
            })(e),
              O(e, "poster", h(e, t.data_poster)),
              O(e, "src", h(e, t.data_src)),
              e.load();
          },
        },
        D = function (e, t) {
          var n = R[e.tagName];
          n && n(e, t);
        },
        j = function (e, t, n) {
          S(n, 1), _(e, t.class_loading), g(e, c), x(t.callback_loading, e, n);
        },
        B = ["IMG", "IFRAME", "VIDEO"],
        V = function (e, t) {
          !t ||
            t.loadingCount > 0 ||
            t.toLoadCount > 0 ||
            x(e.callback_finish, t);
        },
        F = function (e, t, n) {
          e.addEventListener(t, n), (e.llEvLisnrs[t] = n);
        },
        G = function (e, t, n) {
          e.removeEventListener(t, n);
        },
        H = function (e) {
          return !!e.llEvLisnrs;
        },
        W = function (e) {
          if (H(e)) {
            var t = e.llEvLisnrs;
            for (var n in t) {
              var i = t[n];
              G(e, n, i);
            }
            delete e.llEvLisnrs;
          }
        },
        q = function (e, t, n) {
          !(function (e) {
            delete e.llTempImage;
          })(e),
            S(n, -1),
            n && (n.toLoadCount -= 1),
            E(e, t.class_loading),
            t.unobserve_completed && C(e, n);
        },
        Y = function (e, t, n) {
          var i = T(e) || e;
          H(i) ||
            (function (e, t, n) {
              H(e) || (e.llEvLisnrs = {});
              var i = "VIDEO" === e.tagName ? "loadeddata" : "load";
              F(e, i, t), F(e, "error", n);
            })(
              i,
              function (s) {
                !(function (e, t, n, i) {
                  var s = w(t);
                  q(t, n, i),
                    _(t, n.class_loaded),
                    g(t, d),
                    x(n.callback_loaded, t, i),
                    s || V(n, i);
                })(0, e, t, n),
                  W(i);
              },
              function (s) {
                !(function (e, t, n, i) {
                  var s = w(t);
                  q(t, n, i),
                    _(t, n.class_error),
                    g(t, p),
                    x(n.callback_error, t, i),
                    s || V(n, i);
                })(0, e, t, n),
                  W(i);
              }
            );
        },
        U = function (e, t, n) {
          !(function (e) {
            return B.indexOf(e.tagName) > -1;
          })(e)
            ? (function (e, t, n) {
                !(function (e) {
                  e.llTempImage = document.createElement("IMG");
                })(e),
                  Y(e, t, n),
                  (function (e, t, n) {
                    var i = h(e, t.data_bg),
                      s = h(e, t.data_bg_hidpi),
                      a = r && s ? s : i;
                    a &&
                      ((e.style.backgroundImage = 'url("'.concat(a, '")')),
                      T(e).setAttribute("src", a),
                      j(e, t, n));
                  })(e, t, n),
                  (function (e, t, n) {
                    var i = h(e, t.data_bg_multi),
                      s = h(e, t.data_bg_multi_hidpi),
                      a = r && s ? s : i;
                    a &&
                      ((e.style.backgroundImage = a),
                      (function (e, t, n) {
                        _(e, t.class_applied),
                          g(e, u),
                          t.unobserve_completed && C(e, t),
                          x(t.callback_applied, e, n);
                      })(e, t, n));
                  })(e, t, n);
              })(e, t, n)
            : (function (e, t, n) {
                Y(e, t, n), D(e, t), j(e, t, n);
              })(e, t, n);
        },
        X = ["IMG", "IFRAME", "VIDEO"],
        K = function (e) {
          return e.use_native && "loading" in HTMLImageElement.prototype;
        },
        J = function (e) {
          return Array.prototype.slice.call(e);
        },
        Z = function (e) {
          return e.container.querySelectorAll(e.elements_selector);
        },
        Q = function (e) {
          return (function (e) {
            return m(e) === p;
          })(e);
        },
        ee = function (e, t) {
          return (function (e) {
            return J(e).filter(b);
          })(e || Z(t));
        },
        te = function (e, n) {
          var s = o(e);
          (this._settings = s),
            (this.loadingCount = 0),
            (function (e, t) {
              i &&
                !K(e) &&
                (t._observer = new IntersectionObserver(
                  function (n) {
                    !(function (e, t, n) {
                      e.forEach(function (e) {
                        return (function (e) {
                          return e.isIntersecting || e.intersectionRatio > 0;
                        })(e)
                          ? (function (e, t, n, i) {
                              var s = (function (e) {
                                return y.indexOf(m(e)) >= 0;
                              })(e);
                              g(e, "entered"),
                                _(e, n.class_entered),
                                E(e, n.class_exited),
                                (function (e, t, n) {
                                  t.unobserve_entered && C(e, n);
                                })(e, n, i),
                                x(n.callback_enter, e, t, i),
                                s || U(e, n, i);
                            })(e.target, e, t, n)
                          : (function (e, t, n, i) {
                              b(e) ||
                                (_(e, n.class_exited),
                                (function (e, t, n, i) {
                                  n.cancel_on_exit &&
                                    (function (e) {
                                      return m(e) === c;
                                    })(e) &&
                                    "IMG" === e.tagName &&
                                    (W(e),
                                    (function (e) {
                                      N(e, function (e) {
                                        z(e);
                                      }),
                                        z(e);
                                    })(e),
                                    (function (e) {
                                      N(e, function (e) {
                                        I(e);
                                      }),
                                        I(e);
                                    })(e),
                                    E(e, n.class_loading),
                                    S(i, -1),
                                    v(e),
                                    x(n.callback_cancel, e, t, i));
                                })(e, t, n, i),
                                x(n.callback_exit, e, t, i));
                            })(e.target, e, t, n);
                      });
                    })(n, e, t);
                  },
                  (function (e) {
                    return {
                      root: e.container === document ? null : e.container,
                      rootMargin: e.thresholds || e.threshold + "px",
                    };
                  })(e)
                ));
            })(s, this),
            (function (e, n) {
              t &&
                window.addEventListener("online", function () {
                  !(function (e, t) {
                    var n;
                    ((n = Z(e)), J(n).filter(Q)).forEach(function (t) {
                      E(t, e.class_error), v(t);
                    }),
                      t.update();
                  })(e, n);
                });
            })(s, this),
            this.update(n);
        };
      return (
        (te.prototype = {
          update: function (e) {
            var t,
              s,
              r = this._settings,
              a = ee(e, r);
            k(this, a.length),
              !n && i
                ? K(r)
                  ? (function (e, t, n) {
                      a.forEach(function (e) {
                        -1 !== X.indexOf(e.tagName) &&
                          (function (e, t, n) {
                            e.setAttribute("loading", "lazy"),
                              Y(e, t, n),
                              D(e, t),
                              g(e, f);
                          })(e, t, n);
                      }),
                        k(n, 0);
                    })(0, r, this)
                  : ((s = a),
                    (function (e) {
                      e.disconnect();
                    })((t = this._observer)),
                    (function (e, t) {
                      s.forEach(function (t) {
                        e.observe(t);
                      });
                    })(t))
                : this.loadAll(a);
          },
          destroy: function () {
            this._observer && this._observer.disconnect(),
              Z(this._settings).forEach(function (e) {
                delete e.llOriginalAttrs;
              }),
              delete this._observer,
              delete this._settings,
              delete this.loadingCount,
              delete this.toLoadCount;
          },
          loadAll: function (e) {
            var t = this,
              n = this._settings;
            ee(e, n).forEach(function (e) {
              C(e, t), U(e, n, t);
            });
          },
        }),
        (te.load = function (e, t) {
          var n = o(t);
          U(e, n);
        }),
        (te.resetStatus = function (e) {
          v(e);
        }),
        t &&
          (function (e, t) {
            if (t)
              if (t.length) for (var n, i = 0; (n = t[i]); i += 1) l(e, n);
              else l(e, t);
          })(te, window.lazyLoadOptions),
        te
      );
    })();
  },
  function (e, t) {
    var n;
    n = (function () {
      return this;
    })();
    try {
      n = n || new Function("return this")();
    } catch (e) {
      "object" == typeof window && (n = window);
    }
    e.exports = n;
  },
  function (e, t, n) {
    e.exports = (function (e) {
      function t(i) {
        if (n[i]) return n[i].exports;
        var s = (n[i] = { exports: {}, id: i, loaded: !1 });
        return (
          e[i].call(s.exports, s, s.exports, t), (s.loaded = !0), s.exports
        );
      }
      var n = {};
      return (t.m = e), (t.c = n), (t.p = ""), t(0);
    })([
      function (e, t, n) {
        "use strict";
        var i = n(1).isInBrowser,
          s = new (n(2))(i ? document.body : null);
        s.setStateFromDOM(null),
          s.listenToDOM(),
          i && (window.scrollMonitor = s),
          (e.exports = s);
      },
      function (e, t) {
        "use strict";
        (t.VISIBILITYCHANGE = "visibilityChange"),
          (t.ENTERVIEWPORT = "enterViewport"),
          (t.FULLYENTERVIEWPORT = "fullyEnterViewport"),
          (t.EXITVIEWPORT = "exitViewport"),
          (t.PARTIALLYEXITVIEWPORT = "partiallyExitViewport"),
          (t.LOCATIONCHANGE = "locationChange"),
          (t.STATECHANGE = "stateChange"),
          (t.eventTypes = [
            t.VISIBILITYCHANGE,
            t.ENTERVIEWPORT,
            t.FULLYENTERVIEWPORT,
            t.EXITVIEWPORT,
            t.PARTIALLYEXITVIEWPORT,
            t.LOCATIONCHANGE,
            t.STATECHANGE,
          ]),
          (t.isOnServer = "undefined" == typeof window),
          (t.isInBrowser = !t.isOnServer),
          (t.defaultOffsets = { top: 0, bottom: 0 });
      },
      function (e, t, n) {
        "use strict";
        function i(e) {
          return o
            ? 0
            : e === document.body
            ? window.innerHeight || document.documentElement.clientHeight
            : e.clientHeight;
        }
        function s(e) {
          return o
            ? 0
            : e === document.body
            ? Math.max(
                document.body.scrollHeight,
                document.documentElement.scrollHeight,
                document.body.offsetHeight,
                document.documentElement.offsetHeight,
                document.documentElement.clientHeight
              )
            : e.scrollHeight;
        }
        function r(e) {
          return o
            ? 0
            : e === document.body
            ? window.pageYOffset ||
              (document.documentElement &&
                document.documentElement.scrollTop) ||
              document.body.scrollTop
            : e.scrollTop;
        }
        var a = n(1),
          o = a.isOnServer,
          l = a.isInBrowser,
          c = a.eventTypes,
          d = n(3),
          u = !1;
        if (l)
          try {
            var p = Object.defineProperty({}, "passive", {
              get: function () {
                u = !0;
              },
            });
            window.addEventListener("test", null, p);
          } catch (e) {}
        var f = !!u && { capture: !1, passive: !0 },
          h = (function () {
            function e(t, n) {
              !(function (e, t) {
                if (!(e instanceof t))
                  throw new TypeError("Cannot call a class as a function");
              })(this, e);
              var a,
                o,
                l,
                d = this;
              (this.item = t),
                (this.watchers = []),
                (this.viewportTop = null),
                (this.viewportBottom = null),
                (this.documentHeight = s(t)),
                (this.viewportHeight = i(t)),
                (this.DOMListener = function () {
                  e.prototype.DOMListener.apply(d, arguments);
                }),
                (this.eventTypes = c),
                n && (this.containerWatcher = n.create(t)),
                (this.update = function () {
                  (function () {
                    if (
                      ((d.viewportTop = r(t)),
                      (d.viewportBottom = d.viewportTop + d.viewportHeight),
                      (d.documentHeight = s(t)),
                      d.documentHeight !== a)
                    ) {
                      for (o = d.watchers.length; o--; )
                        d.watchers[o].recalculateLocation();
                      a = d.documentHeight;
                    }
                  })(),
                    (function () {
                      for (l = d.watchers.length; l--; ) d.watchers[l].update();
                      for (l = d.watchers.length; l--; )
                        d.watchers[l].triggerCallbacks();
                    })();
                }),
                (this.recalculateLocations = function () {
                  (this.documentHeight = 0), this.update();
                });
            }
            return (
              (e.prototype.listenToDOM = function () {
                l &&
                  (window.addEventListener
                    ? (this.item === document.body
                        ? window.addEventListener("scroll", this.DOMListener, f)
                        : this.item.addEventListener(
                            "scroll",
                            this.DOMListener,
                            f
                          ),
                      window.addEventListener("resize", this.DOMListener))
                    : (this.item === document.body
                        ? window.attachEvent("onscroll", this.DOMListener)
                        : this.item.attachEvent("onscroll", this.DOMListener),
                      window.attachEvent("onresize", this.DOMListener)),
                  (this.destroy = function () {
                    window.addEventListener
                      ? (this.item === document.body
                          ? (window.removeEventListener(
                              "scroll",
                              this.DOMListener,
                              f
                            ),
                            this.containerWatcher.destroy())
                          : this.item.removeEventListener(
                              "scroll",
                              this.DOMListener,
                              f
                            ),
                        window.removeEventListener("resize", this.DOMListener))
                      : (this.item === document.body
                          ? (window.detachEvent("onscroll", this.DOMListener),
                            this.containerWatcher.destroy())
                          : this.item.detachEvent("onscroll", this.DOMListener),
                        window.detachEvent("onresize", this.DOMListener));
                  }));
              }),
              (e.prototype.destroy = function () {}),
              (e.prototype.DOMListener = function (e) {
                this.setStateFromDOM(e);
              }),
              (e.prototype.setStateFromDOM = function (e) {
                var t = r(this.item),
                  n = i(this.item),
                  a = s(this.item);
                this.setState(t, n, a, e);
              }),
              (e.prototype.setState = function (e, t, n, i) {
                var s = t !== this.viewportHeight || n !== this.contentHeight;
                if (
                  ((this.latestEvent = i),
                  (this.viewportTop = e),
                  (this.viewportHeight = t),
                  (this.viewportBottom = e + t),
                  (this.contentHeight = n),
                  s)
                )
                  for (var r = this.watchers.length; r--; )
                    this.watchers[r].recalculateLocation();
                this.updateAndTriggerWatchers(i);
              }),
              (e.prototype.updateAndTriggerWatchers = function (e) {
                for (var t = this.watchers.length; t--; )
                  this.watchers[t].update();
                for (t = this.watchers.length; t--; )
                  this.watchers[t].triggerCallbacks(e);
              }),
              (e.prototype.createCustomContainer = function () {
                return new e();
              }),
              (e.prototype.createContainer = function (t) {
                "string" == typeof t
                  ? (t = document.querySelector(t))
                  : t && t.length > 0 && (t = t[0]);
                var n = new e(t, this);
                return n.setStateFromDOM(), n.listenToDOM(), n;
              }),
              (e.prototype.create = function (e, t) {
                "string" == typeof e
                  ? (e = document.querySelector(e))
                  : e && e.length > 0 && (e = e[0]);
                var n = new d(this, e, t);
                return this.watchers.push(n), n;
              }),
              (e.prototype.beget = function (e, t) {
                return this.create(e, t);
              }),
              e
            );
          })();
        e.exports = h;
      },
      function (e, t, n) {
        "use strict";
        function i(e, t, n) {
          function i(e, t) {
            if (0 !== e.length)
              for (v = e.length; v--; )
                (b = e[v]).callback.call(w, t, w), b.isOne && e.splice(v, 1);
          }
          var s,
            h,
            m,
            g,
            v,
            b,
            w = this;
          (this.watchItem = t),
            (this.container = e),
            (this.offsets = n
              ? n === +n
                ? { top: n, bottom: n }
                : { top: n.top || f.top, bottom: n.bottom || f.bottom }
              : f),
            (this.callbacks = {});
          for (var y = 0, x = p.length; y < x; y++) w.callbacks[p[y]] = [];
          (this.locked = !1),
            (this.triggerCallbacks = function (e) {
              switch (
                (this.isInViewport && !s && i(this.callbacks[a], e),
                this.isFullyInViewport && !h && i(this.callbacks[o], e),
                this.isAboveViewport !== m &&
                  this.isBelowViewport !== g &&
                  (i(this.callbacks[r], e),
                  h ||
                    this.isFullyInViewport ||
                    (i(this.callbacks[o], e), i(this.callbacks[c], e)),
                  s ||
                    this.isInViewport ||
                    (i(this.callbacks[a], e), i(this.callbacks[l], e))),
                !this.isFullyInViewport && h && i(this.callbacks[c], e),
                !this.isInViewport && s && i(this.callbacks[l], e),
                this.isInViewport !== s && i(this.callbacks[r], e),
                !0)
              ) {
                case s !== this.isInViewport:
                case h !== this.isFullyInViewport:
                case m !== this.isAboveViewport:
                case g !== this.isBelowViewport:
                  i(this.callbacks[u], e);
              }
              (s = this.isInViewport),
                (h = this.isFullyInViewport),
                (m = this.isAboveViewport),
                (g = this.isBelowViewport);
            }),
            (this.recalculateLocation = function () {
              if (!this.locked) {
                var e = this.top,
                  t = this.bottom;
                if (this.watchItem.nodeName) {
                  var n = this.watchItem.style.display;
                  "none" === n && (this.watchItem.style.display = "");
                  for (var s = 0, r = this.container; r.containerWatcher; )
                    (s +=
                      r.containerWatcher.top -
                      r.containerWatcher.container.viewportTop),
                      (r = r.containerWatcher.container);
                  var a = this.watchItem.getBoundingClientRect();
                  (this.top = a.top + this.container.viewportTop - s),
                    (this.bottom = a.bottom + this.container.viewportTop - s),
                    "none" === n && (this.watchItem.style.display = n);
                } else
                  this.watchItem === +this.watchItem
                    ? this.watchItem > 0
                      ? (this.top = this.bottom = this.watchItem)
                      : (this.top = this.bottom =
                          this.container.documentHeight - this.watchItem)
                    : ((this.top = this.watchItem.top),
                      (this.bottom = this.watchItem.bottom));
                (this.top -= this.offsets.top),
                  (this.bottom += this.offsets.bottom),
                  (this.height = this.bottom - this.top),
                  (void 0 === e && void 0 === t) ||
                    (this.top === e && this.bottom === t) ||
                    i(this.callbacks[d], null);
              }
            }),
            this.recalculateLocation(),
            this.update(),
            (s = this.isInViewport),
            (h = this.isFullyInViewport),
            (m = this.isAboveViewport),
            (g = this.isBelowViewport);
        }
        var s = n(1),
          r = s.VISIBILITYCHANGE,
          a = s.ENTERVIEWPORT,
          o = s.FULLYENTERVIEWPORT,
          l = s.EXITVIEWPORT,
          c = s.PARTIALLYEXITVIEWPORT,
          d = s.LOCATIONCHANGE,
          u = s.STATECHANGE,
          p = s.eventTypes,
          f = s.defaultOffsets;
        i.prototype = {
          on: function (e, t, n) {
            switch (!0) {
              case e === r && !this.isInViewport && this.isAboveViewport:
              case e === a && this.isInViewport:
              case e === o && this.isFullyInViewport:
              case e === l && this.isAboveViewport && !this.isInViewport:
              case e === c && this.isInViewport && this.isAboveViewport:
                if ((t.call(this, this.container.latestEvent, this), n)) return;
            }
            if (!this.callbacks[e])
              throw new Error(
                "Tried to add a scroll monitor listener of type " +
                  e +
                  ". Your options are: " +
                  p.join(", ")
              );
            this.callbacks[e].push({ callback: t, isOne: n || !1 });
          },
          off: function (e, t) {
            if (!this.callbacks[e])
              throw new Error(
                "Tried to remove a scroll monitor listener of type " +
                  e +
                  ". Your options are: " +
                  p.join(", ")
              );
            for (var n, i = 0; (n = this.callbacks[e][i]); i++)
              if (n.callback === t) {
                this.callbacks[e].splice(i, 1);
                break;
              }
          },
          one: function (e, t) {
            this.on(e, t, !0);
          },
          recalculateSize: function () {
            (this.height =
              this.watchItem.offsetHeight +
              this.offsets.top +
              this.offsets.bottom),
              (this.bottom = this.top + this.height);
          },
          update: function () {
            (this.isAboveViewport = this.top < this.container.viewportTop),
              (this.isBelowViewport =
                this.bottom > this.container.viewportBottom),
              (this.isInViewport =
                this.top < this.container.viewportBottom &&
                this.bottom > this.container.viewportTop),
              (this.isFullyInViewport =
                (this.top >= this.container.viewportTop &&
                  this.bottom <= this.container.viewportBottom) ||
                (this.isAboveViewport && this.isBelowViewport));
          },
          destroy: function () {
            var e = this.container.watchers.indexOf(this);
            this.container.watchers.splice(e, 1);
            for (var t = 0, n = p.length; t < n; t++)
              this.callbacks[p[t]].length = 0;
          },
          lock: function () {
            this.locked = !0;
          },
          unlock: function () {
            this.locked = !1;
          },
        };
        for (
          var h = function (e) {
              return function (t, n) {
                this.on.call(this, e, t, n);
              };
            },
            m = 0,
            g = p.length;
          m < g;
          m++
        ) {
          var v = p[m];
          i.prototype[v] = h(v);
        }
        e.exports = i;
      },
    ]);
  },
  function (e, t, n) {
    "use strict";
    n.r(t);
    var i = n(0);
    function s(e, t, n) {
      if (-1 === e.indexOf(t)) return n;
      const i = e[e.indexOf(t) + 1];
      if (!i) return n;
      if ("duration" === t) {
        let e = i.match(/([0-9]+)ms/);
        if (e) return e[1];
      }
      if ("min" === t) {
        let e = i.match(/([0-9]+)px/);
        if (e) return e[1];
      }
      return i;
    }
    var r = function (e) {
        function t(t, { modifiers: n }) {
          let i = s(n, "duration", 250) / 1e3,
            r = s(n, "min", 0),
            a = !n.includes("min");
          t._x_isShown || (t.style.height = r + "px"),
            !t._x_isShown && a && (t.hidden = !0),
            t._x_isShown || (t.style.overflow = "hidden");
          let o = (t, n) => {
              let i = e.setStyles(t, n);
              return n.height ? () => {} : i;
            },
            l = {
              transitionProperty: "height",
              transitionDuration: i + "s",
              transitionTimingFunction: "cubic-bezier(0.4, 0.0, 0.2, 1)",
            };
          t._x_transition = {
            in(n = () => {}, i = () => {}) {
              a && (t.hidden = !1), a && (t.style.display = null);
              let s = t.getBoundingClientRect().height;
              t.style.height = "auto";
              let o = t.getBoundingClientRect().height;
              s === o && (s = r),
                e.transition(
                  t,
                  e.setStyles,
                  {
                    during: l,
                    start: { height: s + "px" },
                    end: { height: o + "px" },
                  },
                  () => (t._x_isShown = !0),
                  () => {
                    t.style.height == o + "px" && (t.style.overflow = null);
                  }
                );
            },
            out(n = () => {}, i = () => {}) {
              let s = t.getBoundingClientRect().height;
              e.transition(
                t,
                o,
                {
                  during: l,
                  start: { height: s + "px" },
                  end: { height: r + "px" },
                },
                () => (t.style.overflow = "hidden"),
                () => {
                  (t._x_isShown = !1),
                    t.style.height == r + "px" &&
                      a &&
                      ((t.style.display = "none"), (t.hidden = !0));
                }
              );
            },
          };
        }
        e.directive("collapse", t),
          (t.inline = (e, { modifiers: t }) => {
            t.includes("min") &&
              ((e._x_doShow = () => {}), (e._x_doHide = () => {}));
          });
      },
      a = n(1),
      o = n.n(a);
    function l(e) {
      return (
        null !== e &&
        "object" == typeof e &&
        "constructor" in e &&
        e.constructor === Object
      );
    }
    function c(e = {}, t = {}) {
      Object.keys(t).forEach((n) => {
        void 0 === e[n]
          ? (e[n] = t[n])
          : l(t[n]) && l(e[n]) && Object.keys(t[n]).length > 0 && c(e[n], t[n]);
      });
    }
    const d = {
      body: {},
      addEventListener() {},
      removeEventListener() {},
      activeElement: { blur() {}, nodeName: "" },
      querySelector: () => null,
      querySelectorAll: () => [],
      getElementById: () => null,
      createEvent: () => ({ initEvent() {} }),
      createElement: () => ({
        children: [],
        childNodes: [],
        style: {},
        setAttribute() {},
        getElementsByTagName: () => [],
      }),
      createElementNS: () => ({}),
      importNode: () => null,
      location: {
        hash: "",
        host: "",
        hostname: "",
        href: "",
        origin: "",
        pathname: "",
        protocol: "",
        search: "",
      },
    };
    function u() {
      const e = "undefined" != typeof document ? document : {};
      return c(e, d), e;
    }
    const p = {
      document: d,
      navigator: { userAgent: "" },
      location: {
        hash: "",
        host: "",
        hostname: "",
        href: "",
        origin: "",
        pathname: "",
        protocol: "",
        search: "",
      },
      history: { replaceState() {}, pushState() {}, go() {}, back() {} },
      CustomEvent: function () {
        return this;
      },
      addEventListener() {},
      removeEventListener() {},
      getComputedStyle: () => ({ getPropertyValue: () => "" }),
      Image() {},
      Date() {},
      screen: {},
      setTimeout() {},
      clearTimeout() {},
      matchMedia: () => ({}),
      requestAnimationFrame: (e) =>
        "undefined" == typeof setTimeout ? (e(), null) : setTimeout(e, 0),
      cancelAnimationFrame(e) {
        "undefined" != typeof setTimeout && clearTimeout(e);
      },
    };
    function f() {
      const e = "undefined" != typeof window ? window : {};
      return c(e, p), e;
    }
    class h extends Array {
      constructor(e) {
        "number" == typeof e
          ? super(e)
          : (super(...(e || [])),
            (function (e) {
              const t = e.__proto__;
              Object.defineProperty(e, "__proto__", {
                get: () => t,
                set(e) {
                  t.__proto__ = e;
                },
              });
            })(this));
      }
    }
    function m(e = []) {
      const t = [];
      return (
        e.forEach((e) => {
          Array.isArray(e) ? t.push(...m(e)) : t.push(e);
        }),
        t
      );
    }
    function g(e, t) {
      return Array.prototype.filter.call(e, t);
    }
    function v(e, t) {
      const n = f(),
        i = u();
      let s = [];
      if (!t && e instanceof h) return e;
      if (!e) return new h(s);
      if ("string" == typeof e) {
        const n = e.trim();
        if (n.indexOf("<") >= 0 && n.indexOf(">") >= 0) {
          let e = "div";
          0 === n.indexOf("<li") && (e = "ul"),
            0 === n.indexOf("<tr") && (e = "tbody"),
            (0 !== n.indexOf("<td") && 0 !== n.indexOf("<th")) || (e = "tr"),
            0 === n.indexOf("<tbody") && (e = "table"),
            0 === n.indexOf("<option") && (e = "select");
          const t = i.createElement(e);
          t.innerHTML = n;
          for (let e = 0; e < t.childNodes.length; e += 1)
            s.push(t.childNodes[e]);
        } else
          s = (function (e, t) {
            if ("string" != typeof e) return [e];
            const n = [],
              i = t.querySelectorAll(e);
            for (let e = 0; e < i.length; e += 1) n.push(i[e]);
            return n;
          })(e.trim(), t || i);
      } else if (e.nodeType || e === n || e === i) s.push(e);
      else if (Array.isArray(e)) {
        if (e instanceof h) return e;
        s = e;
      }
      return new h(
        (function (e) {
          const t = [];
          for (let n = 0; n < e.length; n += 1)
            -1 === t.indexOf(e[n]) && t.push(e[n]);
          return t;
        })(s)
      );
    }
    v.fn = h.prototype;
    const b = "resize scroll".split(" ");
    function w(e) {
      return function (...t) {
        if (void 0 === t[0]) {
          for (let t = 0; t < this.length; t += 1)
            b.indexOf(e) < 0 &&
              (e in this[t] ? this[t][e]() : v(this[t]).trigger(e));
          return this;
        }
        return this.on(e, ...t);
      };
    }
    w("click"),
      w("blur"),
      w("focus"),
      w("focusin"),
      w("focusout"),
      w("keyup"),
      w("keydown"),
      w("keypress"),
      w("submit"),
      w("change"),
      w("mousedown"),
      w("mousemove"),
      w("mouseup"),
      w("mouseenter"),
      w("mouseleave"),
      w("mouseout"),
      w("mouseover"),
      w("touchstart"),
      w("touchend"),
      w("touchmove"),
      w("resize"),
      w("scroll");
    const y = {
      addClass: function (...e) {
        const t = m(e.map((e) => e.split(" ")));
        return (
          this.forEach((e) => {
            e.classList.add(...t);
          }),
          this
        );
      },
      removeClass: function (...e) {
        const t = m(e.map((e) => e.split(" ")));
        return (
          this.forEach((e) => {
            e.classList.remove(...t);
          }),
          this
        );
      },
      hasClass: function (...e) {
        const t = m(e.map((e) => e.split(" ")));
        return (
          g(this, (e) => t.filter((t) => e.classList.contains(t)).length > 0)
            .length > 0
        );
      },
      toggleClass: function (...e) {
        const t = m(e.map((e) => e.split(" ")));
        this.forEach((e) => {
          t.forEach((t) => {
            e.classList.toggle(t);
          });
        });
      },
      attr: function (e, t) {
        if (1 === arguments.length && "string" == typeof e)
          return this[0] ? this[0].getAttribute(e) : void 0;
        for (let n = 0; n < this.length; n += 1)
          if (2 === arguments.length) this[n].setAttribute(e, t);
          else
            for (const t in e)
              (this[n][t] = e[t]), this[n].setAttribute(t, e[t]);
        return this;
      },
      removeAttr: function (e) {
        for (let t = 0; t < this.length; t += 1) this[t].removeAttribute(e);
        return this;
      },
      transform: function (e) {
        for (let t = 0; t < this.length; t += 1) this[t].style.transform = e;
        return this;
      },
      transition: function (e) {
        for (let t = 0; t < this.length; t += 1)
          this[t].style.transitionDuration =
            "string" != typeof e ? e + "ms" : e;
        return this;
      },
      on: function (...e) {
        let [t, n, i, s] = e;
        function r(e) {
          const t = e.target;
          if (!t) return;
          const s = e.target.dom7EventData || [];
          if ((s.indexOf(e) < 0 && s.unshift(e), v(t).is(n))) i.apply(t, s);
          else {
            const e = v(t).parents();
            for (let t = 0; t < e.length; t += 1)
              v(e[t]).is(n) && i.apply(e[t], s);
          }
        }
        function a(e) {
          const t = (e && e.target && e.target.dom7EventData) || [];
          t.indexOf(e) < 0 && t.unshift(e), i.apply(this, t);
        }
        "function" == typeof e[1] && (([t, i, s] = e), (n = void 0)),
          s || (s = !1);
        const o = t.split(" ");
        let l;
        for (let e = 0; e < this.length; e += 1) {
          const t = this[e];
          if (n)
            for (l = 0; l < o.length; l += 1) {
              const e = o[l];
              t.dom7LiveListeners || (t.dom7LiveListeners = {}),
                t.dom7LiveListeners[e] || (t.dom7LiveListeners[e] = []),
                t.dom7LiveListeners[e].push({ listener: i, proxyListener: r }),
                t.addEventListener(e, r, s);
            }
          else
            for (l = 0; l < o.length; l += 1) {
              const e = o[l];
              t.dom7Listeners || (t.dom7Listeners = {}),
                t.dom7Listeners[e] || (t.dom7Listeners[e] = []),
                t.dom7Listeners[e].push({ listener: i, proxyListener: a }),
                t.addEventListener(e, a, s);
            }
        }
        return this;
      },
      off: function (...e) {
        let [t, n, i, s] = e;
        "function" == typeof e[1] && (([t, i, s] = e), (n = void 0)),
          s || (s = !1);
        const r = t.split(" ");
        for (let e = 0; e < r.length; e += 1) {
          const t = r[e];
          for (let e = 0; e < this.length; e += 1) {
            const r = this[e];
            let a;
            if (
              (!n && r.dom7Listeners
                ? (a = r.dom7Listeners[t])
                : n && r.dom7LiveListeners && (a = r.dom7LiveListeners[t]),
              a && a.length)
            )
              for (let e = a.length - 1; e >= 0; e -= 1) {
                const n = a[e];
                (i && n.listener === i) ||
                (i &&
                  n.listener &&
                  n.listener.dom7proxy &&
                  n.listener.dom7proxy === i)
                  ? (r.removeEventListener(t, n.proxyListener, s),
                    a.splice(e, 1))
                  : i ||
                    (r.removeEventListener(t, n.proxyListener, s),
                    a.splice(e, 1));
              }
          }
        }
        return this;
      },
      trigger: function (...e) {
        const t = f(),
          n = e[0].split(" "),
          i = e[1];
        for (let s = 0; s < n.length; s += 1) {
          const r = n[s];
          for (let n = 0; n < this.length; n += 1) {
            const s = this[n];
            if (t.CustomEvent) {
              const n = new t.CustomEvent(r, {
                detail: i,
                bubbles: !0,
                cancelable: !0,
              });
              (s.dom7EventData = e.filter((e, t) => t > 0)),
                s.dispatchEvent(n),
                (s.dom7EventData = []),
                delete s.dom7EventData;
            }
          }
        }
        return this;
      },
      transitionEnd: function (e) {
        const t = this;
        return (
          e &&
            t.on("transitionend", function n(i) {
              i.target === this && (e.call(this, i), t.off("transitionend", n));
            }),
          this
        );
      },
      outerWidth: function (e) {
        if (this.length > 0) {
          if (e) {
            const e = this.styles();
            return (
              this[0].offsetWidth +
              parseFloat(e.getPropertyValue("margin-right")) +
              parseFloat(e.getPropertyValue("margin-left"))
            );
          }
          return this[0].offsetWidth;
        }
        return null;
      },
      outerHeight: function (e) {
        if (this.length > 0) {
          if (e) {
            const e = this.styles();
            return (
              this[0].offsetHeight +
              parseFloat(e.getPropertyValue("margin-top")) +
              parseFloat(e.getPropertyValue("margin-bottom"))
            );
          }
          return this[0].offsetHeight;
        }
        return null;
      },
      styles: function () {
        const e = f();
        return this[0] ? e.getComputedStyle(this[0], null) : {};
      },
      offset: function () {
        if (this.length > 0) {
          const e = f(),
            t = u(),
            n = this[0],
            i = n.getBoundingClientRect(),
            s = t.body,
            r = n.clientTop || s.clientTop || 0,
            a = n.clientLeft || s.clientLeft || 0,
            o = n === e ? e.scrollY : n.scrollTop,
            l = n === e ? e.scrollX : n.scrollLeft;
          return { top: i.top + o - r, left: i.left + l - a };
        }
        return null;
      },
      css: function (e, t) {
        const n = f();
        let i;
        if (1 === arguments.length) {
          if ("string" != typeof e) {
            for (i = 0; i < this.length; i += 1)
              for (const t in e) this[i].style[t] = e[t];
            return this;
          }
          if (this[0])
            return n.getComputedStyle(this[0], null).getPropertyValue(e);
        }
        if (2 === arguments.length && "string" == typeof e) {
          for (i = 0; i < this.length; i += 1) this[i].style[e] = t;
          return this;
        }
        return this;
      },
      each: function (e) {
        return e
          ? (this.forEach((t, n) => {
              e.apply(t, [t, n]);
            }),
            this)
          : this;
      },
      html: function (e) {
        if (void 0 === e) return this[0] ? this[0].innerHTML : null;
        for (let t = 0; t < this.length; t += 1) this[t].innerHTML = e;
        return this;
      },
      text: function (e) {
        if (void 0 === e) return this[0] ? this[0].textContent.trim() : null;
        for (let t = 0; t < this.length; t += 1) this[t].textContent = e;
        return this;
      },
      is: function (e) {
        const t = f(),
          n = u(),
          i = this[0];
        let s, r;
        if (!i || void 0 === e) return !1;
        if ("string" == typeof e) {
          if (i.matches) return i.matches(e);
          if (i.webkitMatchesSelector) return i.webkitMatchesSelector(e);
          if (i.msMatchesSelector) return i.msMatchesSelector(e);
          for (s = v(e), r = 0; r < s.length; r += 1) if (s[r] === i) return !0;
          return !1;
        }
        if (e === n) return i === n;
        if (e === t) return i === t;
        if (e.nodeType || e instanceof h) {
          for (s = e.nodeType ? [e] : e, r = 0; r < s.length; r += 1)
            if (s[r] === i) return !0;
          return !1;
        }
        return !1;
      },
      index: function () {
        let e,
          t = this[0];
        if (t) {
          for (e = 0; null !== (t = t.previousSibling); )
            1 === t.nodeType && (e += 1);
          return e;
        }
      },
      eq: function (e) {
        if (void 0 === e) return this;
        const t = this.length;
        if (e > t - 1) return v([]);
        if (e < 0) {
          const n = t + e;
          return v(n < 0 ? [] : [this[n]]);
        }
        return v([this[e]]);
      },
      append: function (...e) {
        let t;
        const n = u();
        for (let i = 0; i < e.length; i += 1) {
          t = e[i];
          for (let e = 0; e < this.length; e += 1)
            if ("string" == typeof t) {
              const i = n.createElement("div");
              for (i.innerHTML = t; i.firstChild; )
                this[e].appendChild(i.firstChild);
            } else if (t instanceof h)
              for (let n = 0; n < t.length; n += 1) this[e].appendChild(t[n]);
            else this[e].appendChild(t);
        }
        return this;
      },
      prepend: function (e) {
        const t = u();
        let n, i;
        for (n = 0; n < this.length; n += 1)
          if ("string" == typeof e) {
            const s = t.createElement("div");
            for (s.innerHTML = e, i = s.childNodes.length - 1; i >= 0; i -= 1)
              this[n].insertBefore(s.childNodes[i], this[n].childNodes[0]);
          } else if (e instanceof h)
            for (i = 0; i < e.length; i += 1)
              this[n].insertBefore(e[i], this[n].childNodes[0]);
          else this[n].insertBefore(e, this[n].childNodes[0]);
        return this;
      },
      next: function (e) {
        return this.length > 0
          ? e
            ? this[0].nextElementSibling && v(this[0].nextElementSibling).is(e)
              ? v([this[0].nextElementSibling])
              : v([])
            : this[0].nextElementSibling
            ? v([this[0].nextElementSibling])
            : v([])
          : v([]);
      },
      nextAll: function (e) {
        const t = [];
        let n = this[0];
        if (!n) return v([]);
        for (; n.nextElementSibling; ) {
          const i = n.nextElementSibling;
          e ? v(i).is(e) && t.push(i) : t.push(i), (n = i);
        }
        return v(t);
      },
      prev: function (e) {
        if (this.length > 0) {
          const t = this[0];
          return e
            ? t.previousElementSibling && v(t.previousElementSibling).is(e)
              ? v([t.previousElementSibling])
              : v([])
            : t.previousElementSibling
            ? v([t.previousElementSibling])
            : v([]);
        }
        return v([]);
      },
      prevAll: function (e) {
        const t = [];
        let n = this[0];
        if (!n) return v([]);
        for (; n.previousElementSibling; ) {
          const i = n.previousElementSibling;
          e ? v(i).is(e) && t.push(i) : t.push(i), (n = i);
        }
        return v(t);
      },
      parent: function (e) {
        const t = [];
        for (let n = 0; n < this.length; n += 1)
          null !== this[n].parentNode &&
            (e
              ? v(this[n].parentNode).is(e) && t.push(this[n].parentNode)
              : t.push(this[n].parentNode));
        return v(t);
      },
      parents: function (e) {
        const t = [];
        for (let n = 0; n < this.length; n += 1) {
          let i = this[n].parentNode;
          for (; i; )
            e ? v(i).is(e) && t.push(i) : t.push(i), (i = i.parentNode);
        }
        return v(t);
      },
      closest: function (e) {
        let t = this;
        return void 0 === e ? v([]) : (t.is(e) || (t = t.parents(e).eq(0)), t);
      },
      find: function (e) {
        const t = [];
        for (let n = 0; n < this.length; n += 1) {
          const i = this[n].querySelectorAll(e);
          for (let e = 0; e < i.length; e += 1) t.push(i[e]);
        }
        return v(t);
      },
      children: function (e) {
        const t = [];
        for (let n = 0; n < this.length; n += 1) {
          const i = this[n].children;
          for (let n = 0; n < i.length; n += 1)
            (e && !v(i[n]).is(e)) || t.push(i[n]);
        }
        return v(t);
      },
      filter: function (e) {
        return v(g(this, e));
      },
      remove: function () {
        for (let e = 0; e < this.length; e += 1)
          this[e].parentNode && this[e].parentNode.removeChild(this[e]);
        return this;
      },
    };
    Object.keys(y).forEach((e) => {
      Object.defineProperty(v.fn, e, { value: y[e], writable: !0 });
    });
    var x = v;
    function _(e, t) {
      return void 0 === t && (t = 0), setTimeout(e, t);
    }
    function E() {
      return Date.now();
    }
    function T(e) {
      return (
        "object" == typeof e &&
        null !== e &&
        e.constructor &&
        "Object" === Object.prototype.toString.call(e).slice(8, -1)
      );
    }
    function C(e) {
      return "undefined" != typeof window && void 0 !== window.HTMLElement
        ? e instanceof HTMLElement
        : e && (1 === e.nodeType || 11 === e.nodeType);
    }
    function S() {
      const e = Object(arguments.length <= 0 ? void 0 : arguments[0]),
        t = ["__proto__", "constructor", "prototype"];
      for (let n = 1; n < arguments.length; n += 1) {
        const i = n < 0 || arguments.length <= n ? void 0 : arguments[n];
        if (null != i && !C(i)) {
          const n = Object.keys(Object(i)).filter((e) => t.indexOf(e) < 0);
          for (let t = 0, s = n.length; t < s; t += 1) {
            const s = n[t],
              r = Object.getOwnPropertyDescriptor(i, s);
            void 0 !== r &&
              r.enumerable &&
              (T(e[s]) && T(i[s])
                ? i[s].__swiper__
                  ? (e[s] = i[s])
                  : S(e[s], i[s])
                : !T(e[s]) && T(i[s])
                ? ((e[s] = {}), i[s].__swiper__ ? (e[s] = i[s]) : S(e[s], i[s]))
                : (e[s] = i[s]));
          }
        }
      }
      return e;
    }
    function k(e, t, n) {
      e.style.setProperty(t, n);
    }
    function M(e) {
      let { swiper: t, targetPosition: n, side: i } = e;
      const s = f(),
        r = -t.translate;
      let a,
        o = null;
      const l = t.params.speed;
      (t.wrapperEl.style.scrollSnapType = "none"),
        s.cancelAnimationFrame(t.cssModeFrameID);
      const c = n > r ? "next" : "prev",
        d = (e, t) => ("next" === c && e >= t) || ("prev" === c && e <= t),
        u = () => {
          (a = new Date().getTime()), null === o && (o = a);
          const e = Math.max(Math.min((a - o) / l, 1), 0),
            c = 0.5 - Math.cos(e * Math.PI) / 2;
          let p = r + c * (n - r);
          if ((d(p, n) && (p = n), t.wrapperEl.scrollTo({ [i]: p }), d(p, n)))
            return (
              (t.wrapperEl.style.overflow = "hidden"),
              (t.wrapperEl.style.scrollSnapType = ""),
              setTimeout(() => {
                (t.wrapperEl.style.overflow = ""),
                  t.wrapperEl.scrollTo({ [i]: p });
              }),
              void s.cancelAnimationFrame(t.cssModeFrameID)
            );
          t.cssModeFrameID = s.requestAnimationFrame(u);
        };
      u();
    }
    let O, A, L;
    function P() {
      return (
        O ||
          (O = (function () {
            const e = f(),
              t = u();
            return {
              smoothScroll:
                t.documentElement &&
                "scrollBehavior" in t.documentElement.style,
              touch: !!(
                "ontouchstart" in e ||
                (e.DocumentTouch && t instanceof e.DocumentTouch)
              ),
              passiveListener: (function () {
                let t = !1;
                try {
                  const n = Object.defineProperty({}, "passive", {
                    get() {
                      t = !0;
                    },
                  });
                  e.addEventListener("testPassiveListener", null, n);
                } catch (e) {}
                return t;
              })(),
              gestures: "ongesturestart" in e,
            };
          })()),
        O
      );
    }
    function I(e) {
      let { swiper: t, runCallbacks: n, direction: i, step: s } = e;
      const { activeIndex: r, previousIndex: a } = t;
      let o = i;
      if (
        (o || (o = r > a ? "next" : r < a ? "prev" : "reset"),
        t.emit("transition" + s),
        n && r !== a)
      ) {
        if ("reset" === o) return void t.emit("slideResetTransition" + s);
        t.emit("slideChangeTransition" + s),
          "next" === o
            ? t.emit("slideNextTransition" + s)
            : t.emit("slidePrevTransition" + s);
      }
    }
    function $() {
      const e = this,
        { params: t, el: n } = e;
      if (n && 0 === n.offsetWidth) return;
      t.breakpoints && e.setBreakpoint();
      const { allowSlideNext: i, allowSlidePrev: s, snapGrid: r } = e;
      (e.allowSlideNext = !0),
        (e.allowSlidePrev = !0),
        e.updateSize(),
        e.updateSlides(),
        e.updateSlidesClasses(),
        ("auto" === t.slidesPerView || t.slidesPerView > 1) &&
        e.isEnd &&
        !e.isBeginning &&
        !e.params.centeredSlides
          ? e.slideTo(e.slides.length - 1, 0, !1, !0)
          : e.slideTo(e.activeIndex, 0, !1, !0),
        e.autoplay &&
          e.autoplay.running &&
          e.autoplay.paused &&
          e.autoplay.run(),
        (e.allowSlidePrev = s),
        (e.allowSlideNext = i),
        e.params.watchOverflow && r !== e.snapGrid && e.checkOverflow();
    }
    let z = !1;
    function N() {}
    const R = (e, t) => {
        const n = u(),
          {
            params: i,
            touchEvents: s,
            el: r,
            wrapperEl: a,
            device: o,
            support: l,
          } = e,
          c = !!i.nested,
          d = "on" === t ? "addEventListener" : "removeEventListener",
          p = t;
        if (l.touch) {
          const t = !(
            "touchstart" !== s.start ||
            !l.passiveListener ||
            !i.passiveListeners
          ) && { passive: !0, capture: !1 };
          r[d](s.start, e.onTouchStart, t),
            r[d](
              s.move,
              e.onTouchMove,
              l.passiveListener ? { passive: !1, capture: c } : c
            ),
            r[d](s.end, e.onTouchEnd, t),
            s.cancel && r[d](s.cancel, e.onTouchEnd, t);
        } else
          r[d](s.start, e.onTouchStart, !1),
            n[d](s.move, e.onTouchMove, c),
            n[d](s.end, e.onTouchEnd, !1);
        (i.preventClicks || i.preventClicksPropagation) &&
          r[d]("click", e.onClick, !0),
          i.cssMode && a[d]("scroll", e.onScroll),
          i.updateOnWindowResize
            ? e[p](
                o.ios || o.android
                  ? "resize orientationchange observerUpdate"
                  : "resize observerUpdate",
                $,
                !0
              )
            : e[p]("observerUpdate", $, !0);
      },
      D = (e, t) => e.grid && t.grid && t.grid.rows > 1;
    var j = {
      init: !0,
      direction: "horizontal",
      touchEventsTarget: "wrapper",
      initialSlide: 0,
      speed: 300,
      cssMode: !1,
      updateOnWindowResize: !0,
      resizeObserver: !0,
      nested: !1,
      createElements: !1,
      enabled: !0,
      focusableElements:
        "input, select, option, textarea, button, video, label",
      width: null,
      height: null,
      preventInteractionOnTransition: !1,
      userAgent: null,
      url: null,
      edgeSwipeDetection: !1,
      edgeSwipeThreshold: 20,
      autoHeight: !1,
      setWrapperSize: !1,
      virtualTranslate: !1,
      effect: "slide",
      breakpoints: void 0,
      breakpointsBase: "window",
      spaceBetween: 0,
      slidesPerView: 1,
      slidesPerGroup: 1,
      slidesPerGroupSkip: 0,
      slidesPerGroupAuto: !1,
      centeredSlides: !1,
      centeredSlidesBounds: !1,
      slidesOffsetBefore: 0,
      slidesOffsetAfter: 0,
      normalizeSlideIndex: !0,
      centerInsufficientSlides: !1,
      watchOverflow: !0,
      roundLengths: !1,
      touchRatio: 1,
      touchAngle: 45,
      simulateTouch: !0,
      shortSwipes: !0,
      longSwipes: !0,
      longSwipesRatio: 0.5,
      longSwipesMs: 300,
      followFinger: !0,
      allowTouchMove: !0,
      threshold: 0,
      touchMoveStopPropagation: !1,
      touchStartPreventDefault: !0,
      touchStartForcePreventDefault: !1,
      touchReleaseOnEdges: !1,
      uniqueNavElements: !0,
      resistance: !0,
      resistanceRatio: 0.85,
      watchSlidesProgress: !1,
      grabCursor: !1,
      preventClicks: !0,
      preventClicksPropagation: !0,
      slideToClickedSlide: !1,
      preloadImages: !0,
      updateOnImagesReady: !0,
      loop: !1,
      loopAdditionalSlides: 0,
      loopedSlides: null,
      loopFillGroupWithBlank: !1,
      loopPreventsSlide: !0,
      rewind: !1,
      allowSlidePrev: !0,
      allowSlideNext: !0,
      swipeHandler: null,
      noSwiping: !0,
      noSwipingClass: "swiper-no-swiping",
      noSwipingSelector: null,
      passiveListeners: !0,
      maxBackfaceHiddenSlides: 10,
      containerModifierClass: "swiper-",
      slideClass: "swiper-slide",
      slideBlankClass: "swiper-slide-invisible-blank",
      slideActiveClass: "swiper-slide-active",
      slideDuplicateActiveClass: "swiper-slide-duplicate-active",
      slideVisibleClass: "swiper-slide-visible",
      slideDuplicateClass: "swiper-slide-duplicate",
      slideNextClass: "swiper-slide-next",
      slideDuplicateNextClass: "swiper-slide-duplicate-next",
      slidePrevClass: "swiper-slide-prev",
      slideDuplicatePrevClass: "swiper-slide-duplicate-prev",
      wrapperClass: "swiper-wrapper",
      runCallbacksOnInit: !0,
      _emitClasses: !1,
    };
    function B(e, t) {
      return function (n) {
        void 0 === n && (n = {});
        const i = Object.keys(n)[0],
          s = n[i];
        "object" == typeof s && null !== s
          ? (["navigation", "pagination", "scrollbar"].indexOf(i) >= 0 &&
              !0 === e[i] &&
              (e[i] = { auto: !0 }),
            i in e && "enabled" in s
              ? (!0 === e[i] && (e[i] = { enabled: !0 }),
                "object" != typeof e[i] ||
                  "enabled" in e[i] ||
                  (e[i].enabled = !0),
                e[i] || (e[i] = { enabled: !1 }),
                S(t, n))
              : S(t, n))
          : S(t, n);
      };
    }
    const V = {
        eventsEmitter: {
          on(e, t, n) {
            const i = this;
            if ("function" != typeof t) return i;
            const s = n ? "unshift" : "push";
            return (
              e.split(" ").forEach((e) => {
                i.eventsListeners[e] || (i.eventsListeners[e] = []),
                  i.eventsListeners[e][s](t);
              }),
              i
            );
          },
          once(e, t, n) {
            const i = this;
            if ("function" != typeof t) return i;
            function s() {
              i.off(e, s), s.__emitterProxy && delete s.__emitterProxy;
              for (
                var n = arguments.length, r = new Array(n), a = 0;
                a < n;
                a++
              )
                r[a] = arguments[a];
              t.apply(i, r);
            }
            return (s.__emitterProxy = t), i.on(e, s, n);
          },
          onAny(e, t) {
            const n = this;
            if ("function" != typeof e) return n;
            const i = t ? "unshift" : "push";
            return (
              n.eventsAnyListeners.indexOf(e) < 0 && n.eventsAnyListeners[i](e),
              n
            );
          },
          offAny(e) {
            const t = this;
            if (!t.eventsAnyListeners) return t;
            const n = t.eventsAnyListeners.indexOf(e);
            return n >= 0 && t.eventsAnyListeners.splice(n, 1), t;
          },
          off(e, t) {
            const n = this;
            return n.eventsListeners
              ? (e.split(" ").forEach((e) => {
                  void 0 === t
                    ? (n.eventsListeners[e] = [])
                    : n.eventsListeners[e] &&
                      n.eventsListeners[e].forEach((i, s) => {
                        (i === t ||
                          (i.__emitterProxy && i.__emitterProxy === t)) &&
                          n.eventsListeners[e].splice(s, 1);
                      });
                }),
                n)
              : n;
          },
          emit() {
            const e = this;
            if (!e.eventsListeners) return e;
            let t, n, i;
            for (var s = arguments.length, r = new Array(s), a = 0; a < s; a++)
              r[a] = arguments[a];
            return (
              "string" == typeof r[0] || Array.isArray(r[0])
                ? ((t = r[0]), (n = r.slice(1, r.length)), (i = e))
                : ((t = r[0].events), (n = r[0].data), (i = r[0].context || e)),
              n.unshift(i),
              (Array.isArray(t) ? t : t.split(" ")).forEach((t) => {
                e.eventsAnyListeners &&
                  e.eventsAnyListeners.length &&
                  e.eventsAnyListeners.forEach((e) => {
                    e.apply(i, [t, ...n]);
                  }),
                  e.eventsListeners &&
                    e.eventsListeners[t] &&
                    e.eventsListeners[t].forEach((e) => {
                      e.apply(i, n);
                    });
              }),
              e
            );
          },
        },
        update: {
          updateSize: function () {
            const e = this;
            let t, n;
            const i = e.$el;
            (t =
              void 0 !== e.params.width && null !== e.params.width
                ? e.params.width
                : i[0].clientWidth),
              (n =
                void 0 !== e.params.height && null !== e.params.height
                  ? e.params.height
                  : i[0].clientHeight),
              (0 === t && e.isHorizontal()) ||
                (0 === n && e.isVertical()) ||
                ((t =
                  t -
                  parseInt(i.css("padding-left") || 0, 10) -
                  parseInt(i.css("padding-right") || 0, 10)),
                (n =
                  n -
                  parseInt(i.css("padding-top") || 0, 10) -
                  parseInt(i.css("padding-bottom") || 0, 10)),
                Number.isNaN(t) && (t = 0),
                Number.isNaN(n) && (n = 0),
                Object.assign(e, {
                  width: t,
                  height: n,
                  size: e.isHorizontal() ? t : n,
                }));
          },
          updateSlides: function () {
            const e = this;
            function t(t) {
              return e.isHorizontal()
                ? t
                : {
                    width: "height",
                    "margin-top": "margin-left",
                    "margin-bottom ": "margin-right",
                    "margin-left": "margin-top",
                    "margin-right": "margin-bottom",
                    "padding-left": "padding-top",
                    "padding-right": "padding-bottom",
                    marginRight: "marginBottom",
                  }[t];
            }
            function n(e, n) {
              return parseFloat(e.getPropertyValue(t(n)) || 0);
            }
            const i = e.params,
              { $wrapperEl: s, size: r, rtlTranslate: a, wrongRTL: o } = e,
              l = e.virtual && i.virtual.enabled,
              c = l ? e.virtual.slides.length : e.slides.length,
              d = s.children("." + e.params.slideClass),
              u = l ? e.virtual.slides.length : d.length;
            let p = [];
            const f = [],
              h = [];
            let m = i.slidesOffsetBefore;
            "function" == typeof m && (m = i.slidesOffsetBefore.call(e));
            let g = i.slidesOffsetAfter;
            "function" == typeof g && (g = i.slidesOffsetAfter.call(e));
            const v = e.snapGrid.length,
              b = e.slidesGrid.length;
            let w = i.spaceBetween,
              y = -m,
              x = 0,
              _ = 0;
            if (void 0 === r) return;
            "string" == typeof w &&
              w.indexOf("%") >= 0 &&
              (w = (parseFloat(w.replace("%", "")) / 100) * r),
              (e.virtualSize = -w),
              a
                ? d.css({ marginLeft: "", marginBottom: "", marginTop: "" })
                : d.css({ marginRight: "", marginBottom: "", marginTop: "" }),
              i.centeredSlides &&
                i.cssMode &&
                (k(e.wrapperEl, "--swiper-centered-offset-before", ""),
                k(e.wrapperEl, "--swiper-centered-offset-after", ""));
            const E = i.grid && i.grid.rows > 1 && e.grid;
            let T;
            E && e.grid.initSlides(u);
            const C =
              "auto" === i.slidesPerView &&
              i.breakpoints &&
              Object.keys(i.breakpoints).filter(
                (e) => void 0 !== i.breakpoints[e].slidesPerView
              ).length > 0;
            for (let s = 0; s < u; s += 1) {
              T = 0;
              const a = d.eq(s);
              if (
                (E && e.grid.updateSlide(s, a, u, t),
                "none" !== a.css("display"))
              ) {
                if ("auto" === i.slidesPerView) {
                  C && (d[s].style[t("width")] = "");
                  const r = getComputedStyle(a[0]),
                    o = a[0].style.transform,
                    l = a[0].style.webkitTransform;
                  if (
                    (o && (a[0].style.transform = "none"),
                    l && (a[0].style.webkitTransform = "none"),
                    i.roundLengths)
                  )
                    T = e.isHorizontal() ? a.outerWidth(!0) : a.outerHeight(!0);
                  else {
                    const e = n(r, "width"),
                      t = n(r, "padding-left"),
                      i = n(r, "padding-right"),
                      s = n(r, "margin-left"),
                      o = n(r, "margin-right"),
                      l = r.getPropertyValue("box-sizing");
                    if (l && "border-box" === l) T = e + s + o;
                    else {
                      const { clientWidth: n, offsetWidth: r } = a[0];
                      T = e + t + i + s + o + (r - n);
                    }
                  }
                  o && (a[0].style.transform = o),
                    l && (a[0].style.webkitTransform = l),
                    i.roundLengths && (T = Math.floor(T));
                } else
                  (T = (r - (i.slidesPerView - 1) * w) / i.slidesPerView),
                    i.roundLengths && (T = Math.floor(T)),
                    d[s] && (d[s].style[t("width")] = T + "px");
                d[s] && (d[s].swiperSlideSize = T),
                  h.push(T),
                  i.centeredSlides
                    ? ((y = y + T / 2 + x / 2 + w),
                      0 === x && 0 !== s && (y = y - r / 2 - w),
                      0 === s && (y = y - r / 2 - w),
                      Math.abs(y) < 0.001 && (y = 0),
                      i.roundLengths && (y = Math.floor(y)),
                      _ % i.slidesPerGroup == 0 && p.push(y),
                      f.push(y))
                    : (i.roundLengths && (y = Math.floor(y)),
                      (_ - Math.min(e.params.slidesPerGroupSkip, _)) %
                        e.params.slidesPerGroup ==
                        0 && p.push(y),
                      f.push(y),
                      (y = y + T + w)),
                  (e.virtualSize += T + w),
                  (x = T),
                  (_ += 1);
              }
            }
            if (
              ((e.virtualSize = Math.max(e.virtualSize, r) + g),
              a &&
                o &&
                ("slide" === i.effect || "coverflow" === i.effect) &&
                s.css({ width: e.virtualSize + i.spaceBetween + "px" }),
              i.setWrapperSize &&
                s.css({ [t("width")]: e.virtualSize + i.spaceBetween + "px" }),
              E && e.grid.updateWrapperSize(T, p, t),
              !i.centeredSlides)
            ) {
              const t = [];
              for (let n = 0; n < p.length; n += 1) {
                let s = p[n];
                i.roundLengths && (s = Math.floor(s)),
                  p[n] <= e.virtualSize - r && t.push(s);
              }
              (p = t),
                Math.floor(e.virtualSize - r) - Math.floor(p[p.length - 1]) >
                  1 && p.push(e.virtualSize - r);
            }
            if ((0 === p.length && (p = [0]), 0 !== i.spaceBetween)) {
              const n = e.isHorizontal() && a ? "marginLeft" : t("marginRight");
              d.filter((e, t) => !i.cssMode || t !== d.length - 1).css({
                [n]: w + "px",
              });
            }
            if (i.centeredSlides && i.centeredSlidesBounds) {
              let e = 0;
              h.forEach((t) => {
                e += t + (i.spaceBetween ? i.spaceBetween : 0);
              });
              const t = (e -= i.spaceBetween) - r;
              p = p.map((e) => (e < 0 ? -m : e > t ? t + g : e));
            }
            if (i.centerInsufficientSlides) {
              let e = 0;
              if (
                (h.forEach((t) => {
                  e += t + (i.spaceBetween ? i.spaceBetween : 0);
                }),
                (e -= i.spaceBetween) < r)
              ) {
                const t = (r - e) / 2;
                p.forEach((e, n) => {
                  p[n] = e - t;
                }),
                  f.forEach((e, n) => {
                    f[n] = e + t;
                  });
              }
            }
            if (
              (Object.assign(e, {
                slides: d,
                snapGrid: p,
                slidesGrid: f,
                slidesSizesGrid: h,
              }),
              i.centeredSlides && i.cssMode && !i.centeredSlidesBounds)
            ) {
              k(e.wrapperEl, "--swiper-centered-offset-before", -p[0] + "px"),
                k(
                  e.wrapperEl,
                  "--swiper-centered-offset-after",
                  e.size / 2 - h[h.length - 1] / 2 + "px"
                );
              const t = -e.snapGrid[0],
                n = -e.slidesGrid[0];
              (e.snapGrid = e.snapGrid.map((e) => e + t)),
                (e.slidesGrid = e.slidesGrid.map((e) => e + n));
            }
            if (
              (u !== c && e.emit("slidesLengthChange"),
              p.length !== v &&
                (e.params.watchOverflow && e.checkOverflow(),
                e.emit("snapGridLengthChange")),
              f.length !== b && e.emit("slidesGridLengthChange"),
              i.watchSlidesProgress && e.updateSlidesOffset(),
              !(
                l ||
                i.cssMode ||
                ("slide" !== i.effect && "fade" !== i.effect)
              ))
            ) {
              const t = i.containerModifierClass + "backface-hidden",
                n = e.$el.hasClass(t);
              u <= i.maxBackfaceHiddenSlides
                ? n || e.$el.addClass(t)
                : n && e.$el.removeClass(t);
            }
          },
          updateAutoHeight: function (e) {
            const t = this,
              n = [],
              i = t.virtual && t.params.virtual.enabled;
            let s,
              r = 0;
            "number" == typeof e
              ? t.setTransition(e)
              : !0 === e && t.setTransition(t.params.speed);
            const a = (e) =>
              i
                ? t.slides.filter(
                    (t) =>
                      parseInt(
                        t.getAttribute("data-swiper-slide-index"),
                        10
                      ) === e
                  )[0]
                : t.slides.eq(e)[0];
            if ("auto" !== t.params.slidesPerView && t.params.slidesPerView > 1)
              if (t.params.centeredSlides)
                t.visibleSlides.each((e) => {
                  n.push(e);
                });
              else
                for (s = 0; s < Math.ceil(t.params.slidesPerView); s += 1) {
                  const e = t.activeIndex + s;
                  if (e > t.slides.length && !i) break;
                  n.push(a(e));
                }
            else n.push(a(t.activeIndex));
            for (s = 0; s < n.length; s += 1)
              if (void 0 !== n[s]) {
                const e = n[s].offsetHeight;
                r = e > r ? e : r;
              }
            (r || 0 === r) && t.$wrapperEl.css("height", r + "px");
          },
          updateSlidesOffset: function () {
            const e = this,
              t = e.slides;
            for (let n = 0; n < t.length; n += 1)
              t[n].swiperSlideOffset = e.isHorizontal()
                ? t[n].offsetLeft
                : t[n].offsetTop;
          },
          updateSlidesProgress: function (e) {
            void 0 === e && (e = (this && this.translate) || 0);
            const t = this,
              n = t.params,
              { slides: i, rtlTranslate: s, snapGrid: r } = t;
            if (0 === i.length) return;
            void 0 === i[0].swiperSlideOffset && t.updateSlidesOffset();
            let a = -e;
            s && (a = e),
              i.removeClass(n.slideVisibleClass),
              (t.visibleSlidesIndexes = []),
              (t.visibleSlides = []);
            for (let e = 0; e < i.length; e += 1) {
              const o = i[e];
              let l = o.swiperSlideOffset;
              n.cssMode && n.centeredSlides && (l -= i[0].swiperSlideOffset);
              const c =
                  (a + (n.centeredSlides ? t.minTranslate() : 0) - l) /
                  (o.swiperSlideSize + n.spaceBetween),
                d =
                  (a - r[0] + (n.centeredSlides ? t.minTranslate() : 0) - l) /
                  (o.swiperSlideSize + n.spaceBetween),
                u = -(a - l),
                p = u + t.slidesSizesGrid[e];
              ((u >= 0 && u < t.size - 1) ||
                (p > 1 && p <= t.size) ||
                (u <= 0 && p >= t.size)) &&
                (t.visibleSlides.push(o),
                t.visibleSlidesIndexes.push(e),
                i.eq(e).addClass(n.slideVisibleClass)),
                (o.progress = s ? -c : c),
                (o.originalProgress = s ? -d : d);
            }
            t.visibleSlides = x(t.visibleSlides);
          },
          updateProgress: function (e) {
            const t = this;
            if (void 0 === e) {
              const n = t.rtlTranslate ? -1 : 1;
              e = (t && t.translate && t.translate * n) || 0;
            }
            const n = t.params,
              i = t.maxTranslate() - t.minTranslate();
            let { progress: s, isBeginning: r, isEnd: a } = t;
            const o = r,
              l = a;
            0 === i
              ? ((s = 0), (r = !0), (a = !0))
              : ((r = (s = (e - t.minTranslate()) / i) <= 0), (a = s >= 1)),
              Object.assign(t, { progress: s, isBeginning: r, isEnd: a }),
              (n.watchSlidesProgress || (n.centeredSlides && n.autoHeight)) &&
                t.updateSlidesProgress(e),
              r && !o && t.emit("reachBeginning toEdge"),
              a && !l && t.emit("reachEnd toEdge"),
              ((o && !r) || (l && !a)) && t.emit("fromEdge"),
              t.emit("progress", s);
          },
          updateSlidesClasses: function () {
            const e = this,
              {
                slides: t,
                params: n,
                $wrapperEl: i,
                activeIndex: s,
                realIndex: r,
              } = e,
              a = e.virtual && n.virtual.enabled;
            let o;
            t.removeClass(
              `${n.slideActiveClass} ${n.slideNextClass} ${n.slidePrevClass} ${n.slideDuplicateActiveClass} ${n.slideDuplicateNextClass} ${n.slideDuplicatePrevClass}`
            ),
              (o = a
                ? e.$wrapperEl.find(
                    `.${n.slideClass}[data-swiper-slide-index="${s}"]`
                  )
                : t.eq(s)).addClass(n.slideActiveClass),
              n.loop &&
                (o.hasClass(n.slideDuplicateClass)
                  ? i
                      .children(
                        `.${n.slideClass}:not(.${n.slideDuplicateClass})[data-swiper-slide-index="${r}"]`
                      )
                      .addClass(n.slideDuplicateActiveClass)
                  : i
                      .children(
                        `.${n.slideClass}.${n.slideDuplicateClass}[data-swiper-slide-index="${r}"]`
                      )
                      .addClass(n.slideDuplicateActiveClass));
            let l = o
              .nextAll("." + n.slideClass)
              .eq(0)
              .addClass(n.slideNextClass);
            n.loop &&
              0 === l.length &&
              (l = t.eq(0)).addClass(n.slideNextClass);
            let c = o
              .prevAll("." + n.slideClass)
              .eq(0)
              .addClass(n.slidePrevClass);
            n.loop &&
              0 === c.length &&
              (c = t.eq(-1)).addClass(n.slidePrevClass),
              n.loop &&
                (l.hasClass(n.slideDuplicateClass)
                  ? i
                      .children(
                        `.${n.slideClass}:not(.${
                          n.slideDuplicateClass
                        })[data-swiper-slide-index="${l.attr(
                          "data-swiper-slide-index"
                        )}"]`
                      )
                      .addClass(n.slideDuplicateNextClass)
                  : i
                      .children(
                        `.${n.slideClass}.${
                          n.slideDuplicateClass
                        }[data-swiper-slide-index="${l.attr(
                          "data-swiper-slide-index"
                        )}"]`
                      )
                      .addClass(n.slideDuplicateNextClass),
                c.hasClass(n.slideDuplicateClass)
                  ? i
                      .children(
                        `.${n.slideClass}:not(.${
                          n.slideDuplicateClass
                        })[data-swiper-slide-index="${c.attr(
                          "data-swiper-slide-index"
                        )}"]`
                      )
                      .addClass(n.slideDuplicatePrevClass)
                  : i
                      .children(
                        `.${n.slideClass}.${
                          n.slideDuplicateClass
                        }[data-swiper-slide-index="${c.attr(
                          "data-swiper-slide-index"
                        )}"]`
                      )
                      .addClass(n.slideDuplicatePrevClass)),
              e.emitSlidesClasses();
          },
          updateActiveIndex: function (e) {
            const t = this,
              n = t.rtlTranslate ? t.translate : -t.translate,
              {
                slidesGrid: i,
                snapGrid: s,
                params: r,
                activeIndex: a,
                realIndex: o,
                snapIndex: l,
              } = t;
            let c,
              d = e;
            if (void 0 === d) {
              for (let e = 0; e < i.length; e += 1)
                void 0 !== i[e + 1]
                  ? n >= i[e] && n < i[e + 1] - (i[e + 1] - i[e]) / 2
                    ? (d = e)
                    : n >= i[e] && n < i[e + 1] && (d = e + 1)
                  : n >= i[e] && (d = e);
              r.normalizeSlideIndex && (d < 0 || void 0 === d) && (d = 0);
            }
            if (s.indexOf(n) >= 0) c = s.indexOf(n);
            else {
              const e = Math.min(r.slidesPerGroupSkip, d);
              c = e + Math.floor((d - e) / r.slidesPerGroup);
            }
            if ((c >= s.length && (c = s.length - 1), d === a))
              return void (
                c !== l && ((t.snapIndex = c), t.emit("snapIndexChange"))
              );
            const u = parseInt(
              t.slides.eq(d).attr("data-swiper-slide-index") || d,
              10
            );
            Object.assign(t, {
              snapIndex: c,
              realIndex: u,
              previousIndex: a,
              activeIndex: d,
            }),
              t.emit("activeIndexChange"),
              t.emit("snapIndexChange"),
              o !== u && t.emit("realIndexChange"),
              (t.initialized || t.params.runCallbacksOnInit) &&
                t.emit("slideChange");
          },
          updateClickedSlide: function (e) {
            const t = this,
              n = t.params,
              i = x(e).closest("." + n.slideClass)[0];
            let s,
              r = !1;
            if (i)
              for (let e = 0; e < t.slides.length; e += 1)
                if (t.slides[e] === i) {
                  (r = !0), (s = e);
                  break;
                }
            if (!i || !r)
              return (t.clickedSlide = void 0), void (t.clickedIndex = void 0);
            (t.clickedSlide = i),
              t.virtual && t.params.virtual.enabled
                ? (t.clickedIndex = parseInt(
                    x(i).attr("data-swiper-slide-index"),
                    10
                  ))
                : (t.clickedIndex = s),
              n.slideToClickedSlide &&
                void 0 !== t.clickedIndex &&
                t.clickedIndex !== t.activeIndex &&
                t.slideToClickedSlide();
          },
        },
        translate: {
          getTranslate: function (e) {
            void 0 === e && (e = this.isHorizontal() ? "x" : "y");
            const {
              params: t,
              rtlTranslate: n,
              translate: i,
              $wrapperEl: s,
            } = this;
            if (t.virtualTranslate) return n ? -i : i;
            if (t.cssMode) return i;
            let r = (function (e, t) {
              void 0 === t && (t = "x");
              const n = f();
              let i, s, r;
              const a = (function (e) {
                const t = f();
                let n;
                return (
                  t.getComputedStyle && (n = t.getComputedStyle(e, null)),
                  !n && e.currentStyle && (n = e.currentStyle),
                  n || (n = e.style),
                  n
                );
              })(e);
              return (
                n.WebKitCSSMatrix
                  ? ((s = a.transform || a.webkitTransform).split(",").length >
                      6 &&
                      (s = s
                        .split(", ")
                        .map((e) => e.replace(",", "."))
                        .join(", ")),
                    (r = new n.WebKitCSSMatrix("none" === s ? "" : s)))
                  : (i = (r =
                      a.MozTransform ||
                      a.OTransform ||
                      a.MsTransform ||
                      a.msTransform ||
                      a.transform ||
                      a
                        .getPropertyValue("transform")
                        .replace("translate(", "matrix(1, 0, 0, 1,"))
                      .toString()
                      .split(",")),
                "x" === t &&
                  (s = n.WebKitCSSMatrix
                    ? r.m41
                    : 16 === i.length
                    ? parseFloat(i[12])
                    : parseFloat(i[4])),
                "y" === t &&
                  (s = n.WebKitCSSMatrix
                    ? r.m42
                    : 16 === i.length
                    ? parseFloat(i[13])
                    : parseFloat(i[5])),
                s || 0
              );
            })(s[0], e);
            return n && (r = -r), r || 0;
          },
          setTranslate: function (e, t) {
            const n = this,
              {
                rtlTranslate: i,
                params: s,
                $wrapperEl: r,
                wrapperEl: a,
                progress: o,
              } = n;
            let l,
              c = 0,
              d = 0;
            n.isHorizontal() ? (c = i ? -e : e) : (d = e),
              s.roundLengths && ((c = Math.floor(c)), (d = Math.floor(d))),
              s.cssMode
                ? (a[n.isHorizontal() ? "scrollLeft" : "scrollTop"] =
                    n.isHorizontal() ? -c : -d)
                : s.virtualTranslate ||
                  r.transform(`translate3d(${c}px, ${d}px, 0px)`),
              (n.previousTranslate = n.translate),
              (n.translate = n.isHorizontal() ? c : d);
            const u = n.maxTranslate() - n.minTranslate();
            (l = 0 === u ? 0 : (e - n.minTranslate()) / u) !== o &&
              n.updateProgress(e),
              n.emit("setTranslate", n.translate, t);
          },
          minTranslate: function () {
            return -this.snapGrid[0];
          },
          maxTranslate: function () {
            return -this.snapGrid[this.snapGrid.length - 1];
          },
          translateTo: function (e, t, n, i, s) {
            void 0 === e && (e = 0),
              void 0 === t && (t = this.params.speed),
              void 0 === n && (n = !0),
              void 0 === i && (i = !0);
            const r = this,
              { params: a, wrapperEl: o } = r;
            if (r.animating && a.preventInteractionOnTransition) return !1;
            const l = r.minTranslate(),
              c = r.maxTranslate();
            let d;
            if (
              ((d = i && e > l ? l : i && e < c ? c : e),
              r.updateProgress(d),
              a.cssMode)
            ) {
              const e = r.isHorizontal();
              if (0 === t) o[e ? "scrollLeft" : "scrollTop"] = -d;
              else {
                if (!r.support.smoothScroll)
                  return (
                    M({
                      swiper: r,
                      targetPosition: -d,
                      side: e ? "left" : "top",
                    }),
                    !0
                  );
                o.scrollTo({ [e ? "left" : "top"]: -d, behavior: "smooth" });
              }
              return !0;
            }
            return (
              0 === t
                ? (r.setTransition(0),
                  r.setTranslate(d),
                  n &&
                    (r.emit("beforeTransitionStart", t, s),
                    r.emit("transitionEnd")))
                : (r.setTransition(t),
                  r.setTranslate(d),
                  n &&
                    (r.emit("beforeTransitionStart", t, s),
                    r.emit("transitionStart")),
                  r.animating ||
                    ((r.animating = !0),
                    r.onTranslateToWrapperTransitionEnd ||
                      (r.onTranslateToWrapperTransitionEnd = function (e) {
                        r &&
                          !r.destroyed &&
                          e.target === this &&
                          (r.$wrapperEl[0].removeEventListener(
                            "transitionend",
                            r.onTranslateToWrapperTransitionEnd
                          ),
                          r.$wrapperEl[0].removeEventListener(
                            "webkitTransitionEnd",
                            r.onTranslateToWrapperTransitionEnd
                          ),
                          (r.onTranslateToWrapperTransitionEnd = null),
                          delete r.onTranslateToWrapperTransitionEnd,
                          n && r.emit("transitionEnd"));
                      }),
                    r.$wrapperEl[0].addEventListener(
                      "transitionend",
                      r.onTranslateToWrapperTransitionEnd
                    ),
                    r.$wrapperEl[0].addEventListener(
                      "webkitTransitionEnd",
                      r.onTranslateToWrapperTransitionEnd
                    ))),
              !0
            );
          },
        },
        transition: {
          setTransition: function (e, t) {
            const n = this;
            n.params.cssMode || n.$wrapperEl.transition(e),
              n.emit("setTransition", e, t);
          },
          transitionStart: function (e, t) {
            void 0 === e && (e = !0);
            const n = this,
              { params: i } = n;
            i.cssMode ||
              (i.autoHeight && n.updateAutoHeight(),
              I({ swiper: n, runCallbacks: e, direction: t, step: "Start" }));
          },
          transitionEnd: function (e, t) {
            void 0 === e && (e = !0);
            const { params: n } = this;
            (this.animating = !1),
              n.cssMode ||
                (this.setTransition(0),
                I({
                  swiper: this,
                  runCallbacks: e,
                  direction: t,
                  step: "End",
                }));
          },
        },
        slide: {
          slideTo: function (e, t, n, i, s) {
            if (
              (void 0 === e && (e = 0),
              void 0 === t && (t = this.params.speed),
              void 0 === n && (n = !0),
              "number" != typeof e && "string" != typeof e)
            )
              throw new Error(
                `The 'index' argument cannot have type other than 'number' or 'string'. [${typeof e}] given.`
              );
            if ("string" == typeof e) {
              const t = parseInt(e, 10);
              if (!isFinite(t))
                throw new Error(
                  `The passed-in 'index' (string) couldn't be converted to 'number'. [${e}] given.`
                );
              e = t;
            }
            const r = this;
            let a = e;
            a < 0 && (a = 0);
            const {
              params: o,
              snapGrid: l,
              slidesGrid: c,
              previousIndex: d,
              activeIndex: u,
              rtlTranslate: p,
              wrapperEl: f,
              enabled: h,
            } = r;
            if (
              (r.animating && o.preventInteractionOnTransition) ||
              (!h && !i && !s)
            )
              return !1;
            const m = Math.min(r.params.slidesPerGroupSkip, a);
            let g = m + Math.floor((a - m) / r.params.slidesPerGroup);
            g >= l.length && (g = l.length - 1),
              (u || o.initialSlide || 0) === (d || 0) &&
                n &&
                r.emit("beforeSlideChangeStart");
            const v = -l[g];
            if ((r.updateProgress(v), o.normalizeSlideIndex))
              for (let e = 0; e < c.length; e += 1) {
                const t = -Math.floor(100 * v),
                  n = Math.floor(100 * c[e]),
                  i = Math.floor(100 * c[e + 1]);
                void 0 !== c[e + 1]
                  ? t >= n && t < i - (i - n) / 2
                    ? (a = e)
                    : t >= n && t < i && (a = e + 1)
                  : t >= n && (a = e);
              }
            if (r.initialized && a !== u) {
              if (!r.allowSlideNext && v < r.translate && v < r.minTranslate())
                return !1;
              if (
                !r.allowSlidePrev &&
                v > r.translate &&
                v > r.maxTranslate() &&
                (u || 0) !== a
              )
                return !1;
            }
            let b;
            if (
              ((b = a > u ? "next" : a < u ? "prev" : "reset"),
              (p && -v === r.translate) || (!p && v === r.translate))
            )
              return (
                r.updateActiveIndex(a),
                o.autoHeight && r.updateAutoHeight(),
                r.updateSlidesClasses(),
                "slide" !== o.effect && r.setTranslate(v),
                "reset" !== b &&
                  (r.transitionStart(n, b), r.transitionEnd(n, b)),
                !1
              );
            if (o.cssMode) {
              const e = r.isHorizontal(),
                n = p ? v : -v;
              if (0 === t) {
                const t = r.virtual && r.params.virtual.enabled;
                t &&
                  ((r.wrapperEl.style.scrollSnapType = "none"),
                  (r._immediateVirtual = !0)),
                  (f[e ? "scrollLeft" : "scrollTop"] = n),
                  t &&
                    requestAnimationFrame(() => {
                      (r.wrapperEl.style.scrollSnapType = ""),
                        (r._swiperImmediateVirtual = !1);
                    });
              } else {
                if (!r.support.smoothScroll)
                  return (
                    M({
                      swiper: r,
                      targetPosition: n,
                      side: e ? "left" : "top",
                    }),
                    !0
                  );
                f.scrollTo({ [e ? "left" : "top"]: n, behavior: "smooth" });
              }
              return !0;
            }
            return (
              r.setTransition(t),
              r.setTranslate(v),
              r.updateActiveIndex(a),
              r.updateSlidesClasses(),
              r.emit("beforeTransitionStart", t, i),
              r.transitionStart(n, b),
              0 === t
                ? r.transitionEnd(n, b)
                : r.animating ||
                  ((r.animating = !0),
                  r.onSlideToWrapperTransitionEnd ||
                    (r.onSlideToWrapperTransitionEnd = function (e) {
                      r &&
                        !r.destroyed &&
                        e.target === this &&
                        (r.$wrapperEl[0].removeEventListener(
                          "transitionend",
                          r.onSlideToWrapperTransitionEnd
                        ),
                        r.$wrapperEl[0].removeEventListener(
                          "webkitTransitionEnd",
                          r.onSlideToWrapperTransitionEnd
                        ),
                        (r.onSlideToWrapperTransitionEnd = null),
                        delete r.onSlideToWrapperTransitionEnd,
                        r.transitionEnd(n, b));
                    }),
                  r.$wrapperEl[0].addEventListener(
                    "transitionend",
                    r.onSlideToWrapperTransitionEnd
                  ),
                  r.$wrapperEl[0].addEventListener(
                    "webkitTransitionEnd",
                    r.onSlideToWrapperTransitionEnd
                  )),
              !0
            );
          },
          slideToLoop: function (e, t, n, i) {
            void 0 === e && (e = 0),
              void 0 === t && (t = this.params.speed),
              void 0 === n && (n = !0);
            const s = this;
            let r = e;
            return (
              s.params.loop && (r += s.loopedSlides), s.slideTo(r, t, n, i)
            );
          },
          slideNext: function (e, t, n) {
            void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
            const i = this,
              { animating: s, enabled: r, params: a } = i;
            if (!r) return i;
            let o = a.slidesPerGroup;
            "auto" === a.slidesPerView &&
              1 === a.slidesPerGroup &&
              a.slidesPerGroupAuto &&
              (o = Math.max(i.slidesPerViewDynamic("current", !0), 1));
            const l = i.activeIndex < a.slidesPerGroupSkip ? 1 : o;
            if (a.loop) {
              if (s && a.loopPreventsSlide) return !1;
              i.loopFix(), (i._clientLeft = i.$wrapperEl[0].clientLeft);
            }
            return a.rewind && i.isEnd
              ? i.slideTo(0, e, t, n)
              : i.slideTo(i.activeIndex + l, e, t, n);
          },
          slidePrev: function (e, t, n) {
            void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
            const i = this,
              {
                params: s,
                animating: r,
                snapGrid: a,
                slidesGrid: o,
                rtlTranslate: l,
                enabled: c,
              } = i;
            if (!c) return i;
            if (s.loop) {
              if (r && s.loopPreventsSlide) return !1;
              i.loopFix(), (i._clientLeft = i.$wrapperEl[0].clientLeft);
            }
            function d(e) {
              return e < 0 ? -Math.floor(Math.abs(e)) : Math.floor(e);
            }
            const u = d(l ? i.translate : -i.translate),
              p = a.map((e) => d(e));
            let f = a[p.indexOf(u) - 1];
            if (void 0 === f && s.cssMode) {
              let e;
              a.forEach((t, n) => {
                u >= t && (e = n);
              }),
                void 0 !== e && (f = a[e > 0 ? e - 1 : e]);
            }
            let h = 0;
            if (
              (void 0 !== f &&
                ((h = o.indexOf(f)) < 0 && (h = i.activeIndex - 1),
                "auto" === s.slidesPerView &&
                  1 === s.slidesPerGroup &&
                  s.slidesPerGroupAuto &&
                  ((h = h - i.slidesPerViewDynamic("previous", !0) + 1),
                  (h = Math.max(h, 0)))),
              s.rewind && i.isBeginning)
            ) {
              const s =
                i.params.virtual && i.params.virtual.enabled && i.virtual
                  ? i.virtual.slides.length - 1
                  : i.slides.length - 1;
              return i.slideTo(s, e, t, n);
            }
            return i.slideTo(h, e, t, n);
          },
          slideReset: function (e, t, n) {
            return (
              void 0 === e && (e = this.params.speed),
              void 0 === t && (t = !0),
              this.slideTo(this.activeIndex, e, t, n)
            );
          },
          slideToClosest: function (e, t, n, i) {
            void 0 === e && (e = this.params.speed),
              void 0 === t && (t = !0),
              void 0 === i && (i = 0.5);
            const s = this;
            let r = s.activeIndex;
            const a = Math.min(s.params.slidesPerGroupSkip, r),
              o = a + Math.floor((r - a) / s.params.slidesPerGroup),
              l = s.rtlTranslate ? s.translate : -s.translate;
            if (l >= s.snapGrid[o]) {
              const e = s.snapGrid[o];
              l - e > (s.snapGrid[o + 1] - e) * i &&
                (r += s.params.slidesPerGroup);
            } else {
              const e = s.snapGrid[o - 1];
              l - e <= (s.snapGrid[o] - e) * i &&
                (r -= s.params.slidesPerGroup);
            }
            return (
              (r = Math.max(r, 0)),
              (r = Math.min(r, s.slidesGrid.length - 1)),
              s.slideTo(r, e, t, n)
            );
          },
          slideToClickedSlide: function () {
            const e = this,
              { params: t, $wrapperEl: n } = e,
              i =
                "auto" === t.slidesPerView
                  ? e.slidesPerViewDynamic()
                  : t.slidesPerView;
            let s,
              r = e.clickedIndex;
            if (t.loop) {
              if (e.animating) return;
              (s = parseInt(
                x(e.clickedSlide).attr("data-swiper-slide-index"),
                10
              )),
                t.centeredSlides
                  ? r < e.loopedSlides - i / 2 ||
                    r > e.slides.length - e.loopedSlides + i / 2
                    ? (e.loopFix(),
                      (r = n
                        .children(
                          `.${t.slideClass}[data-swiper-slide-index="${s}"]:not(.${t.slideDuplicateClass})`
                        )
                        .eq(0)
                        .index()),
                      _(() => {
                        e.slideTo(r);
                      }))
                    : e.slideTo(r)
                  : r > e.slides.length - i
                  ? (e.loopFix(),
                    (r = n
                      .children(
                        `.${t.slideClass}[data-swiper-slide-index="${s}"]:not(.${t.slideDuplicateClass})`
                      )
                      .eq(0)
                      .index()),
                    _(() => {
                      e.slideTo(r);
                    }))
                  : e.slideTo(r);
            } else e.slideTo(r);
          },
        },
        loop: {
          loopCreate: function () {
            const e = this,
              t = u(),
              { params: n, $wrapperEl: i } = e,
              s = i.children().length > 0 ? x(i.children()[0].parentNode) : i;
            s.children(`.${n.slideClass}.${n.slideDuplicateClass}`).remove();
            let r = s.children("." + n.slideClass);
            if (n.loopFillGroupWithBlank) {
              const e = n.slidesPerGroup - (r.length % n.slidesPerGroup);
              if (e !== n.slidesPerGroup) {
                for (let i = 0; i < e; i += 1) {
                  const e = x(t.createElement("div")).addClass(
                    `${n.slideClass} ${n.slideBlankClass}`
                  );
                  s.append(e);
                }
                r = s.children("." + n.slideClass);
              }
            }
            "auto" !== n.slidesPerView ||
              n.loopedSlides ||
              (n.loopedSlides = r.length),
              (e.loopedSlides = Math.ceil(
                parseFloat(n.loopedSlides || n.slidesPerView, 10)
              )),
              (e.loopedSlides += n.loopAdditionalSlides),
              e.loopedSlides > r.length && (e.loopedSlides = r.length);
            const a = [],
              o = [];
            r.each((t, n) => {
              const i = x(t);
              n < e.loopedSlides && o.push(t),
                n < r.length && n >= r.length - e.loopedSlides && a.push(t),
                i.attr("data-swiper-slide-index", n);
            });
            for (let e = 0; e < o.length; e += 1)
              s.append(x(o[e].cloneNode(!0)).addClass(n.slideDuplicateClass));
            for (let e = a.length - 1; e >= 0; e -= 1)
              s.prepend(x(a[e].cloneNode(!0)).addClass(n.slideDuplicateClass));
          },
          loopFix: function () {
            const e = this;
            e.emit("beforeLoopFix");
            const {
              activeIndex: t,
              slides: n,
              loopedSlides: i,
              allowSlidePrev: s,
              allowSlideNext: r,
              snapGrid: a,
              rtlTranslate: o,
            } = e;
            let l;
            (e.allowSlidePrev = !0), (e.allowSlideNext = !0);
            const c = -a[t] - e.getTranslate();
            t < i
              ? ((l = n.length - 3 * i + t),
                (l += i),
                e.slideTo(l, 0, !1, !0) &&
                  0 !== c &&
                  e.setTranslate((o ? -e.translate : e.translate) - c))
              : t >= n.length - i &&
                ((l = -n.length + t + i),
                (l += i),
                e.slideTo(l, 0, !1, !0) &&
                  0 !== c &&
                  e.setTranslate((o ? -e.translate : e.translate) - c)),
              (e.allowSlidePrev = s),
              (e.allowSlideNext = r),
              e.emit("loopFix");
          },
          loopDestroy: function () {
            const { $wrapperEl: e, params: t, slides: n } = this;
            e
              .children(
                `.${t.slideClass}.${t.slideDuplicateClass},.${t.slideClass}.${t.slideBlankClass}`
              )
              .remove(),
              n.removeAttr("data-swiper-slide-index");
          },
        },
        grabCursor: {
          setGrabCursor: function (e) {
            if (
              this.support.touch ||
              !this.params.simulateTouch ||
              (this.params.watchOverflow && this.isLocked) ||
              this.params.cssMode
            )
              return;
            const t =
              "container" === this.params.touchEventsTarget
                ? this.el
                : this.wrapperEl;
            (t.style.cursor = "move"),
              (t.style.cursor = e ? "grabbing" : "grab");
          },
          unsetGrabCursor: function () {
            this.support.touch ||
              (this.params.watchOverflow && this.isLocked) ||
              this.params.cssMode ||
              (this[
                "container" === this.params.touchEventsTarget
                  ? "el"
                  : "wrapperEl"
              ].style.cursor = "");
          },
        },
        events: {
          attachEvents: function () {
            const e = this,
              t = u(),
              { params: n, support: i } = e;
            (e.onTouchStart = function (e) {
              const t = this,
                n = u(),
                i = f(),
                s = t.touchEventsData,
                { params: r, touches: a, enabled: o } = t;
              if (!o) return;
              if (t.animating && r.preventInteractionOnTransition) return;
              !t.animating && r.cssMode && r.loop && t.loopFix();
              let l = e;
              l.originalEvent && (l = l.originalEvent);
              let c = x(l.target);
              if (
                "wrapper" === r.touchEventsTarget &&
                !c.closest(t.wrapperEl).length
              )
                return;
              if (
                ((s.isTouchEvent = "touchstart" === l.type),
                !s.isTouchEvent && "which" in l && 3 === l.which)
              )
                return;
              if (!s.isTouchEvent && "button" in l && l.button > 0) return;
              if (s.isTouched && s.isMoved) return;
              r.noSwipingClass &&
                "" !== r.noSwipingClass &&
                l.target &&
                l.target.shadowRoot &&
                e.path &&
                e.path[0] &&
                (c = x(e.path[0]));
              const d = r.noSwipingSelector
                  ? r.noSwipingSelector
                  : "." + r.noSwipingClass,
                p = !(!l.target || !l.target.shadowRoot);
              if (
                r.noSwiping &&
                (p
                  ? (function (e, t) {
                      return (
                        void 0 === t && (t = this),
                        (function t(n) {
                          return n && n !== u() && n !== f()
                            ? (n.assignedSlot && (n = n.assignedSlot),
                              n.closest(e) || t(n.getRootNode().host))
                            : null;
                        })(t)
                      );
                    })(d, l.target)
                  : c.closest(d)[0])
              )
                return void (t.allowClick = !0);
              if (r.swipeHandler && !c.closest(r.swipeHandler)[0]) return;
              (a.currentX =
                "touchstart" === l.type ? l.targetTouches[0].pageX : l.pageX),
                (a.currentY =
                  "touchstart" === l.type ? l.targetTouches[0].pageY : l.pageY);
              const h = a.currentX,
                m = a.currentY,
                g = r.edgeSwipeDetection || r.iOSEdgeSwipeDetection,
                v = r.edgeSwipeThreshold || r.iOSEdgeSwipeThreshold;
              if (g && (h <= v || h >= i.innerWidth - v)) {
                if ("prevent" !== g) return;
                e.preventDefault();
              }
              if (
                (Object.assign(s, {
                  isTouched: !0,
                  isMoved: !1,
                  allowTouchCallbacks: !0,
                  isScrolling: void 0,
                  startMoving: void 0,
                }),
                (a.startX = h),
                (a.startY = m),
                (s.touchStartTime = E()),
                (t.allowClick = !0),
                t.updateSize(),
                (t.swipeDirection = void 0),
                r.threshold > 0 && (s.allowThresholdMove = !1),
                "touchstart" !== l.type)
              ) {
                let e = !0;
                c.is(s.focusableElements) &&
                  ((e = !1), "SELECT" === c[0].nodeName && (s.isTouched = !1)),
                  n.activeElement &&
                    x(n.activeElement).is(s.focusableElements) &&
                    n.activeElement !== c[0] &&
                    n.activeElement.blur();
                const i = e && t.allowTouchMove && r.touchStartPreventDefault;
                (!r.touchStartForcePreventDefault && !i) ||
                  c[0].isContentEditable ||
                  l.preventDefault();
              }
              t.params.freeMode &&
                t.params.freeMode.enabled &&
                t.freeMode &&
                t.animating &&
                !r.cssMode &&
                t.freeMode.onTouchStart(),
                t.emit("touchStart", l);
            }.bind(e)),
              (e.onTouchMove = function (e) {
                const t = u(),
                  n = this,
                  i = n.touchEventsData,
                  { params: s, touches: r, rtlTranslate: a, enabled: o } = n;
                if (!o) return;
                let l = e;
                if ((l.originalEvent && (l = l.originalEvent), !i.isTouched))
                  return void (
                    i.startMoving &&
                    i.isScrolling &&
                    n.emit("touchMoveOpposite", l)
                  );
                if (i.isTouchEvent && "touchmove" !== l.type) return;
                const c =
                    "touchmove" === l.type &&
                    l.targetTouches &&
                    (l.targetTouches[0] || l.changedTouches[0]),
                  d = "touchmove" === l.type ? c.pageX : l.pageX,
                  p = "touchmove" === l.type ? c.pageY : l.pageY;
                if (l.preventedByNestedSwiper)
                  return (r.startX = d), void (r.startY = p);
                if (!n.allowTouchMove)
                  return (
                    x(l.target).is(i.focusableElements) || (n.allowClick = !1),
                    void (
                      i.isTouched &&
                      (Object.assign(r, {
                        startX: d,
                        startY: p,
                        currentX: d,
                        currentY: p,
                      }),
                      (i.touchStartTime = E()))
                    )
                  );
                if (i.isTouchEvent && s.touchReleaseOnEdges && !s.loop)
                  if (n.isVertical()) {
                    if (
                      (p < r.startY && n.translate <= n.maxTranslate()) ||
                      (p > r.startY && n.translate >= n.minTranslate())
                    )
                      return (i.isTouched = !1), void (i.isMoved = !1);
                  } else if (
                    (d < r.startX && n.translate <= n.maxTranslate()) ||
                    (d > r.startX && n.translate >= n.minTranslate())
                  )
                    return;
                if (
                  i.isTouchEvent &&
                  t.activeElement &&
                  l.target === t.activeElement &&
                  x(l.target).is(i.focusableElements)
                )
                  return (i.isMoved = !0), void (n.allowClick = !1);
                if (
                  (i.allowTouchCallbacks && n.emit("touchMove", l),
                  l.targetTouches && l.targetTouches.length > 1)
                )
                  return;
                (r.currentX = d), (r.currentY = p);
                const f = r.currentX - r.startX,
                  h = r.currentY - r.startY;
                if (
                  n.params.threshold &&
                  Math.sqrt(f ** 2 + h ** 2) < n.params.threshold
                )
                  return;
                if (void 0 === i.isScrolling) {
                  let e;
                  (n.isHorizontal() && r.currentY === r.startY) ||
                  (n.isVertical() && r.currentX === r.startX)
                    ? (i.isScrolling = !1)
                    : f * f + h * h >= 25 &&
                      ((e =
                        (180 * Math.atan2(Math.abs(h), Math.abs(f))) / Math.PI),
                      (i.isScrolling = n.isHorizontal()
                        ? e > s.touchAngle
                        : 90 - e > s.touchAngle));
                }
                if (
                  (i.isScrolling && n.emit("touchMoveOpposite", l),
                  void 0 === i.startMoving &&
                    ((r.currentX === r.startX && r.currentY === r.startY) ||
                      (i.startMoving = !0)),
                  i.isScrolling)
                )
                  return void (i.isTouched = !1);
                if (!i.startMoving) return;
                (n.allowClick = !1),
                  !s.cssMode && l.cancelable && l.preventDefault(),
                  s.touchMoveStopPropagation &&
                    !s.nested &&
                    l.stopPropagation(),
                  i.isMoved ||
                    (s.loop && !s.cssMode && n.loopFix(),
                    (i.startTranslate = n.getTranslate()),
                    n.setTransition(0),
                    n.animating &&
                      n.$wrapperEl.trigger("webkitTransitionEnd transitionend"),
                    (i.allowMomentumBounce = !1),
                    !s.grabCursor ||
                      (!0 !== n.allowSlideNext && !0 !== n.allowSlidePrev) ||
                      n.setGrabCursor(!0),
                    n.emit("sliderFirstMove", l)),
                  n.emit("sliderMove", l),
                  (i.isMoved = !0);
                let m = n.isHorizontal() ? f : h;
                (r.diff = m),
                  (m *= s.touchRatio),
                  a && (m = -m),
                  (n.swipeDirection = m > 0 ? "prev" : "next"),
                  (i.currentTranslate = m + i.startTranslate);
                let g = !0,
                  v = s.resistanceRatio;
                if (
                  (s.touchReleaseOnEdges && (v = 0),
                  m > 0 && i.currentTranslate > n.minTranslate()
                    ? ((g = !1),
                      s.resistance &&
                        (i.currentTranslate =
                          n.minTranslate() -
                          1 +
                          (-n.minTranslate() + i.startTranslate + m) ** v))
                    : m < 0 &&
                      i.currentTranslate < n.maxTranslate() &&
                      ((g = !1),
                      s.resistance &&
                        (i.currentTranslate =
                          n.maxTranslate() +
                          1 -
                          (n.maxTranslate() - i.startTranslate - m) ** v)),
                  g && (l.preventedByNestedSwiper = !0),
                  !n.allowSlideNext &&
                    "next" === n.swipeDirection &&
                    i.currentTranslate < i.startTranslate &&
                    (i.currentTranslate = i.startTranslate),
                  !n.allowSlidePrev &&
                    "prev" === n.swipeDirection &&
                    i.currentTranslate > i.startTranslate &&
                    (i.currentTranslate = i.startTranslate),
                  n.allowSlidePrev ||
                    n.allowSlideNext ||
                    (i.currentTranslate = i.startTranslate),
                  s.threshold > 0)
                ) {
                  if (!(Math.abs(m) > s.threshold || i.allowThresholdMove))
                    return void (i.currentTranslate = i.startTranslate);
                  if (!i.allowThresholdMove)
                    return (
                      (i.allowThresholdMove = !0),
                      (r.startX = r.currentX),
                      (r.startY = r.currentY),
                      (i.currentTranslate = i.startTranslate),
                      void (r.diff = n.isHorizontal()
                        ? r.currentX - r.startX
                        : r.currentY - r.startY)
                    );
                }
                s.followFinger &&
                  !s.cssMode &&
                  (((s.freeMode && s.freeMode.enabled && n.freeMode) ||
                    s.watchSlidesProgress) &&
                    (n.updateActiveIndex(), n.updateSlidesClasses()),
                  n.params.freeMode &&
                    s.freeMode.enabled &&
                    n.freeMode &&
                    n.freeMode.onTouchMove(),
                  n.updateProgress(i.currentTranslate),
                  n.setTranslate(i.currentTranslate));
              }.bind(e)),
              (e.onTouchEnd = function (e) {
                const t = this,
                  n = t.touchEventsData,
                  {
                    params: i,
                    touches: s,
                    rtlTranslate: r,
                    slidesGrid: a,
                    enabled: o,
                  } = t;
                if (!o) return;
                let l = e;
                if (
                  (l.originalEvent && (l = l.originalEvent),
                  n.allowTouchCallbacks && t.emit("touchEnd", l),
                  (n.allowTouchCallbacks = !1),
                  !n.isTouched)
                )
                  return (
                    n.isMoved && i.grabCursor && t.setGrabCursor(!1),
                    (n.isMoved = !1),
                    void (n.startMoving = !1)
                  );
                i.grabCursor &&
                  n.isMoved &&
                  n.isTouched &&
                  (!0 === t.allowSlideNext || !0 === t.allowSlidePrev) &&
                  t.setGrabCursor(!1);
                const c = E(),
                  d = c - n.touchStartTime;
                if (t.allowClick) {
                  const e = l.path || (l.composedPath && l.composedPath());
                  t.updateClickedSlide((e && e[0]) || l.target),
                    t.emit("tap click", l),
                    d < 300 &&
                      c - n.lastClickTime < 300 &&
                      t.emit("doubleTap doubleClick", l);
                }
                if (
                  ((n.lastClickTime = E()),
                  _(() => {
                    t.destroyed || (t.allowClick = !0);
                  }),
                  !n.isTouched ||
                    !n.isMoved ||
                    !t.swipeDirection ||
                    0 === s.diff ||
                    n.currentTranslate === n.startTranslate)
                )
                  return (
                    (n.isTouched = !1),
                    (n.isMoved = !1),
                    void (n.startMoving = !1)
                  );
                let u;
                if (
                  ((n.isTouched = !1),
                  (n.isMoved = !1),
                  (n.startMoving = !1),
                  (u = i.followFinger
                    ? r
                      ? t.translate
                      : -t.translate
                    : -n.currentTranslate),
                  i.cssMode)
                )
                  return;
                if (t.params.freeMode && i.freeMode.enabled)
                  return void t.freeMode.onTouchEnd({ currentPos: u });
                let p = 0,
                  f = t.slidesSizesGrid[0];
                for (
                  let e = 0;
                  e < a.length;
                  e += e < i.slidesPerGroupSkip ? 1 : i.slidesPerGroup
                ) {
                  const t = e < i.slidesPerGroupSkip - 1 ? 1 : i.slidesPerGroup;
                  void 0 !== a[e + t]
                    ? u >= a[e] &&
                      u < a[e + t] &&
                      ((p = e), (f = a[e + t] - a[e]))
                    : u >= a[e] &&
                      ((p = e), (f = a[a.length - 1] - a[a.length - 2]));
                }
                let h = null,
                  m = null;
                i.rewind &&
                  (t.isBeginning
                    ? (m =
                        t.params.virtual &&
                        t.params.virtual.enabled &&
                        t.virtual
                          ? t.virtual.slides.length - 1
                          : t.slides.length - 1)
                    : t.isEnd && (h = 0));
                const g = (u - a[p]) / f,
                  v = p < i.slidesPerGroupSkip - 1 ? 1 : i.slidesPerGroup;
                if (d > i.longSwipesMs) {
                  if (!i.longSwipes) return void t.slideTo(t.activeIndex);
                  "next" === t.swipeDirection &&
                    (g >= i.longSwipesRatio
                      ? t.slideTo(i.rewind && t.isEnd ? h : p + v)
                      : t.slideTo(p)),
                    "prev" === t.swipeDirection &&
                      (g > 1 - i.longSwipesRatio
                        ? t.slideTo(p + v)
                        : null !== m && g < 0 && Math.abs(g) > i.longSwipesRatio
                        ? t.slideTo(m)
                        : t.slideTo(p));
                } else {
                  if (!i.shortSwipes) return void t.slideTo(t.activeIndex);
                  !t.navigation ||
                  (l.target !== t.navigation.nextEl &&
                    l.target !== t.navigation.prevEl)
                    ? ("next" === t.swipeDirection &&
                        t.slideTo(null !== h ? h : p + v),
                      "prev" === t.swipeDirection &&
                        t.slideTo(null !== m ? m : p))
                    : l.target === t.navigation.nextEl
                    ? t.slideTo(p + v)
                    : t.slideTo(p);
                }
              }.bind(e)),
              n.cssMode &&
                (e.onScroll = function () {
                  const e = this,
                    { wrapperEl: t, rtlTranslate: n, enabled: i } = e;
                  if (!i) return;
                  let s;
                  (e.previousTranslate = e.translate),
                    e.isHorizontal()
                      ? (e.translate = -t.scrollLeft)
                      : (e.translate = -t.scrollTop),
                    0 === e.translate && (e.translate = 0),
                    e.updateActiveIndex(),
                    e.updateSlidesClasses();
                  const r = e.maxTranslate() - e.minTranslate();
                  (s = 0 === r ? 0 : (e.translate - e.minTranslate()) / r) !==
                    e.progress &&
                    e.updateProgress(n ? -e.translate : e.translate),
                    e.emit("setTranslate", e.translate, !1);
                }.bind(e)),
              (e.onClick = function (e) {
                const t = this;
                t.enabled &&
                  (t.allowClick ||
                    (t.params.preventClicks && e.preventDefault(),
                    t.params.preventClicksPropagation &&
                      t.animating &&
                      (e.stopPropagation(), e.stopImmediatePropagation())));
              }.bind(e)),
              i.touch && !z && (t.addEventListener("touchstart", N), (z = !0)),
              R(e, "on");
          },
          detachEvents: function () {
            R(this, "off");
          },
        },
        breakpoints: {
          setBreakpoint: function () {
            const e = this,
              {
                activeIndex: t,
                initialized: n,
                loopedSlides: i = 0,
                params: s,
                $el: r,
              } = e,
              a = s.breakpoints;
            if (!a || (a && 0 === Object.keys(a).length)) return;
            const o = e.getBreakpoint(a, e.params.breakpointsBase, e.el);
            if (!o || e.currentBreakpoint === o) return;
            const l = (o in a ? a[o] : void 0) || e.originalParams,
              c = D(e, s),
              d = D(e, l),
              u = s.enabled;
            c && !d
              ? (r.removeClass(
                  `${s.containerModifierClass}grid ${s.containerModifierClass}grid-column`
                ),
                e.emitContainerClasses())
              : !c &&
                d &&
                (r.addClass(s.containerModifierClass + "grid"),
                ((l.grid.fill && "column" === l.grid.fill) ||
                  (!l.grid.fill && "column" === s.grid.fill)) &&
                  r.addClass(s.containerModifierClass + "grid-column"),
                e.emitContainerClasses());
            const p = l.direction && l.direction !== s.direction,
              f = s.loop && (l.slidesPerView !== s.slidesPerView || p);
            p && n && e.changeDirection(), S(e.params, l);
            const h = e.params.enabled;
            Object.assign(e, {
              allowTouchMove: e.params.allowTouchMove,
              allowSlideNext: e.params.allowSlideNext,
              allowSlidePrev: e.params.allowSlidePrev,
            }),
              u && !h ? e.disable() : !u && h && e.enable(),
              (e.currentBreakpoint = o),
              e.emit("_beforeBreakpoint", l),
              f &&
                n &&
                (e.loopDestroy(),
                e.loopCreate(),
                e.updateSlides(),
                e.slideTo(t - i + e.loopedSlides, 0, !1)),
              e.emit("breakpoint", l);
          },
          getBreakpoint: function (e, t, n) {
            if (
              (void 0 === t && (t = "window"), !e || ("container" === t && !n))
            )
              return;
            let i = !1;
            const s = f(),
              r = "window" === t ? s.innerHeight : n.clientHeight,
              a = Object.keys(e).map((e) => {
                if ("string" == typeof e && 0 === e.indexOf("@")) {
                  const t = parseFloat(e.substr(1));
                  return { value: r * t, point: e };
                }
                return { value: e, point: e };
              });
            a.sort((e, t) => parseInt(e.value, 10) - parseInt(t.value, 10));
            for (let e = 0; e < a.length; e += 1) {
              const { point: r, value: o } = a[e];
              "window" === t
                ? s.matchMedia(`(min-width: ${o}px)`).matches && (i = r)
                : o <= n.clientWidth && (i = r);
            }
            return i || "max";
          },
        },
        checkOverflow: {
          checkOverflow: function () {
            const e = this,
              { isLocked: t, params: n } = e,
              { slidesOffsetBefore: i } = n;
            if (i) {
              const t = e.slides.length - 1,
                n = e.slidesGrid[t] + e.slidesSizesGrid[t] + 2 * i;
              e.isLocked = e.size > n;
            } else e.isLocked = 1 === e.snapGrid.length;
            !0 === n.allowSlideNext && (e.allowSlideNext = !e.isLocked),
              !0 === n.allowSlidePrev && (e.allowSlidePrev = !e.isLocked),
              t && t !== e.isLocked && (e.isEnd = !1),
              t !== e.isLocked && e.emit(e.isLocked ? "lock" : "unlock");
          },
        },
        classes: {
          addClasses: function () {
            const {
                classNames: e,
                params: t,
                rtl: n,
                $el: i,
                device: s,
                support: r,
              } = this,
              a = (function (e, t) {
                const n = [];
                return (
                  e.forEach((e) => {
                    "object" == typeof e
                      ? Object.keys(e).forEach((i) => {
                          e[i] && n.push(t + i);
                        })
                      : "string" == typeof e && n.push(t + e);
                  }),
                  n
                );
              })(
                [
                  "initialized",
                  t.direction,
                  { "pointer-events": !r.touch },
                  { "free-mode": this.params.freeMode && t.freeMode.enabled },
                  { autoheight: t.autoHeight },
                  { rtl: n },
                  { grid: t.grid && t.grid.rows > 1 },
                  {
                    "grid-column":
                      t.grid && t.grid.rows > 1 && "column" === t.grid.fill,
                  },
                  { android: s.android },
                  { ios: s.ios },
                  { "css-mode": t.cssMode },
                  { centered: t.cssMode && t.centeredSlides },
                ],
                t.containerModifierClass
              );
            e.push(...a),
              i.addClass([...e].join(" ")),
              this.emitContainerClasses();
          },
          removeClasses: function () {
            const { $el: e, classNames: t } = this;
            e.removeClass(t.join(" ")), this.emitContainerClasses();
          },
        },
        images: {
          loadImage: function (e, t, n, i, s, r) {
            const a = f();
            let o;
            function l() {
              r && r();
            }
            x(e).parent("picture")[0] || (e.complete && s)
              ? l()
              : t
              ? (((o = new a.Image()).onload = l),
                (o.onerror = l),
                i && (o.sizes = i),
                n && (o.srcset = n),
                t && (o.src = t))
              : l();
          },
          preloadImages: function () {
            const e = this;
            function t() {
              null != e &&
                e &&
                !e.destroyed &&
                (void 0 !== e.imagesLoaded && (e.imagesLoaded += 1),
                e.imagesLoaded === e.imagesToLoad.length &&
                  (e.params.updateOnImagesReady && e.update(),
                  e.emit("imagesReady")));
            }
            e.imagesToLoad = e.$el.find("img");
            for (let n = 0; n < e.imagesToLoad.length; n += 1) {
              const i = e.imagesToLoad[n];
              e.loadImage(
                i,
                i.currentSrc || i.getAttribute("src"),
                i.srcset || i.getAttribute("srcset"),
                i.sizes || i.getAttribute("sizes"),
                !0,
                t
              );
            }
          },
        },
      },
      F = {};
    class G {
      constructor() {
        let e, t;
        for (var n = arguments.length, i = new Array(n), s = 0; s < n; s++)
          i[s] = arguments[s];
        if (
          (1 === i.length &&
          i[0].constructor &&
          "Object" === Object.prototype.toString.call(i[0]).slice(8, -1)
            ? (t = i[0])
            : ([e, t] = i),
          t || (t = {}),
          (t = S({}, t)),
          e && !t.el && (t.el = e),
          t.el && x(t.el).length > 1)
        ) {
          const e = [];
          return (
            x(t.el).each((n) => {
              const i = S({}, t, { el: n });
              e.push(new G(i));
            }),
            e
          );
        }
        const r = this;
        (r.__swiper__ = !0),
          (r.support = P()),
          (r.device = (function (e) {
            return (
              void 0 === e && (e = {}),
              A ||
                (A = (function (e) {
                  let { userAgent: t } = void 0 === e ? {} : e;
                  const n = P(),
                    i = f(),
                    s = i.navigator.platform,
                    r = t || i.navigator.userAgent,
                    a = { ios: !1, android: !1 },
                    o = i.screen.width,
                    l = i.screen.height,
                    c = r.match(/(Android);?[\s\/]+([\d.]+)?/);
                  let d = r.match(/(iPad).*OS\s([\d_]+)/);
                  const u = r.match(/(iPod)(.*OS\s([\d_]+))?/),
                    p = !d && r.match(/(iPhone\sOS|iOS)\s([\d_]+)/),
                    h = "Win32" === s;
                  let m = "MacIntel" === s;
                  return (
                    !d &&
                      m &&
                      n.touch &&
                      [
                        "1024x1366",
                        "1366x1024",
                        "834x1194",
                        "1194x834",
                        "834x1112",
                        "1112x834",
                        "768x1024",
                        "1024x768",
                        "820x1180",
                        "1180x820",
                        "810x1080",
                        "1080x810",
                      ].indexOf(`${o}x${l}`) >= 0 &&
                      ((d = r.match(/(Version)\/([\d.]+)/)) ||
                        (d = [0, 1, "13_0_0"]),
                      (m = !1)),
                    c && !h && ((a.os = "android"), (a.android = !0)),
                    (d || p || u) && ((a.os = "ios"), (a.ios = !0)),
                    a
                  );
                })(e)),
              A
            );
          })({ userAgent: t.userAgent })),
          (r.browser =
            (L ||
              (L = (function () {
                const e = f();
                return {
                  isSafari: (function () {
                    const t = e.navigator.userAgent.toLowerCase();
                    return (
                      t.indexOf("safari") >= 0 &&
                      t.indexOf("chrome") < 0 &&
                      t.indexOf("android") < 0
                    );
                  })(),
                  isWebView:
                    /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(
                      e.navigator.userAgent
                    ),
                };
              })()),
            L)),
          (r.eventsListeners = {}),
          (r.eventsAnyListeners = []),
          (r.modules = [...r.__modules__]),
          t.modules && Array.isArray(t.modules) && r.modules.push(...t.modules);
        const a = {};
        r.modules.forEach((e) => {
          e({
            swiper: r,
            extendParams: B(t, a),
            on: r.on.bind(r),
            once: r.once.bind(r),
            off: r.off.bind(r),
            emit: r.emit.bind(r),
          });
        });
        const o = S({}, j, a);
        return (
          (r.params = S({}, o, F, t)),
          (r.originalParams = S({}, r.params)),
          (r.passedParams = S({}, t)),
          r.params &&
            r.params.on &&
            Object.keys(r.params.on).forEach((e) => {
              r.on(e, r.params.on[e]);
            }),
          r.params && r.params.onAny && r.onAny(r.params.onAny),
          (r.$ = x),
          Object.assign(r, {
            enabled: r.params.enabled,
            el: e,
            classNames: [],
            slides: x(),
            slidesGrid: [],
            snapGrid: [],
            slidesSizesGrid: [],
            isHorizontal: () => "horizontal" === r.params.direction,
            isVertical: () => "vertical" === r.params.direction,
            activeIndex: 0,
            realIndex: 0,
            isBeginning: !0,
            isEnd: !1,
            translate: 0,
            previousTranslate: 0,
            progress: 0,
            velocity: 0,
            animating: !1,
            allowSlideNext: r.params.allowSlideNext,
            allowSlidePrev: r.params.allowSlidePrev,
            touchEvents: (function () {
              const e = ["touchstart", "touchmove", "touchend", "touchcancel"],
                t = ["pointerdown", "pointermove", "pointerup"];
              return (
                (r.touchEventsTouch = {
                  start: e[0],
                  move: e[1],
                  end: e[2],
                  cancel: e[3],
                }),
                (r.touchEventsDesktop = { start: t[0], move: t[1], end: t[2] }),
                r.support.touch || !r.params.simulateTouch
                  ? r.touchEventsTouch
                  : r.touchEventsDesktop
              );
            })(),
            touchEventsData: {
              isTouched: void 0,
              isMoved: void 0,
              allowTouchCallbacks: void 0,
              touchStartTime: void 0,
              isScrolling: void 0,
              currentTranslate: void 0,
              startTranslate: void 0,
              allowThresholdMove: void 0,
              focusableElements: r.params.focusableElements,
              lastClickTime: E(),
              clickTimeout: void 0,
              velocities: [],
              allowMomentumBounce: void 0,
              isTouchEvent: void 0,
              startMoving: void 0,
            },
            allowClick: !0,
            allowTouchMove: r.params.allowTouchMove,
            touches: {
              startX: 0,
              startY: 0,
              currentX: 0,
              currentY: 0,
              diff: 0,
            },
            imagesToLoad: [],
            imagesLoaded: 0,
          }),
          r.emit("_swiper"),
          r.params.init && r.init(),
          r
        );
      }
      enable() {
        const e = this;
        e.enabled ||
          ((e.enabled = !0),
          e.params.grabCursor && e.setGrabCursor(),
          e.emit("enable"));
      }
      disable() {
        const e = this;
        e.enabled &&
          ((e.enabled = !1),
          e.params.grabCursor && e.unsetGrabCursor(),
          e.emit("disable"));
      }
      setProgress(e, t) {
        e = Math.min(Math.max(e, 0), 1);
        const n = this.minTranslate(),
          i = (this.maxTranslate() - n) * e + n;
        this.translateTo(i, void 0 === t ? 0 : t),
          this.updateActiveIndex(),
          this.updateSlidesClasses();
      }
      emitContainerClasses() {
        const e = this;
        if (!e.params._emitClasses || !e.el) return;
        const t = e.el.className
          .split(" ")
          .filter(
            (t) =>
              0 === t.indexOf("swiper") ||
              0 === t.indexOf(e.params.containerModifierClass)
          );
        e.emit("_containerClasses", t.join(" "));
      }
      getSlideClasses(e) {
        const t = this;
        return e.className
          .split(" ")
          .filter(
            (e) =>
              0 === e.indexOf("swiper-slide") ||
              0 === e.indexOf(t.params.slideClass)
          )
          .join(" ");
      }
      emitSlidesClasses() {
        const e = this;
        if (!e.params._emitClasses || !e.el) return;
        const t = [];
        e.slides.each((n) => {
          const i = e.getSlideClasses(n);
          t.push({ slideEl: n, classNames: i }), e.emit("_slideClass", n, i);
        }),
          e.emit("_slideClasses", t);
      }
      slidesPerViewDynamic(e, t) {
        void 0 === e && (e = "current"), void 0 === t && (t = !1);
        const {
          params: n,
          slides: i,
          slidesGrid: s,
          slidesSizesGrid: r,
          size: a,
          activeIndex: o,
        } = this;
        let l = 1;
        if (n.centeredSlides) {
          let e,
            t = i[o].swiperSlideSize;
          for (let n = o + 1; n < i.length; n += 1)
            i[n] &&
              !e &&
              ((l += 1), (t += i[n].swiperSlideSize) > a && (e = !0));
          for (let n = o - 1; n >= 0; n -= 1)
            i[n] &&
              !e &&
              ((l += 1), (t += i[n].swiperSlideSize) > a && (e = !0));
        } else if ("current" === e)
          for (let e = o + 1; e < i.length; e += 1)
            (t ? s[e] + r[e] - s[o] < a : s[e] - s[o] < a) && (l += 1);
        else for (let e = o - 1; e >= 0; e -= 1) s[o] - s[e] < a && (l += 1);
        return l;
      }
      update() {
        const e = this;
        if (!e || e.destroyed) return;
        const { snapGrid: t, params: n } = e;
        function i() {
          const t = e.rtlTranslate ? -1 * e.translate : e.translate,
            n = Math.min(Math.max(t, e.maxTranslate()), e.minTranslate());
          e.setTranslate(n), e.updateActiveIndex(), e.updateSlidesClasses();
        }
        let s;
        n.breakpoints && e.setBreakpoint(),
          e.updateSize(),
          e.updateSlides(),
          e.updateProgress(),
          e.updateSlidesClasses(),
          e.params.freeMode && e.params.freeMode.enabled
            ? (i(), e.params.autoHeight && e.updateAutoHeight())
            : (s =
                ("auto" === e.params.slidesPerView ||
                  e.params.slidesPerView > 1) &&
                e.isEnd &&
                !e.params.centeredSlides
                  ? e.slideTo(e.slides.length - 1, 0, !1, !0)
                  : e.slideTo(e.activeIndex, 0, !1, !0)) || i(),
          n.watchOverflow && t !== e.snapGrid && e.checkOverflow(),
          e.emit("update");
      }
      changeDirection(e, t) {
        void 0 === t && (t = !0);
        const n = this,
          i = n.params.direction;
        return (
          e || (e = "horizontal" === i ? "vertical" : "horizontal"),
          e === i ||
            ("horizontal" !== e && "vertical" !== e) ||
            (n.$el
              .removeClass(`${n.params.containerModifierClass}${i}`)
              .addClass(`${n.params.containerModifierClass}${e}`),
            n.emitContainerClasses(),
            (n.params.direction = e),
            n.slides.each((t) => {
              "vertical" === e ? (t.style.width = "") : (t.style.height = "");
            }),
            n.emit("changeDirection"),
            t && n.update()),
          n
        );
      }
      mount(e) {
        const t = this;
        if (t.mounted) return !0;
        const n = x(e || t.params.el);
        if (!(e = n[0])) return !1;
        e.swiper = t;
        const i = () =>
          "." + (t.params.wrapperClass || "").trim().split(" ").join(".");
        let s = (() => {
          if (e && e.shadowRoot && e.shadowRoot.querySelector) {
            const t = x(e.shadowRoot.querySelector(i()));
            return (t.children = (e) => n.children(e)), t;
          }
          return n.children(i());
        })();
        if (0 === s.length && t.params.createElements) {
          const e = u().createElement("div");
          (s = x(e)),
            (e.className = t.params.wrapperClass),
            n.append(e),
            n.children("." + t.params.slideClass).each((e) => {
              s.append(e);
            });
        }
        return (
          Object.assign(t, {
            $el: n,
            el: e,
            $wrapperEl: s,
            wrapperEl: s[0],
            mounted: !0,
            rtl: "rtl" === e.dir.toLowerCase() || "rtl" === n.css("direction"),
            rtlTranslate:
              "horizontal" === t.params.direction &&
              ("rtl" === e.dir.toLowerCase() || "rtl" === n.css("direction")),
            wrongRTL: "-webkit-box" === s.css("display"),
          }),
          !0
        );
      }
      init(e) {
        const t = this;
        return t.initialized
          ? t
          : (!1 === t.mount(e) ||
              (t.emit("beforeInit"),
              t.params.breakpoints && t.setBreakpoint(),
              t.addClasses(),
              t.params.loop && t.loopCreate(),
              t.updateSize(),
              t.updateSlides(),
              t.params.watchOverflow && t.checkOverflow(),
              t.params.grabCursor && t.enabled && t.setGrabCursor(),
              t.params.preloadImages && t.preloadImages(),
              t.params.loop
                ? t.slideTo(
                    t.params.initialSlide + t.loopedSlides,
                    0,
                    t.params.runCallbacksOnInit,
                    !1,
                    !0
                  )
                : t.slideTo(
                    t.params.initialSlide,
                    0,
                    t.params.runCallbacksOnInit,
                    !1,
                    !0
                  ),
              t.attachEvents(),
              (t.initialized = !0),
              t.emit("init"),
              t.emit("afterInit")),
            t);
      }
      destroy(e, t) {
        void 0 === e && (e = !0), void 0 === t && (t = !0);
        const n = this,
          { params: i, $el: s, $wrapperEl: r, slides: a } = n;
        return (
          void 0 === n.params ||
            n.destroyed ||
            (n.emit("beforeDestroy"),
            (n.initialized = !1),
            n.detachEvents(),
            i.loop && n.loopDestroy(),
            t &&
              (n.removeClasses(),
              s.removeAttr("style"),
              r.removeAttr("style"),
              a &&
                a.length &&
                a
                  .removeClass(
                    [
                      i.slideVisibleClass,
                      i.slideActiveClass,
                      i.slideNextClass,
                      i.slidePrevClass,
                    ].join(" ")
                  )
                  .removeAttr("style")
                  .removeAttr("data-swiper-slide-index")),
            n.emit("destroy"),
            Object.keys(n.eventsListeners).forEach((e) => {
              n.off(e);
            }),
            !1 !== e &&
              ((n.$el[0].swiper = null),
              (function (e) {
                const t = n;
                Object.keys(t).forEach((e) => {
                  try {
                    t[e] = null;
                  } catch (e) {}
                  try {
                    delete t[e];
                  } catch (e) {}
                });
              })()),
            (n.destroyed = !0)),
          null
        );
      }
      static extendDefaults(e) {
        S(F, e);
      }
      static get extendedDefaults() {
        return F;
      }
      static get defaults() {
        return j;
      }
      static installModule(e) {
        G.prototype.__modules__ || (G.prototype.__modules__ = []);
        const t = G.prototype.__modules__;
        "function" == typeof e && t.indexOf(e) < 0 && t.push(e);
      }
      static use(e) {
        return Array.isArray(e)
          ? (e.forEach((e) => G.installModule(e)), G)
          : (G.installModule(e), G);
      }
    }
    Object.keys(V).forEach((e) => {
      Object.keys(V[e]).forEach((t) => {
        G.prototype[t] = V[e][t];
      });
    }),
      G.use([
        function (e) {
          let { swiper: t, on: n, emit: i } = e;
          const s = f();
          let r = null,
            a = null;
          const o = () => {
              t &&
                !t.destroyed &&
                t.initialized &&
                (i("beforeResize"), i("resize"));
            },
            l = () => {
              t && !t.destroyed && t.initialized && i("orientationchange");
            };
          n("init", () => {
            t.params.resizeObserver && void 0 !== s.ResizeObserver
              ? t &&
                !t.destroyed &&
                t.initialized &&
                (r = new ResizeObserver((e) => {
                  a = s.requestAnimationFrame(() => {
                    const { width: n, height: i } = t;
                    let s = n,
                      r = i;
                    e.forEach((e) => {
                      let { contentBoxSize: n, contentRect: i, target: a } = e;
                      (a && a !== t.el) ||
                        ((s = i ? i.width : (n[0] || n).inlineSize),
                        (r = i ? i.height : (n[0] || n).blockSize));
                    }),
                      (s === n && r === i) || o();
                  });
                })).observe(t.el)
              : (s.addEventListener("resize", o),
                s.addEventListener("orientationchange", l));
          }),
            n("destroy", () => {
              a && s.cancelAnimationFrame(a),
                r && r.unobserve && t.el && (r.unobserve(t.el), (r = null)),
                s.removeEventListener("resize", o),
                s.removeEventListener("orientationchange", l);
            });
        },
        function (e) {
          let { swiper: t, extendParams: n, on: i, emit: s } = e;
          const r = [],
            a = f(),
            o = function (e, t) {
              void 0 === t && (t = {});
              const n = new (a.MutationObserver || a.WebkitMutationObserver)(
                (e) => {
                  if (1 === e.length) return void s("observerUpdate", e[0]);
                  const t = function () {
                    s("observerUpdate", e[0]);
                  };
                  a.requestAnimationFrame
                    ? a.requestAnimationFrame(t)
                    : a.setTimeout(t, 0);
                }
              );
              n.observe(e, {
                attributes: void 0 === t.attributes || t.attributes,
                childList: void 0 === t.childList || t.childList,
                characterData: void 0 === t.characterData || t.characterData,
              }),
                r.push(n);
            };
          n({ observer: !1, observeParents: !1, observeSlideChildren: !1 }),
            i("init", () => {
              if (t.params.observer) {
                if (t.params.observeParents) {
                  const e = t.$el.parents();
                  for (let t = 0; t < e.length; t += 1) o(e[t]);
                }
                o(t.$el[0], { childList: t.params.observeSlideChildren }),
                  o(t.$wrapperEl[0], { attributes: !1 });
              }
            }),
            i("destroy", () => {
              r.forEach((e) => {
                e.disconnect();
              }),
                r.splice(0, r.length);
            });
        },
      ]);
    var H = G;
    function W(e, t, n, i) {
      const s = u();
      return (
        e.params.createElements &&
          Object.keys(i).forEach((r) => {
            if (!n[r] && !0 === n.auto) {
              let a = e.$el.children("." + i[r])[0];
              a ||
                (((a = s.createElement("div")).className = i[r]),
                e.$el.append(a)),
                (n[r] = a),
                (t[r] = a);
            }
          }),
        n
      );
    }
    function q(e) {
      return (
        void 0 === e && (e = ""),
        "." +
          e
            .trim()
            .replace(/([\.:!\/])/g, "\\$1")
            .replace(/ /g, ".")
      );
    }
    function Y(e, t) {
      return e.transformEl
        ? t
            .find(e.transformEl)
            .css({
              "backface-visibility": "hidden",
              "-webkit-backface-visibility": "hidden",
            })
        : t;
    }
    var U = n(2),
      X = n.n(U),
      K = n(3),
      J = n.n(K),
      Z = n(5);
    i.a.plugin(r),
      document.documentElement.classList.remove("no-js"),
      new J.a({
        elements_selector: ".js-lazy-load",
        class_loaded: "lazy-load--loaded",
        threshold: window.innerHeight / 5,
      }),
      (window.Cookies = o.a),
      (window.Alpine = i.a),
      (window.collapse = r),
      (window.Swiper = H),
      H.use([
        function (e) {
          let { swiper: t, extendParams: n, on: i, emit: s } = e;
          const r = "swiper-pagination";
          let a;
          n({
            pagination: {
              el: null,
              bulletElement: "span",
              clickable: !1,
              hideOnClick: !1,
              renderBullet: null,
              renderProgressbar: null,
              renderFraction: null,
              renderCustom: null,
              progressbarOpposite: !1,
              type: "bullets",
              dynamicBullets: !1,
              dynamicMainBullets: 1,
              formatFractionCurrent: (e) => e,
              formatFractionTotal: (e) => e,
              bulletClass: r + "-bullet",
              bulletActiveClass: r + "-bullet-active",
              modifierClass: r + "-",
              currentClass: r + "-current",
              totalClass: r + "-total",
              hiddenClass: r + "-hidden",
              progressbarFillClass: r + "-progressbar-fill",
              progressbarOppositeClass: r + "-progressbar-opposite",
              clickableClass: r + "-clickable",
              lockClass: r + "-lock",
              horizontalClass: r + "-horizontal",
              verticalClass: r + "-vertical",
            },
          }),
            (t.pagination = { el: null, $el: null, bullets: [] });
          let o = 0;
          function l() {
            return (
              !t.params.pagination.el ||
              !t.pagination.el ||
              !t.pagination.$el ||
              0 === t.pagination.$el.length
            );
          }
          function c(e, n) {
            const { bulletActiveClass: i } = t.params.pagination;
            e[n]().addClass(`${i}-${n}`)[n]().addClass(`${i}-${n}-${n}`);
          }
          function d() {
            const e = t.rtl,
              n = t.params.pagination;
            if (l()) return;
            const i =
                t.virtual && t.params.virtual.enabled
                  ? t.virtual.slides.length
                  : t.slides.length,
              r = t.pagination.$el;
            let d;
            const u = t.params.loop
              ? Math.ceil((i - 2 * t.loopedSlides) / t.params.slidesPerGroup)
              : t.snapGrid.length;
            if (
              (t.params.loop
                ? ((d = Math.ceil(
                    (t.activeIndex - t.loopedSlides) / t.params.slidesPerGroup
                  )) >
                    i - 1 - 2 * t.loopedSlides && (d -= i - 2 * t.loopedSlides),
                  d > u - 1 && (d -= u),
                  d < 0 && "bullets" !== t.params.paginationType && (d = u + d))
                : (d =
                    void 0 !== t.snapIndex ? t.snapIndex : t.activeIndex || 0),
              "bullets" === n.type &&
                t.pagination.bullets &&
                t.pagination.bullets.length > 0)
            ) {
              const i = t.pagination.bullets;
              let s, l, u;
              if (
                (n.dynamicBullets &&
                  ((a = i
                    .eq(0)
                    [t.isHorizontal() ? "outerWidth" : "outerHeight"](!0)),
                  r.css(
                    t.isHorizontal() ? "width" : "height",
                    a * (n.dynamicMainBullets + 4) + "px"
                  ),
                  n.dynamicMainBullets > 1 &&
                    void 0 !== t.previousIndex &&
                    ((o += d - (t.previousIndex - t.loopedSlides || 0)) >
                    n.dynamicMainBullets - 1
                      ? (o = n.dynamicMainBullets - 1)
                      : o < 0 && (o = 0)),
                  (s = Math.max(d - o, 0)),
                  (u =
                    ((l = s + (Math.min(i.length, n.dynamicMainBullets) - 1)) +
                      s) /
                    2)),
                i.removeClass(
                  ["", "-next", "-next-next", "-prev", "-prev-prev", "-main"]
                    .map((e) => `${n.bulletActiveClass}${e}`)
                    .join(" ")
                ),
                r.length > 1)
              )
                i.each((e) => {
                  const t = x(e),
                    i = t.index();
                  i === d && t.addClass(n.bulletActiveClass),
                    n.dynamicBullets &&
                      (i >= s &&
                        i <= l &&
                        t.addClass(n.bulletActiveClass + "-main"),
                      i === s && c(t, "prev"),
                      i === l && c(t, "next"));
                });
              else {
                const e = i.eq(d),
                  r = e.index();
                if ((e.addClass(n.bulletActiveClass), n.dynamicBullets)) {
                  const e = i.eq(s),
                    a = i.eq(l);
                  for (let e = s; e <= l; e += 1)
                    i.eq(e).addClass(n.bulletActiveClass + "-main");
                  if (t.params.loop)
                    if (r >= i.length) {
                      for (let e = n.dynamicMainBullets; e >= 0; e -= 1)
                        i.eq(i.length - e).addClass(
                          n.bulletActiveClass + "-main"
                        );
                      i.eq(i.length - n.dynamicMainBullets - 1).addClass(
                        n.bulletActiveClass + "-prev"
                      );
                    } else c(e, "prev"), c(a, "next");
                  else c(e, "prev"), c(a, "next");
                }
              }
              if (n.dynamicBullets) {
                const s = Math.min(i.length, n.dynamicMainBullets + 4),
                  r = (a * s - a) / 2 - u * a,
                  o = e ? "right" : "left";
                i.css(t.isHorizontal() ? o : "top", r + "px");
              }
            }
            if (
              ("fraction" === n.type &&
                (r.find(q(n.currentClass)).text(n.formatFractionCurrent(d + 1)),
                r.find(q(n.totalClass)).text(n.formatFractionTotal(u))),
              "progressbar" === n.type)
            ) {
              let e;
              e = n.progressbarOpposite
                ? t.isHorizontal()
                  ? "vertical"
                  : "horizontal"
                : t.isHorizontal()
                ? "horizontal"
                : "vertical";
              const i = (d + 1) / u;
              let s = 1,
                a = 1;
              "horizontal" === e ? (s = i) : (a = i),
                r
                  .find(q(n.progressbarFillClass))
                  .transform(`translate3d(0,0,0) scaleX(${s}) scaleY(${a})`)
                  .transition(t.params.speed);
            }
            "custom" === n.type && n.renderCustom
              ? (r.html(n.renderCustom(t, d + 1, u)),
                s("paginationRender", r[0]))
              : s("paginationUpdate", r[0]),
              t.params.watchOverflow &&
                t.enabled &&
                r[t.isLocked ? "addClass" : "removeClass"](n.lockClass);
          }
          function u() {
            const e = t.params.pagination;
            if (l()) return;
            const n =
                t.virtual && t.params.virtual.enabled
                  ? t.virtual.slides.length
                  : t.slides.length,
              i = t.pagination.$el;
            let r = "";
            if ("bullets" === e.type) {
              let s = t.params.loop
                ? Math.ceil((n - 2 * t.loopedSlides) / t.params.slidesPerGroup)
                : t.snapGrid.length;
              t.params.freeMode &&
                t.params.freeMode.enabled &&
                !t.params.loop &&
                s > n &&
                (s = n);
              for (let n = 0; n < s; n += 1)
                e.renderBullet
                  ? (r += e.renderBullet.call(t, n, e.bulletClass))
                  : (r += `<${e.bulletElement} class="${e.bulletClass}"></${e.bulletElement}>`);
              i.html(r), (t.pagination.bullets = i.find(q(e.bulletClass)));
            }
            "fraction" === e.type &&
              ((r = e.renderFraction
                ? e.renderFraction.call(t, e.currentClass, e.totalClass)
                : `<span class="${e.currentClass}"></span> / <span class="${e.totalClass}"></span>`),
              i.html(r)),
              "progressbar" === e.type &&
                ((r = e.renderProgressbar
                  ? e.renderProgressbar.call(t, e.progressbarFillClass)
                  : `<span class="${e.progressbarFillClass}"></span>`),
                i.html(r)),
              "custom" !== e.type && s("paginationRender", t.pagination.$el[0]);
          }
          function p() {
            t.params.pagination = W(
              t,
              t.originalParams.pagination,
              t.params.pagination,
              { el: "swiper-pagination" }
            );
            const e = t.params.pagination;
            if (!e.el) return;
            let n = x(e.el);
            0 !== n.length &&
              (t.params.uniqueNavElements &&
                "string" == typeof e.el &&
                n.length > 1 &&
                (n = t.$el.find(e.el)).length > 1 &&
                (n = n.filter((e) => x(e).parents(".swiper")[0] === t.el)),
              "bullets" === e.type &&
                e.clickable &&
                n.addClass(e.clickableClass),
              n.addClass(e.modifierClass + e.type),
              n.addClass(
                t.isHorizontal() ? e.horizontalClass : e.verticalClass
              ),
              "bullets" === e.type &&
                e.dynamicBullets &&
                (n.addClass(`${e.modifierClass}${e.type}-dynamic`),
                (o = 0),
                e.dynamicMainBullets < 1 && (e.dynamicMainBullets = 1)),
              "progressbar" === e.type &&
                e.progressbarOpposite &&
                n.addClass(e.progressbarOppositeClass),
              e.clickable &&
                n.on("click", q(e.bulletClass), function (e) {
                  e.preventDefault();
                  let n = x(this).index() * t.params.slidesPerGroup;
                  t.params.loop && (n += t.loopedSlides), t.slideTo(n);
                }),
              Object.assign(t.pagination, { $el: n, el: n[0] }),
              t.enabled || n.addClass(e.lockClass));
          }
          function f() {
            const e = t.params.pagination;
            if (l()) return;
            const n = t.pagination.$el;
            n.removeClass(e.hiddenClass),
              n.removeClass(e.modifierClass + e.type),
              n.removeClass(
                t.isHorizontal() ? e.horizontalClass : e.verticalClass
              ),
              t.pagination.bullets &&
                t.pagination.bullets.removeClass &&
                t.pagination.bullets.removeClass(e.bulletActiveClass),
              e.clickable && n.off("click", q(e.bulletClass));
          }
          i("init", () => {
            p(), u(), d();
          }),
            i("activeIndexChange", () => {
              (t.params.loop || void 0 === t.snapIndex) && d();
            }),
            i("snapIndexChange", () => {
              t.params.loop || d();
            }),
            i("slidesLengthChange", () => {
              t.params.loop && (u(), d());
            }),
            i("snapGridLengthChange", () => {
              t.params.loop || (u(), d());
            }),
            i("destroy", () => {
              f();
            }),
            i("enable disable", () => {
              const { $el: e } = t.pagination;
              e &&
                e[t.enabled ? "removeClass" : "addClass"](
                  t.params.pagination.lockClass
                );
            }),
            i("lock unlock", () => {
              d();
            }),
            i("click", (e, n) => {
              const i = n.target,
                { $el: r } = t.pagination;
              if (
                t.params.pagination.el &&
                t.params.pagination.hideOnClick &&
                r.length > 0 &&
                !x(i).hasClass(t.params.pagination.bulletClass)
              ) {
                if (
                  t.navigation &&
                  ((t.navigation.nextEl && i === t.navigation.nextEl) ||
                    (t.navigation.prevEl && i === t.navigation.prevEl))
                )
                  return;
                const e = r.hasClass(t.params.pagination.hiddenClass);
                s(!0 === e ? "paginationShow" : "paginationHide"),
                  r.toggleClass(t.params.pagination.hiddenClass);
              }
            }),
            Object.assign(t.pagination, {
              render: u,
              update: d,
              init: p,
              destroy: f,
            });
        },
      ]),
      H.use([
        function (e) {
          let { swiper: t, extendParams: n, on: i, emit: s } = e;
          function r(e) {
            let n;
            return (
              e &&
                ((n = x(e)),
                t.params.uniqueNavElements &&
                  "string" == typeof e &&
                  n.length > 1 &&
                  1 === t.$el.find(e).length &&
                  (n = t.$el.find(e))),
              n
            );
          }
          function a(e, n) {
            const i = t.params.navigation;
            e &&
              e.length > 0 &&
              (e[n ? "addClass" : "removeClass"](i.disabledClass),
              e[0] && "BUTTON" === e[0].tagName && (e[0].disabled = n),
              t.params.watchOverflow &&
                t.enabled &&
                e[t.isLocked ? "addClass" : "removeClass"](i.lockClass));
          }
          function o() {
            if (t.params.loop) return;
            const { $nextEl: e, $prevEl: n } = t.navigation;
            a(n, t.isBeginning && !t.params.rewind),
              a(e, t.isEnd && !t.params.rewind);
          }
          function l(e) {
            e.preventDefault(),
              (!t.isBeginning || t.params.loop || t.params.rewind) &&
                t.slidePrev();
          }
          function c(e) {
            e.preventDefault(),
              (!t.isEnd || t.params.loop || t.params.rewind) && t.slideNext();
          }
          function d() {
            const e = t.params.navigation;
            if (
              ((t.params.navigation = W(
                t,
                t.originalParams.navigation,
                t.params.navigation,
                { nextEl: "swiper-button-next", prevEl: "swiper-button-prev" }
              )),
              !e.nextEl && !e.prevEl)
            )
              return;
            const n = r(e.nextEl),
              i = r(e.prevEl);
            n && n.length > 0 && n.on("click", c),
              i && i.length > 0 && i.on("click", l),
              Object.assign(t.navigation, {
                $nextEl: n,
                nextEl: n && n[0],
                $prevEl: i,
                prevEl: i && i[0],
              }),
              t.enabled ||
                (n && n.addClass(e.lockClass), i && i.addClass(e.lockClass));
          }
          function u() {
            const { $nextEl: e, $prevEl: n } = t.navigation;
            e &&
              e.length &&
              (e.off("click", c),
              e.removeClass(t.params.navigation.disabledClass)),
              n &&
                n.length &&
                (n.off("click", l),
                n.removeClass(t.params.navigation.disabledClass));
          }
          n({
            navigation: {
              nextEl: null,
              prevEl: null,
              hideOnClick: !1,
              disabledClass: "swiper-button-disabled",
              hiddenClass: "swiper-button-hidden",
              lockClass: "swiper-button-lock",
            },
          }),
            (t.navigation = {
              nextEl: null,
              $nextEl: null,
              prevEl: null,
              $prevEl: null,
            }),
            i("init", () => {
              d(), o();
            }),
            i("toEdge fromEdge lock unlock", () => {
              o();
            }),
            i("destroy", () => {
              u();
            }),
            i("enable disable", () => {
              const { $nextEl: e, $prevEl: n } = t.navigation;
              e &&
                e[t.enabled ? "removeClass" : "addClass"](
                  t.params.navigation.lockClass
                ),
                n &&
                  n[t.enabled ? "removeClass" : "addClass"](
                    t.params.navigation.lockClass
                  );
            }),
            i("click", (e, n) => {
              const { $nextEl: i, $prevEl: r } = t.navigation,
                a = n.target;
              if (
                t.params.navigation.hideOnClick &&
                !x(a).is(r) &&
                !x(a).is(i)
              ) {
                if (
                  t.pagination &&
                  t.params.pagination &&
                  t.params.pagination.clickable &&
                  (t.pagination.el === a || t.pagination.el.contains(a))
                )
                  return;
                let e;
                i
                  ? (e = i.hasClass(t.params.navigation.hiddenClass))
                  : r && (e = r.hasClass(t.params.navigation.hiddenClass)),
                  s(!0 === e ? "navigationShow" : "navigationHide"),
                  i && i.toggleClass(t.params.navigation.hiddenClass),
                  r && r.toggleClass(t.params.navigation.hiddenClass);
              }
            }),
            Object.assign(t.navigation, { update: o, init: d, destroy: u });
        },
      ]),
      H.use([
        function (e) {
          let { swiper: t, extendParams: n, on: i } = e;
          n({ fadeEffect: { crossFade: !1, transformEl: null } }),
            (function (e) {
              const {
                effect: t,
                swiper: n,
                on: i,
                setTranslate: s,
                setTransition: r,
                overwriteParams: a,
                perspective: o,
              } = e;
              let l;
              i("beforeInit", () => {
                if (n.params.effect !== t) return;
                n.classNames.push(`${n.params.containerModifierClass}${t}`),
                  o &&
                    o() &&
                    n.classNames.push(n.params.containerModifierClass + "3d");
                const e = a ? a() : {};
                Object.assign(n.params, e), Object.assign(n.originalParams, e);
              }),
                i("setTranslate", () => {
                  n.params.effect === t && s();
                }),
                i("setTransition", (e, i) => {
                  n.params.effect === t && r(i);
                }),
                i("virtualUpdate", () => {
                  n.slides.length || (l = !0),
                    requestAnimationFrame(() => {
                      l && n.slides && n.slides.length && (s(), (l = !1));
                    });
                });
            })({
              effect: "fade",
              swiper: t,
              on: i,
              setTranslate: () => {
                const { slides: e } = t,
                  n = t.params.fadeEffect;
                for (let i = 0; i < e.length; i += 1) {
                  const e = t.slides.eq(i);
                  let s = -e[0].swiperSlideOffset;
                  t.params.virtualTranslate || (s -= t.translate);
                  let r = 0;
                  t.isHorizontal() || ((r = s), (s = 0));
                  const a = t.params.fadeEffect.crossFade
                    ? Math.max(1 - Math.abs(e[0].progress), 0)
                    : 1 + Math.min(Math.max(e[0].progress, -1), 0);
                  Y(n, e)
                    .css({ opacity: a })
                    .transform(`translate3d(${s}px, ${r}px, 0px)`);
                }
              },
              setTransition: (e) => {
                const { transformEl: n } = t.params.fadeEffect;
                (n ? t.slides.find(n) : t.slides).transition(e),
                  (function (e) {
                    let {
                      swiper: t,
                      duration: n,
                      transformEl: i,
                      allSlides: s,
                    } = e;
                    const { slides: r, activeIndex: a, $wrapperEl: o } = t;
                    if (t.params.virtualTranslate && 0 !== n) {
                      let e,
                        n = !1;
                      (e = s
                        ? i
                          ? r.find(i)
                          : r
                        : i
                        ? r.eq(a).find(i)
                        : r.eq(a)).transitionEnd(() => {
                        if (n) return;
                        if (!t || t.destroyed) return;
                        (n = !0), (t.animating = !1);
                        const e = ["webkitTransitionEnd", "transitionend"];
                        for (let t = 0; t < e.length; t += 1) o.trigger(e[t]);
                      });
                    }
                  })({ swiper: t, duration: e, transformEl: n, allSlides: !0 });
              },
              overwriteParams: () => ({
                slidesPerView: 1,
                slidesPerGroup: 1,
                watchSlidesProgress: !0,
                spaceBetween: 0,
                virtualTranslate: !t.params.cssMode,
              }),
            });
        },
      ]),
      H.use([
        function (e) {
          let t,
            { swiper: n, extendParams: i, on: s, emit: r } = e;
          function a() {
            const e = n.slides.eq(n.activeIndex);
            let i = n.params.autoplay.delay;
            e.attr("data-swiper-autoplay") &&
              (i = e.attr("data-swiper-autoplay") || n.params.autoplay.delay),
              clearTimeout(t),
              (t = _(() => {
                let e;
                n.params.autoplay.reverseDirection
                  ? n.params.loop
                    ? (n.loopFix(),
                      (e = n.slidePrev(n.params.speed, !0, !0)),
                      r("autoplay"))
                    : n.isBeginning
                    ? n.params.autoplay.stopOnLastSlide
                      ? l()
                      : ((e = n.slideTo(
                          n.slides.length - 1,
                          n.params.speed,
                          !0,
                          !0
                        )),
                        r("autoplay"))
                    : ((e = n.slidePrev(n.params.speed, !0, !0)), r("autoplay"))
                  : n.params.loop
                  ? (n.loopFix(),
                    (e = n.slideNext(n.params.speed, !0, !0)),
                    r("autoplay"))
                  : n.isEnd
                  ? n.params.autoplay.stopOnLastSlide
                    ? l()
                    : ((e = n.slideTo(0, n.params.speed, !0, !0)),
                      r("autoplay"))
                  : ((e = n.slideNext(n.params.speed, !0, !0)), r("autoplay")),
                  ((n.params.cssMode && n.autoplay.running) || !1 === e) && a();
              }, i));
          }
          function o() {
            return (
              void 0 === t &&
              !n.autoplay.running &&
              ((n.autoplay.running = !0), r("autoplayStart"), a(), !0)
            );
          }
          function l() {
            return (
              !!n.autoplay.running &&
              void 0 !== t &&
              (t && (clearTimeout(t), (t = void 0)),
              (n.autoplay.running = !1),
              r("autoplayStop"),
              !0)
            );
          }
          function c(e) {
            n.autoplay.running &&
              (n.autoplay.paused ||
                (t && clearTimeout(t),
                (n.autoplay.paused = !0),
                0 !== e && n.params.autoplay.waitForTransition
                  ? ["transitionend", "webkitTransitionEnd"].forEach((e) => {
                      n.$wrapperEl[0].addEventListener(e, p);
                    })
                  : ((n.autoplay.paused = !1), a())));
          }
          function d() {
            const e = u();
            "hidden" === e.visibilityState && n.autoplay.running && c(),
              "visible" === e.visibilityState &&
                n.autoplay.paused &&
                (a(), (n.autoplay.paused = !1));
          }
          function p(e) {
            n &&
              !n.destroyed &&
              n.$wrapperEl &&
              e.target === n.$wrapperEl[0] &&
              (["transitionend", "webkitTransitionEnd"].forEach((e) => {
                n.$wrapperEl[0].removeEventListener(e, p);
              }),
              (n.autoplay.paused = !1),
              n.autoplay.running ? a() : l());
          }
          function f() {
            n.params.autoplay.disableOnInteraction
              ? l()
              : (r("autoplayPause"), c()),
              ["transitionend", "webkitTransitionEnd"].forEach((e) => {
                n.$wrapperEl[0].removeEventListener(e, p);
              });
          }
          function h() {
            n.params.autoplay.disableOnInteraction ||
              ((n.autoplay.paused = !1), r("autoplayResume"), a());
          }
          (n.autoplay = { running: !1, paused: !1 }),
            i({
              autoplay: {
                enabled: !1,
                delay: 3e3,
                waitForTransition: !0,
                disableOnInteraction: !0,
                stopOnLastSlide: !1,
                reverseDirection: !1,
                pauseOnMouseEnter: !1,
              },
            }),
            s("init", () => {
              n.params.autoplay.enabled &&
                (o(),
                u().addEventListener("visibilitychange", d),
                n.params.autoplay.pauseOnMouseEnter &&
                  (n.$el.on("mouseenter", f), n.$el.on("mouseleave", h)));
            }),
            s("beforeTransitionStart", (e, t, i) => {
              n.autoplay.running &&
                (i || !n.params.autoplay.disableOnInteraction
                  ? n.autoplay.pause(t)
                  : l());
            }),
            s("sliderFirstMove", () => {
              n.autoplay.running &&
                (n.params.autoplay.disableOnInteraction ? l() : c());
            }),
            s("touchEnd", () => {
              n.params.cssMode &&
                n.autoplay.paused &&
                !n.params.autoplay.disableOnInteraction &&
                a();
            }),
            s("destroy", () => {
              n.$el.off("mouseenter", f),
                n.$el.off("mouseleave", h),
                n.autoplay.running && l(),
                u().removeEventListener("visibilitychange", d);
            }),
            Object.assign(n.autoplay, { pause: c, run: a, start: o, stop: l });
        },
      ]),
      H.use([
        function (e) {
          let { swiper: t, extendParams: n, emit: i, once: s } = e;
          n({
            freeMode: {
              enabled: !1,
              momentum: !0,
              momentumRatio: 1,
              momentumBounce: !0,
              momentumBounceRatio: 1,
              momentumVelocityRatio: 1,
              sticky: !1,
              minimumVelocity: 0.02,
            },
          }),
            Object.assign(t, {
              freeMode: {
                onTouchStart: function () {
                  const e = t.getTranslate();
                  t.setTranslate(e),
                    t.setTransition(0),
                    (t.touchEventsData.velocities.length = 0),
                    t.freeMode.onTouchEnd({
                      currentPos: t.rtl ? t.translate : -t.translate,
                    });
                },
                onTouchMove: function () {
                  const { touchEventsData: e, touches: n } = t;
                  0 === e.velocities.length &&
                    e.velocities.push({
                      position: n[t.isHorizontal() ? "startX" : "startY"],
                      time: e.touchStartTime,
                    }),
                    e.velocities.push({
                      position: n[t.isHorizontal() ? "currentX" : "currentY"],
                      time: E(),
                    });
                },
                onTouchEnd: function (e) {
                  let { currentPos: n } = e;
                  const {
                      params: r,
                      $wrapperEl: a,
                      rtlTranslate: o,
                      snapGrid: l,
                      touchEventsData: c,
                    } = t,
                    d = E() - c.touchStartTime;
                  if (n < -t.minTranslate()) t.slideTo(t.activeIndex);
                  else if (n > -t.maxTranslate())
                    t.slides.length < l.length
                      ? t.slideTo(l.length - 1)
                      : t.slideTo(t.slides.length - 1);
                  else {
                    if (r.freeMode.momentum) {
                      if (c.velocities.length > 1) {
                        const e = c.velocities.pop(),
                          n = c.velocities.pop(),
                          i = e.position - n.position,
                          s = e.time - n.time;
                        (t.velocity = i / s),
                          (t.velocity /= 2),
                          Math.abs(t.velocity) < r.freeMode.minimumVelocity &&
                            (t.velocity = 0),
                          (s > 150 || E() - e.time > 300) && (t.velocity = 0);
                      } else t.velocity = 0;
                      (t.velocity *= r.freeMode.momentumVelocityRatio),
                        (c.velocities.length = 0);
                      let e = 1e3 * r.freeMode.momentumRatio;
                      const n = t.velocity * e;
                      let d = t.translate + n;
                      o && (d = -d);
                      let u,
                        p = !1;
                      const f =
                        20 *
                        Math.abs(t.velocity) *
                        r.freeMode.momentumBounceRatio;
                      let h;
                      if (d < t.maxTranslate())
                        r.freeMode.momentumBounce
                          ? (d + t.maxTranslate() < -f &&
                              (d = t.maxTranslate() - f),
                            (u = t.maxTranslate()),
                            (p = !0),
                            (c.allowMomentumBounce = !0))
                          : (d = t.maxTranslate()),
                          r.loop && r.centeredSlides && (h = !0);
                      else if (d > t.minTranslate())
                        r.freeMode.momentumBounce
                          ? (d - t.minTranslate() > f &&
                              (d = t.minTranslate() + f),
                            (u = t.minTranslate()),
                            (p = !0),
                            (c.allowMomentumBounce = !0))
                          : (d = t.minTranslate()),
                          r.loop && r.centeredSlides && (h = !0);
                      else if (r.freeMode.sticky) {
                        let e;
                        for (let t = 0; t < l.length; t += 1)
                          if (l[t] > -d) {
                            e = t;
                            break;
                          }
                        d = -(d =
                          Math.abs(l[e] - d) < Math.abs(l[e - 1] - d) ||
                          "next" === t.swipeDirection
                            ? l[e]
                            : l[e - 1]);
                      }
                      if (
                        (h &&
                          s("transitionEnd", () => {
                            t.loopFix();
                          }),
                        0 !== t.velocity)
                      ) {
                        if (
                          ((e = o
                            ? Math.abs((-d - t.translate) / t.velocity)
                            : Math.abs((d - t.translate) / t.velocity)),
                          r.freeMode.sticky)
                        ) {
                          const n = Math.abs((o ? -d : d) - t.translate),
                            i = t.slidesSizesGrid[t.activeIndex];
                          e =
                            n < i
                              ? r.speed
                              : n < 2 * i
                              ? 1.5 * r.speed
                              : 2.5 * r.speed;
                        }
                      } else if (r.freeMode.sticky)
                        return void t.slideToClosest();
                      r.freeMode.momentumBounce && p
                        ? (t.updateProgress(u),
                          t.setTransition(e),
                          t.setTranslate(d),
                          t.transitionStart(!0, t.swipeDirection),
                          (t.animating = !0),
                          a.transitionEnd(() => {
                            t &&
                              !t.destroyed &&
                              c.allowMomentumBounce &&
                              (i("momentumBounce"),
                              t.setTransition(r.speed),
                              setTimeout(() => {
                                t.setTranslate(u),
                                  a.transitionEnd(() => {
                                    t && !t.destroyed && t.transitionEnd();
                                  });
                              }, 0));
                          }))
                        : t.velocity
                        ? (i("_freeModeNoMomentumRelease"),
                          t.updateProgress(d),
                          t.setTransition(e),
                          t.setTranslate(d),
                          t.transitionStart(!0, t.swipeDirection),
                          t.animating ||
                            ((t.animating = !0),
                            a.transitionEnd(() => {
                              t && !t.destroyed && t.transitionEnd();
                            })))
                        : t.updateProgress(d),
                        t.updateActiveIndex(),
                        t.updateSlidesClasses();
                    } else {
                      if (r.freeMode.sticky) return void t.slideToClosest();
                      r.freeMode && i("_freeModeNoMomentumRelease");
                    }
                    (!r.freeMode.momentum || d >= r.longSwipesMs) &&
                      (t.updateProgress(),
                      t.updateActiveIndex(),
                      t.updateSlidesClasses());
                  }
                },
              },
            });
        },
      ]),
      (window.enterView = X.a),
      (window.scrollMonitor = Z),
      i.a.start();
  },
]);
// ===================================================================

  function (e, t, n) {
    "use strict";
    (function (e) {
      n.d(t, "a", function () {
        return Qe;
      });
      var i,
        s,
        r,
        a,
        o = Object.create,
        l = Object.defineProperty,
        c = Object.getPrototypeOf,
        d = Object.prototype.hasOwnProperty,
        u = Object.getOwnPropertyNames,
        p = Object.getOwnPropertyDescriptor,
        f = (e, t) => () => (
          t || e((t = { exports: {} }).exports, t), t.exports
        ),
        h = f((t) => {
          function n(e, t) {
            const n = Object.create(null),
              i = e.split(",");
            for (let e = 0; e < i.length; e++) n[i[e]] = !0;
            return t ? (e) => !!n[e.toLowerCase()] : (e) => !!n[e];
          }
          Object.defineProperty(t, "__esModule", { value: !0 });
          var i = {
              1: "TEXT",
              2: "CLASS",
              4: "STYLE",
              8: "PROPS",
              16: "FULL_PROPS",
              32: "HYDRATE_EVENTS",
              64: "STABLE_FRAGMENT",
              128: "KEYED_FRAGMENT",
              256: "UNKEYED_FRAGMENT",
              512: "NEED_PATCH",
              1024: "DYNAMIC_SLOTS",
              2048: "DEV_ROOT_FRAGMENT",
              [-1]: "HOISTED",
              [-2]: "BAIL",
            },
            s = n(
              "Infinity,undefined,NaN,isFinite,isNaN,parseFloat,parseInt,decodeURI,decodeURIComponent,encodeURI,encodeURIComponent,Math,Number,Date,Array,Object,Boolean,String,RegExp,Map,Set,JSON,Intl,BigInt"
            ),
            r =
              "itemscope,allowfullscreen,formnovalidate,ismap,nomodule,novalidate,readonly",
            a = n(r),
            o = n(
              r +
                ",async,autofocus,autoplay,controls,default,defer,disabled,hidden,loop,open,required,reversed,scoped,seamless,checked,muted,multiple,selected"
            ),
            l = /[>/="'\u0009\u000a\u000c\u0020]/,
            c = {},
            d = n(
              "animation-iteration-count,border-image-outset,border-image-slice,border-image-width,box-flex,box-flex-group,box-ordinal-group,column-count,columns,flex,flex-grow,flex-positive,flex-shrink,flex-negative,flex-order,grid-row,grid-row-end,grid-row-span,grid-row-start,grid-column,grid-column-end,grid-column-span,grid-column-start,font-weight,line-clamp,line-height,opacity,order,orphans,tab-size,widows,z-index,zoom,fill-opacity,flood-opacity,stop-opacity,stroke-dasharray,stroke-dashoffset,stroke-miterlimit,stroke-opacity,stroke-width"
            ),
            u = n(
              "accept,accept-charset,accesskey,action,align,allow,alt,async,autocapitalize,autocomplete,autofocus,autoplay,background,bgcolor,border,buffered,capture,challenge,charset,checked,cite,class,code,codebase,color,cols,colspan,content,contenteditable,contextmenu,controls,coords,crossorigin,csp,data,datetime,decoding,default,defer,dir,dirname,disabled,download,draggable,dropzone,enctype,enterkeyhint,for,form,formaction,formenctype,formmethod,formnovalidate,formtarget,headers,height,hidden,high,href,hreflang,http-equiv,icon,id,importance,integrity,ismap,itemprop,keytype,kind,label,lang,language,loading,list,loop,low,manifest,max,maxlength,minlength,media,min,multiple,muted,name,novalidate,open,optimum,pattern,ping,placeholder,poster,preload,radiogroup,readonly,referrerpolicy,rel,required,reversed,rows,rowspan,sandbox,scope,scoped,selected,shape,size,sizes,slot,span,spellcheck,src,srcdoc,srclang,srcset,start,step,style,summary,tabindex,target,title,translate,type,usemap,value,width,wrap"
            ),
            p = /;(?![^(]*\))/g,
            f = /:(.+)/;
          function h(e) {
            const t = {};
            return (
              e.split(p).forEach((e) => {
                if (e) {
                  const n = e.split(f);
                  n.length > 1 && (t[n[0].trim()] = n[1].trim());
                }
              }),
              t
            );
          }
          var m = n(
              "html,body,base,head,link,meta,style,title,address,article,aside,footer,header,h1,h2,h3,h4,h5,h6,hgroup,nav,section,div,dd,dl,dt,figcaption,figure,picture,hr,img,li,main,ol,p,pre,ul,a,b,abbr,bdi,bdo,br,cite,code,data,dfn,em,i,kbd,mark,q,rp,rt,rtc,ruby,s,samp,small,span,strong,sub,sup,time,u,var,wbr,area,audio,map,track,video,embed,object,param,source,canvas,script,noscript,del,ins,caption,col,colgroup,table,thead,tbody,td,th,tr,button,datalist,fieldset,form,input,label,legend,meter,optgroup,option,output,progress,select,textarea,details,dialog,menu,summary,template,blockquote,iframe,tfoot"
            ),
            g = n(
              "svg,animate,animateMotion,animateTransform,circle,clipPath,color-profile,defs,desc,discard,ellipse,feBlend,feColorMatrix,feComponentTransfer,feComposite,feConvolveMatrix,feDiffuseLighting,feDisplacementMap,feDistanceLight,feDropShadow,feFlood,feFuncA,feFuncB,feFuncG,feFuncR,feGaussianBlur,feImage,feMerge,feMergeNode,feMorphology,feOffset,fePointLight,feSpecularLighting,feSpotLight,feTile,feTurbulence,filter,foreignObject,g,hatch,hatchpath,image,line,linearGradient,marker,mask,mesh,meshgradient,meshpatch,meshrow,metadata,mpath,path,pattern,polygon,polyline,radialGradient,rect,set,solidcolor,stop,switch,symbol,text,textPath,title,tspan,unknown,use,view"
            ),
            v = n(
              "area,base,br,col,embed,hr,img,input,link,meta,param,source,track,wbr"
            ),
            b = /["'&<>]/,
            w = /^-?>|<!--|-->|--!>|<!-$/g;
          function y(e, t) {
            if (e === t) return !0;
            let n = L(e),
              i = L(t);
            if (n || i) return !(!n || !i) && e.getTime() === t.getTime();
            if (((n = M(e)), (i = M(t)), n || i))
              return (
                !(!n || !i) &&
                (function (e, t) {
                  if (e.length !== t.length) return !1;
                  let n = !0;
                  for (let i = 0; n && i < e.length; i++) n = y(e[i], t[i]);
                  return n;
                })(e, t)
              );
            if (((n = $(e)), (i = $(t)), n || i)) {
              if (!n || !i) return !1;
              if (Object.keys(e).length !== Object.keys(t).length) return !1;
              for (const n in e) {
                const i = e.hasOwnProperty(n),
                  s = t.hasOwnProperty(n);
                if ((i && !s) || (!i && s) || !y(e[n], t[n])) return !1;
              }
            }
            return String(e) === String(t);
          }
          var x,
            _ = (e, t) =>
              O(t)
                ? {
                    [`Map(${t.size})`]: [...t.entries()].reduce(
                      (e, [t, n]) => ((e[t + " =>"] = n), e),
                      {}
                    ),
                  }
                : A(t)
                ? { [`Set(${t.size})`]: [...t.values()] }
                : !$(t) || M(t) || R(t)
                ? t
                : String(t),
            E = Object.freeze({}),
            T = Object.freeze([]),
            C = /^on[^a-z]/,
            S = Object.assign,
            k = Object.prototype.hasOwnProperty,
            M = Array.isArray,
            O = (e) => "[object Map]" === N(e),
            A = (e) => "[object Set]" === N(e),
            L = (e) => e instanceof Date,
            P = (e) => "function" == typeof e,
            I = (e) => "string" == typeof e,
            $ = (e) => null !== e && "object" == typeof e,
            z = Object.prototype.toString,
            N = (e) => z.call(e),
            R = (e) => "[object Object]" === N(e),
            D = n(
              ",key,ref,onVnodeBeforeMount,onVnodeMounted,onVnodeBeforeUpdate,onVnodeUpdated,onVnodeBeforeUnmount,onVnodeUnmounted"
            ),
            j = (e) => {
              const t = Object.create(null);
              return (n) => t[n] || (t[n] = e(n));
            },
            B = /-(\w)/g,
            V = j((e) => e.replace(B, (e, t) => (t ? t.toUpperCase() : ""))),
            F = /\B([A-Z])/g,
            G = j((e) => e.replace(F, "-$1").toLowerCase()),
            H = j((e) => e.charAt(0).toUpperCase() + e.slice(1)),
            W = j((e) => (e ? "on" + H(e) : ""));
          (t.EMPTY_ARR = T),
            (t.EMPTY_OBJ = E),
            (t.NO = () => !1),
            (t.NOOP = () => {}),
            (t.PatchFlagNames = i),
            (t.babelParserDefaultPlugins = [
              "bigInt",
              "optionalChaining",
              "nullishCoalescingOperator",
            ]),
            (t.camelize = V),
            (t.capitalize = H),
            (t.def = (e, t, n) => {
              Object.defineProperty(e, t, {
                configurable: !0,
                enumerable: !1,
                value: n,
              });
            }),
            (t.escapeHtml = function (e) {
              const t = "" + e,
                n = b.exec(t);
              if (!n) return t;
              let i,
                s,
                r = "",
                a = 0;
              for (s = n.index; s < t.length; s++) {
                switch (t.charCodeAt(s)) {
                  case 34:
                    i = "&quot;";
                    break;
                  case 38:
                    i = "&amp;";
                    break;
                  case 39:
                    i = "&#39;";
                    break;
                  case 60:
                    i = "&lt;";
                    break;
                  case 62:
                    i = "&gt;";
                    break;
                  default:
                    continue;
                }
                a !== s && (r += t.substring(a, s)), (a = s + 1), (r += i);
              }
              return a !== s ? r + t.substring(a, s) : r;
            }),
            (t.escapeHtmlComment = function (e) {
              return e.replace(w, "");
            }),
            (t.extend = S),
            (t.generateCodeFrame = function (e, t = 0, n = e.length) {
              const i = e.split(/\r?\n/);
              let s = 0;
              const r = [];
              for (let e = 0; e < i.length; e++)
                if ((s += i[e].length + 1) >= t) {
                  for (let a = e - 2; a <= e + 2 || n > s; a++) {
                    if (a < 0 || a >= i.length) continue;
                    const o = a + 1;
                    r.push(
                      `${o}${" ".repeat(Math.max(3 - String(o).length, 0))}|  ${
                        i[a]
                      }`
                    );
                    const l = i[a].length;
                    if (a === e) {
                      const e = t - (s - l) + 1,
                        i = Math.max(1, n > s ? l - e : n - t);
                      r.push("   |  " + " ".repeat(e) + "^".repeat(i));
                    } else if (a > e) {
                      if (n > s) {
                        const e = Math.max(Math.min(n - s, l), 1);
                        r.push("   |  " + "^".repeat(e));
                      }
                      s += l + 1;
                    }
                  }
                  break;
                }
              return r.join("\n");
            }),
            (t.getGlobalThis = () =>
              x ||
              (x =
                "undefined" != typeof globalThis
                  ? globalThis
                  : "undefined" != typeof self
                  ? self
                  : "undefined" != typeof window
                  ? window
                  : void 0 !== e
                  ? e
                  : {})),
            (t.hasChanged = (e, t) => e !== t && (e == e || t == t)),
            (t.hasOwn = (e, t) => k.call(e, t)),
            (t.hyphenate = G),
            (t.invokeArrayFns = (e, t) => {
              for (let n = 0; n < e.length; n++) e[n](t);
            }),
            (t.isArray = M),
            (t.isBooleanAttr = o),
            (t.isDate = L),
            (t.isFunction = P),
            (t.isGloballyWhitelisted = s),
            (t.isHTMLTag = m),
            (t.isIntegerKey = (e) =>
              I(e) &&
              "NaN" !== e &&
              "-" !== e[0] &&
              "" + parseInt(e, 10) === e),
            (t.isKnownAttr = u),
            (t.isMap = O),
            (t.isModelListener = (e) => e.startsWith("onUpdate:")),
            (t.isNoUnitNumericStyleProp = d),
            (t.isObject = $),
            (t.isOn = (e) => C.test(e)),
            (t.isPlainObject = R),
            (t.isPromise = (e) => $(e) && P(e.then) && P(e.catch)),
            (t.isReservedProp = D),
            (t.isSSRSafeAttrName = function (e) {
              if (c.hasOwnProperty(e)) return c[e];
              const t = l.test(e);
              return (
                t && console.error("unsafe attribute name: " + e), (c[e] = !t)
              );
            }),
            (t.isSVGTag = g),
            (t.isSet = A),
            (t.isSpecialBooleanAttr = a),
            (t.isString = I),
            (t.isSymbol = (e) => "symbol" == typeof e),
            (t.isVoidTag = v),
            (t.looseEqual = y),
            (t.looseIndexOf = function (e, t) {
              return e.findIndex((e) => y(e, t));
            }),
            (t.makeMap = n),
            (t.normalizeClass = function e(t) {
              let n = "";
              if (I(t)) n = t;
              else if (M(t))
                for (let i = 0; i < t.length; i++) {
                  const s = e(t[i]);
                  s && (n += s + " ");
                }
              else if ($(t)) for (const e in t) t[e] && (n += e + " ");
              return n.trim();
            }),
            (t.normalizeStyle = function e(t) {
              if (M(t)) {
                const n = {};
                for (let i = 0; i < t.length; i++) {
                  const s = t[i],
                    r = e(I(s) ? h(s) : s);
                  if (r) for (const e in r) n[e] = r[e];
                }
                return n;
              }
              if ($(t)) return t;
            }),
            (t.objectToString = z),
            (t.parseStringStyle = h),
            (t.propsToAttrMap = {
              acceptCharset: "accept-charset",
              className: "class",
              htmlFor: "for",
              httpEquiv: "http-equiv",
            }),
            (t.remove = (e, t) => {
              const n = e.indexOf(t);
              n > -1 && e.splice(n, 1);
            }),
            (t.slotFlagsText = { 1: "STABLE", 2: "DYNAMIC", 3: "FORWARDED" }),
            (t.stringifyStyle = function (e) {
              let t = "";
              if (!e) return t;
              for (const n in e) {
                const i = e[n],
                  s = n.startsWith("--") ? n : G(n);
                (I(i) || ("number" == typeof i && d(s))) && (t += `${s}:${i};`);
              }
              return t;
            }),
            (t.toDisplayString = (e) =>
              null == e ? "" : $(e) ? JSON.stringify(e, _, 2) : String(e)),
            (t.toHandlerKey = W),
            (t.toNumber = (e) => {
              const t = parseFloat(e);
              return isNaN(t) ? e : t;
            }),
            (t.toRawType = (e) => N(e).slice(8, -1)),
            (t.toTypeString = N);
        }),
        m = f((e, t) => {
          t.exports = h();
        }),
        g = f((e) => {
          Object.defineProperty(e, "__esModule", { value: !0 });
          var t,
            n = m(),
            i = new WeakMap(),
            s = [],
            r = Symbol("iterate"),
            a = Symbol("Map key iterate");
          function o(e, i = n.EMPTY_OBJ) {
            (function (e) {
              return e && !0 === e._isEffect;
            })(e) && (e = e.raw);
            const r = (function (e, n) {
              const i = function () {
                if (!i.active) return e();
                if (!s.includes(i)) {
                  c(i);
                  try {
                    return f(), s.push(i), (t = i), e();
                  } finally {
                    s.pop(), h(), (t = s[s.length - 1]);
                  }
                }
              };
              return (
                (i.id = l++),
                (i.allowRecurse = !!n.allowRecurse),
                (i._isEffect = !0),
                (i.active = !0),
                (i.raw = e),
                (i.deps = []),
                (i.options = n),
                i
              );
            })(e, i);
            return i.lazy || r(), r;
          }
          var l = 0;
          function c(e) {
            const { deps: t } = e;
            if (t.length) {
              for (let n = 0; n < t.length; n++) t[n].delete(e);
              t.length = 0;
            }
          }
          var d = !0,
            u = [];
          function p() {
            u.push(d), (d = !1);
          }
          function f() {
            u.push(d), (d = !0);
          }
          function h() {
            const e = u.pop();
            d = void 0 === e || e;
          }
          function g(e, n, s) {
            if (!d || void 0 === t) return;
            let r = i.get(e);
            r || i.set(e, (r = new Map()));
            let a = r.get(s);
            a || r.set(s, (a = new Set())),
              a.has(t) ||
                (a.add(t),
                t.deps.push(a),
                t.options.onTrack &&
                  t.options.onTrack({ effect: t, target: e, type: n, key: s }));
          }
          function v(e, s, o, l, c, d) {
            const u = i.get(e);
            if (!u) return;
            const p = new Set(),
              f = (e) => {
                e &&
                  e.forEach((e) => {
                    (e !== t || e.allowRecurse) && p.add(e);
                  });
              };
            if ("clear" === s) u.forEach(f);
            else if ("length" === o && n.isArray(e))
              u.forEach((e, t) => {
                ("length" === t || t >= l) && f(e);
              });
            else
              switch ((void 0 !== o && f(u.get(o)), s)) {
                case "add":
                  n.isArray(e)
                    ? n.isIntegerKey(o) && f(u.get("length"))
                    : (f(u.get(r)), n.isMap(e) && f(u.get(a)));
                  break;
                case "delete":
                  n.isArray(e) || (f(u.get(r)), n.isMap(e) && f(u.get(a)));
                  break;
                case "set":
                  n.isMap(e) && f(u.get(r));
              }
            p.forEach((t) => {
              t.options.onTrigger &&
                t.options.onTrigger({
                  effect: t,
                  target: e,
                  key: o,
                  type: s,
                  newValue: l,
                  oldValue: c,
                  oldTarget: d,
                }),
                t.options.scheduler ? t.options.scheduler(t) : t();
            });
          }
          var b = n.makeMap("__proto__,__v_isRef,__isVue"),
            w = new Set(
              Object.getOwnPropertyNames(Symbol)
                .map((e) => Symbol[e])
                .filter(n.isSymbol)
            ),
            y = C(),
            x = C(!1, !0),
            _ = C(!0),
            E = C(!0, !0),
            T = {};
          function C(e = !1, t = !1) {
            return function (i, s, r) {
              if ("__v_isReactive" === s) return !e;
              if ("__v_isReadonly" === s) return e;
              if (
                "__v_raw" === s &&
                r === (e ? (t ? ae : re) : t ? se : ie).get(i)
              )
                return i;
              const a = n.isArray(i);
              if (!e && a && n.hasOwn(T, s)) return Reflect.get(T, s, r);
              const o = Reflect.get(i, s, r);
              return (n.isSymbol(s) ? w.has(s) : b(s))
                ? o
                : (e || g(i, "get", s),
                  t
                    ? o
                    : me(o)
                    ? a && n.isIntegerKey(s)
                      ? o
                      : o.value
                    : n.isObject(o)
                    ? e
                      ? le(o)
                      : oe(o)
                    : o);
            };
          }
          ["includes", "indexOf", "lastIndexOf"].forEach((e) => {
            const t = Array.prototype[e];
            T[e] = function (...e) {
              const n = fe(this);
              for (let e = 0, t = this.length; e < t; e++) g(n, "get", e + "");
              const i = t.apply(n, e);
              return -1 === i || !1 === i ? t.apply(n, e.map(fe)) : i;
            };
          }),
            ["push", "pop", "shift", "unshift", "splice"].forEach((e) => {
              const t = Array.prototype[e];
              T[e] = function (...e) {
                p();
                const n = t.apply(this, e);
                return h(), n;
              };
            });
          var S = M(),
            k = M(!0);
          function M(e = !1) {
            return function (t, i, s, r) {
              let a = t[i];
              if (
                !e &&
                ((s = fe(s)), (a = fe(a)), !n.isArray(t) && me(a) && !me(s))
              )
                return (a.value = s), !0;
              const o =
                  n.isArray(t) && n.isIntegerKey(i)
                    ? Number(i) < t.length
                    : n.hasOwn(t, i),
                l = Reflect.set(t, i, s, r);
              return (
                t === fe(r) &&
                  (o
                    ? n.hasChanged(s, a) && v(t, "set", i, s, a)
                    : v(t, "add", i, s)),
                l
              );
            };
          }
          var O = {
              get: y,
              set: S,
              deleteProperty: function (e, t) {
                const i = n.hasOwn(e, t),
                  s = e[t],
                  r = Reflect.deleteProperty(e, t);
                return r && i && v(e, "delete", t, void 0, s), r;
              },
              has: function (e, t) {
                const i = Reflect.has(e, t);
                return (n.isSymbol(t) && w.has(t)) || g(e, "has", t), i;
              },
              ownKeys: function (e) {
                return (
                  g(e, "iterate", n.isArray(e) ? "length" : r),
                  Reflect.ownKeys(e)
                );
              },
            },
            A = {
              get: _,
              set: (e, t) => (
                console.warn(
                  `Set operation on key "${String(
                    t
                  )}" failed: target is readonly.`,
                  e
                ),
                !0
              ),
              deleteProperty: (e, t) => (
                console.warn(
                  `Delete operation on key "${String(
                    t
                  )}" failed: target is readonly.`,
                  e
                ),
                !0
              ),
            },
            L = n.extend({}, O, { get: x, set: k }),
            P = n.extend({}, A, { get: E }),
            I = (e) => (n.isObject(e) ? oe(e) : e),
            $ = (e) => (n.isObject(e) ? le(e) : e),
            z = (e) => e,
            N = (e) => Reflect.getPrototypeOf(e);
          function R(e, t, n = !1, i = !1) {
            const s = fe((e = e.__v_raw)),
              r = fe(t);
            t !== r && !n && g(s, "get", t), !n && g(s, "get", r);
            const { has: a } = N(s),
              o = i ? z : n ? $ : I;
            return a.call(s, t)
              ? o(e.get(t))
              : a.call(s, r)
              ? o(e.get(r))
              : void (e !== s && e.get(t));
          }
          function D(e, t = !1) {
            const n = this.__v_raw,
              i = fe(n),
              s = fe(e);
            return (
              e !== s && !t && g(i, "has", e),
              !t && g(i, "has", s),
              e === s ? n.has(e) : n.has(e) || n.has(s)
            );
          }
          function j(e, t = !1) {
            return (
              (e = e.__v_raw),
              !t && g(fe(e), "iterate", r),
              Reflect.get(e, "size", e)
            );
          }
          function B(e) {
            e = fe(e);
            const t = fe(this);
            return N(t).has.call(t, e) || (t.add(e), v(t, "add", e, e)), this;
          }
          function V(e, t) {
            t = fe(t);
            const i = fe(this),
              { has: s, get: r } = N(i);
            let a = s.call(i, e);
            a ? ne(i, s, e) : ((e = fe(e)), (a = s.call(i, e)));
            const o = r.call(i, e);
            return (
              i.set(e, t),
              a
                ? n.hasChanged(t, o) && v(i, "set", e, t, o)
                : v(i, "add", e, t),
              this
            );
          }
          function F(e) {
            const t = fe(this),
              { has: n, get: i } = N(t);
            let s = n.call(t, e);
            s ? ne(t, n, e) : ((e = fe(e)), (s = n.call(t, e)));
            const r = i ? i.call(t, e) : void 0,
              a = t.delete(e);
            return s && v(t, "delete", e, void 0, r), a;
          }
          function G() {
            const e = fe(this),
              t = 0 !== e.size,
              i = n.isMap(e) ? new Map(e) : new Set(e),
              s = e.clear();
            return t && v(e, "clear", void 0, void 0, i), s;
          }
          function H(e, t) {
            return function (n, i) {
              const s = this,
                a = s.__v_raw,
                o = fe(a),
                l = t ? z : e ? $ : I;
              return (
                !e && g(o, "iterate", r),
                a.forEach((e, t) => n.call(i, l(e), l(t), s))
              );
            };
          }
          function W(e, t, i) {
            return function (...s) {
              const o = this.__v_raw,
                l = fe(o),
                c = n.isMap(l),
                d = "entries" === e || (e === Symbol.iterator && c),
                u = "keys" === e && c,
                p = o[e](...s),
                f = i ? z : t ? $ : I;
              return (
                !t && g(l, "iterate", u ? a : r),
                {
                  next() {
                    const { value: e, done: t } = p.next();
                    return t
                      ? { value: e, done: t }
                      : { value: d ? [f(e[0]), f(e[1])] : f(e), done: t };
                  },
                  [Symbol.iterator]() {
                    return this;
                  },
                }
              );
            };
          }
          function q(e) {
            return function (...t) {
              {
                const i = t[0] ? `on key "${t[0]}" ` : "";
                console.warn(
                  `${n.capitalize(
                    e
                  )} operation ${i}failed: target is readonly.`,
                  fe(this)
                );
              }
              return "delete" !== e && this;
            };
          }
          var Y = {
              get(e) {
                return R(this, e);
              },
              get size() {
                return j(this);
              },
              has: D,
              add: B,
              set: V,
              delete: F,
              clear: G,
              forEach: H(!1, !1),
            },
            U = {
              get(e) {
                return R(this, e, !1, !0);
              },
              get size() {
                return j(this);
              },
              has: D,
              add: B,
              set: V,
              delete: F,
              clear: G,
              forEach: H(!1, !0),
            },
            X = {
              get(e) {
                return R(this, e, !0);
              },
              get size() {
                return j(this, !0);
              },
              has(e) {
                return D.call(this, e, !0);
              },
              add: q("add"),
              set: q("set"),
              delete: q("delete"),
              clear: q("clear"),
              forEach: H(!0, !1),
            },
            K = {
              get(e) {
                return R(this, e, !0, !0);
              },
              get size() {
                return j(this, !0);
              },
              has(e) {
                return D.call(this, e, !0);
              },
              add: q("add"),
              set: q("set"),
              delete: q("delete"),
              clear: q("clear"),
              forEach: H(!0, !0),
            };
          function J(e, t) {
            const i = t ? (e ? K : U) : e ? X : Y;
            return (t, s, r) =>
              "__v_isReactive" === s
                ? !e
                : "__v_isReadonly" === s
                ? e
                : "__v_raw" === s
                ? t
                : Reflect.get(n.hasOwn(i, s) && s in t ? i : t, s, r);
          }
          ["keys", "values", "entries", Symbol.iterator].forEach((e) => {
            (Y[e] = W(e, !1, !1)),
              (X[e] = W(e, !0, !1)),
              (U[e] = W(e, !1, !0)),
              (K[e] = W(e, !0, !0));
          });
          var Z = { get: J(!1, !1) },
            Q = { get: J(!1, !0) },
            ee = { get: J(!0, !1) },
            te = { get: J(!0, !0) };
          function ne(e, t, i) {
            const s = fe(i);
            if (s !== i && t.call(e, s)) {
              const t = n.toRawType(e);
              console.warn(
                `Reactive ${t} contains both the raw and reactive versions of the same object${
                  "Map" === t ? " as keys" : ""
                }, which can lead to inconsistencies. Avoid differentiating between the raw and reactive versions of an object and only use the reactive version if possible.`
              );
            }
          }
          var ie = new WeakMap(),
            se = new WeakMap(),
            re = new WeakMap(),
            ae = new WeakMap();
          function oe(e) {
            return e && e.__v_isReadonly ? e : ce(e, !1, O, Z, ie);
          }
          function le(e) {
            return ce(e, !0, A, ee, re);
          }
          function ce(e, t, i, s, r) {
            if (!n.isObject(e))
              return (
                console.warn("value cannot be made reactive: " + String(e)), e
              );
            if (e.__v_raw && (!t || !e.__v_isReactive)) return e;
            const a = r.get(e);
            if (a) return a;
            const o =
              (l = e).__v_skip || !Object.isExtensible(l)
                ? 0
                : (function (e) {
                    switch (n.toRawType(l)) {
                      case "Object":
                      case "Array":
                        return 1;
                      case "Map":
                      case "Set":
                      case "WeakMap":
                      case "WeakSet":
                        return 2;
                      default:
                        return 0;
                    }
                  })();
            var l;
            if (0 === o) return e;
            const c = new Proxy(e, 2 === o ? s : i);
            return r.set(e, c), c;
          }
          function de(e) {
            return ue(e) ? de(e.__v_raw) : !(!e || !e.__v_isReactive);
          }
          function ue(e) {
            return !(!e || !e.__v_isReadonly);
          }
          function pe(e) {
            return de(e) || ue(e);
          }
          function fe(e) {
            return (e && fe(e.__v_raw)) || e;
          }
          var he = (e) => (n.isObject(e) ? oe(e) : e);
          function me(e) {
            return Boolean(e && !0 === e.__v_isRef);
          }
          function ge(e, t = !1) {
            return me(e)
              ? e
              : new (class {
                  constructor(e, t = !1) {
                    (this._rawValue = e),
                      (this._shallow = t),
                      (this.__v_isRef = !0),
                      (this._value = t ? e : he(e));
                  }
                  get value() {
                    return g(fe(this), "get", "value"), this._value;
                  }
                  set value(e) {
                    n.hasChanged(fe(e), this._rawValue) &&
                      ((this._rawValue = e),
                      (this._value = this._shallow ? e : he(e)),
                      v(fe(this), "set", "value", e));
                  }
                })(e, t);
          }
          function ve(e) {
            return me(e) ? e.value : e;
          }
          var be = {
            get: (e, t, n) => ve(Reflect.get(e, t, n)),
            set: (e, t, n, i) => {
              const s = e[t];
              return me(s) && !me(n)
                ? ((s.value = n), !0)
                : Reflect.set(e, t, n, i);
            },
          };
          function we(e, t) {
            return me(e[t])
              ? e[t]
              : new (class {
                  constructor(e, t) {
                    (this._object = e), (this._key = t), (this.__v_isRef = !0);
                  }
                  get value() {
                    return this._object[this._key];
                  }
                  set value(e) {
                    this._object[this._key] = e;
                  }
                })(e, t);
          }
          (e.ITERATE_KEY = r),
            (e.computed = function (e) {
              let t, i;
              return (
                n.isFunction(e)
                  ? ((t = e),
                    (i = () => {
                      console.warn(
                        "Write operation failed: computed value is readonly"
                      );
                    }))
                  : ((t = e.get), (i = e.set)),
                new (class {
                  constructor(e, t, n) {
                    (this._setter = t),
                      (this._dirty = !0),
                      (this.__v_isRef = !0),
                      (this.effect = o(e, {
                        lazy: !0,
                        scheduler: () => {
                          this._dirty ||
                            ((this._dirty = !0), v(fe(this), "set", "value"));
                        },
                      })),
                      (this.__v_isReadonly = n);
                  }
                  get value() {
                    const e = fe(this);
                    return (
                      e._dirty && ((e._value = this.effect()), (e._dirty = !1)),
                      g(e, "get", "value"),
                      e._value
                    );
                  }
                  set value(e) {
                    this._setter(e);
                  }
                })(t, i, n.isFunction(e) || !e.set)
              );
            }),
            (e.customRef = function (e) {
              return new (class {
                constructor(e) {
                  this.__v_isRef = !0;
                  const { get: t, set: n } = e(
                    () => g(this, "get", "value"),
                    () => v(this, "set", "value")
                  );
                  (this._get = t), (this._set = n);
                }
                get value() {
                  return this._get();
                }
                set value(e) {
                  this._set(e);
                }
              })(e);
            }),
            (e.effect = o),
            (e.enableTracking = f),
            (e.isProxy = pe),
            (e.isReactive = de),
            (e.isReadonly = ue),
            (e.isRef = me),
            (e.markRaw = function (e) {
              return n.def(e, "__v_skip", !0), e;
            }),
            (e.pauseTracking = p),
            (e.proxyRefs = function (e) {
              return de(e) ? e : new Proxy(e, be);
            }),
            (e.reactive = oe),
            (e.readonly = le),
            (e.ref = function (e) {
              return ge(e);
            }),
            (e.resetTracking = h),
            (e.shallowReactive = function (e) {
              return ce(e, !1, L, Q, se);
            }),
            (e.shallowReadonly = function (e) {
              return ce(e, !0, P, te, ae);
            }),
            (e.shallowRef = function (e) {
              return ge(e, !0);
            }),
            (e.stop = function (e) {
              e.active &&
                (c(e), e.options.onStop && e.options.onStop(), (e.active = !1));
            }),
            (e.toRaw = fe),
            (e.toRef = we),
            (e.toRefs = function (e) {
              pe(e) ||
                console.warn(
                  "toRefs() expects a reactive object but received a plain one."
                );
              const t = n.isArray(e) ? new Array(e.length) : {};
              for (const n in e) t[n] = we(e, n);
              return t;
            }),
            (e.track = g),
            (e.trigger = v),
            (e.triggerRef = function (e) {
              v(fe(e), "set", "value", e.value);
            }),
            (e.unref = ve);
        }),
        v = f((e, t) => {
          t.exports = g();
        }),
        b = !1,
        w = !1,
        y = [];
      function x() {
        (b = !1), (w = !0);
        for (let e = 0; e < y.length; e++) y[e]();
        (y.length = 0), (w = !1);
      }
      var _ = !0;
      function E(e) {
        s = e;
      }
      var T = [],
        C = [],
        S = [];
      function k(e, t) {
        e._x_attributeCleanups &&
          Object.entries(e._x_attributeCleanups).forEach(([n, i]) => {
            (void 0 === t || t.includes(n)) &&
              (i.forEach((e) => e()), delete e._x_attributeCleanups[n]);
          });
      }
      var M = new MutationObserver(N),
        O = !1;
      function A() {
        M.observe(document, {
          subtree: !0,
          childList: !0,
          attributes: !0,
          attributeOldValue: !0,
        }),
          (O = !0);
      }
      var L = [],
        P = !1;
      function I(e) {
        if (!O) return e();
        (L = L.concat(M.takeRecords())).length &&
          !P &&
          ((P = !0),
          queueMicrotask(() => {
            N(L), (L.length = 0), (P = !1);
          })),
          M.disconnect(),
          (O = !1);
        let t = e();
        return A(), t;
      }
      var $ = !1,
        z = [];
      function N(e) {
        if ($) return void (z = z.concat(e));
        let t = [],
          n = [],
          i = new Map(),
          s = new Map();
        for (let r = 0; r < e.length; r++)
          if (
            !e[r].target._x_ignoreMutationObserver &&
            ("childList" === e[r].type &&
              (e[r].addedNodes.forEach((e) => 1 === e.nodeType && t.push(e)),
              e[r].removedNodes.forEach((e) => 1 === e.nodeType && n.push(e))),
            "attributes" === e[r].type)
          ) {
            let t = e[r].target,
              n = e[r].attributeName,
              a = e[r].oldValue,
              o = () => {
                i.has(t) || i.set(t, []),
                  i.get(t).push({ name: n, value: t.getAttribute(n) });
              },
              l = () => {
                s.has(t) || s.set(t, []), s.get(t).push(n);
              };
            t.hasAttribute(n) && null === a
              ? o()
              : t.hasAttribute(n)
              ? (l(), o())
              : l();
          }
        s.forEach((e, t) => {
          k(t, e);
        }),
          i.forEach((e, t) => {
            T.forEach((n) => n(t, e));
          });
        for (let e of t) n.includes(e) || S.forEach((t) => t(e));
        for (let e of n) t.includes(e) || C.forEach((t) => t(e));
        (t = null), (n = null), (i = null), (s = null);
      }
      function R(e, t, n) {
        return (
          (e._x_dataStack = [t, ...j(n || e)]),
          () => {
            e._x_dataStack = e._x_dataStack.filter((e) => e !== t);
          }
        );
      }
      function D(e, t) {
        let n = e._x_dataStack[0];
        Object.entries(t).forEach(([e, t]) => {
          n[e] = t;
        });
      }
      function j(e) {
        return e._x_dataStack
          ? e._x_dataStack
          : "function" == typeof ShadowRoot && e instanceof ShadowRoot
          ? j(e.host)
          : e.parentNode
          ? j(e.parentNode)
          : [];
      }
      function B(e) {
        let t = new Proxy(
          {},
          {
            ownKeys: () =>
              Array.from(new Set(e.flatMap((e) => Object.keys(e)))),
            has: (t, n) => e.some((e) => e.hasOwnProperty(n)),
            get: (n, i) =>
              (e.find((e) => {
                if (e.hasOwnProperty(i)) {
                  let n = Object.getOwnPropertyDescriptor(e, i);
                  if (
                    (n.get && n.get._x_alreadyBound) ||
                    (n.set && n.set._x_alreadyBound)
                  )
                    return !0;
                  if ((n.get || n.set) && n.enumerable) {
                    let s = n.get,
                      r = n.set,
                      a = n;
                    (s = s && s.bind(t)),
                      (r = r && r.bind(t)),
                      s && (s._x_alreadyBound = !0),
                      r && (r._x_alreadyBound = !0),
                      Object.defineProperty(e, i, { ...a, get: s, set: r });
                  }
                  return !0;
                }
                return !1;
              }) || {})[i],
            set: (t, n, i) => {
              let s = e.find((e) => e.hasOwnProperty(n));
              return s ? (s[n] = i) : (e[e.length - 1][n] = i), !0;
            },
          }
        );
        return t;
      }
      function V(e, t = () => {}) {
        let n = {
          initialValue: void 0,
          _x_interceptor: !0,
          initialize(t, n, i) {
            return e(
              this.initialValue,
              () =>
                (function (e, t) {
                  return n.split(".").reduce((e, t) => e[t], e);
                })(t),
              (e) =>
                (function e(t, n, i) {
                  if (
                    ("string" == typeof n && (n = n.split(".")), 1 !== n.length)
                  ) {
                    if (0 === n.length) throw error;
                    return t[n[0]] || (t[n[0]] = {}), e(t[n[0]], n.slice(1), i);
                  }
                  t[n[0]] = i;
                })(t, n, e),
              n,
              i
            );
          },
        };
        return (
          t(n),
          (e) => {
            if ("object" == typeof e && null !== e && e._x_interceptor) {
              let t = n.initialize.bind(n);
              n.initialize = (i, s, r) => {
                let a = e.initialize(i, s, r);
                return (n.initialValue = a), t(i, s, r);
              };
            } else n.initialValue = e;
            return n;
          }
        );
      }
      var F = {};
      function G(e, t) {
        F[e] = t;
      }
      function H(e, t) {
        return (
          Object.entries(F).forEach(([n, i]) => {
            Object.defineProperty(e, "$" + n, {
              get: () => i(t, { Alpine: Ve, interceptor: V }),
              enumerable: !1,
            });
          }),
          e
        );
      }
      function W(e, t, n = {}) {
        let i;
        return q(e, t)((e) => (i = e), n), i;
      }
      function q(...e) {
        return Y(...e);
      }
      var Y = U;
      function U(e, t) {
        let n = {};
        H(n, e);
        let i = [n, ...j(e)];
        if ("function" == typeof t)
          return (function (e, t) {
            return (n = () => {}, { scope: i = {}, params: s = [] } = {}) => {
              K(n, t.apply(B([i, ...e]), s));
            };
          })(i, t);
        let s = (function (e, t) {
          let n = (function (e) {
            if (X[e]) return X[e];
            let t = new (0,
            Object.getPrototypeOf(async function () {}).constructor)(
              ["__self", "scope"],
              `with (scope) { __self.result = ${
                /^[\n\s]*if.*\(.*\)/.test(e) || /^(let|const)/.test(e)
                  ? `(() => { ${e} })()`
                  : e
              } }; __self.finished = true; return __self.result;`
            );
            return (X[e] = t), t;
          })(t);
          return (t = () => {}, { scope: i = {}, params: s = [] } = {}) => {
            (n.result = void 0), (n.finished = !1);
            let r = B([i, ...e]),
              a = n(n, r);
            n.finished
              ? K(t, n.result, r, s)
              : a.then((e) => {
                  K(t, e, r, s);
                });
          };
        })(i, t);
        return function (e, t, n, ...i) {
          try {
            return n(...i);
          } catch (n) {
            throw (
              (console.warn(
                `Alpine Expression Error: ${n.message}\n\nExpression: "${t}"\n\n`,
                e
              ),
              n)
            );
          }
        }.bind(null, e, t, s);
      }
      var X = {};
      function K(e, t, n, i) {
        if ("function" == typeof t) {
          let s = t.apply(n, i);
          s instanceof Promise ? s.then((t) => K(e, t, n, i)) : e(s);
        } else e(t);
      }
      var J = "x-";
      function Z(e = "") {
        return J + e;
      }
      var Q = {};
      function ee(e, t) {
        Q[e] = t;
      }
      function te(e, t, n) {
        let i = {};
        return Array.from(t)
          .map(ae((e, t) => (i[e] = t)))
          .filter(ce)
          .map(
            (function (e, t) {
              return ({ name: n, value: i }) => {
                let s = n.match(de()),
                  r = n.match(/:([a-zA-Z0-9\-:]+)/),
                  a = n.match(/\.[^.\]]+(?=[^\]]*$)/g) || [],
                  o = t || e[n] || n;
                return {
                  type: s ? s[1] : null,
                  value: r ? r[1] : null,
                  modifiers: a.map((e) => e.replace(".", "")),
                  expression: i,
                  original: o,
                };
              };
            })(i, n)
          )
          .sort(pe)
          .map((t) =>
            (function (e, t) {
              let n = Q[t.type] || (() => {}),
                i = [],
                [a, o] = (function (e) {
                  let t = () => {};
                  return [
                    (n) => {
                      let i = s(n);
                      e._x_effects ||
                        ((e._x_effects = new Set()),
                        (e._x_runEffects = () => {
                          e._x_effects.forEach((e) => e());
                        })),
                        e._x_effects.add(i),
                        (t = () => {
                          void 0 !== i && (e._x_effects.delete(i), r(i));
                        });
                    },
                    () => {
                      t();
                    },
                  ];
                })(e);
              i.push(o);
              let l = {
                  Alpine: Ve,
                  effect: a,
                  cleanup: (e) => i.push(e),
                  evaluateLater: q.bind(q, e),
                  evaluate: W.bind(W, e),
                },
                c = () => i.forEach((e) => e());
              !(function (e, t, n) {
                e._x_attributeCleanups || (e._x_attributeCleanups = {}),
                  e._x_attributeCleanups[t] || (e._x_attributeCleanups[t] = []),
                  e._x_attributeCleanups[t].push(n);
              })(e, t.original, c);
              let d = () => {
                e._x_ignore ||
                  e._x_ignoreSelf ||
                  (n.inline && n.inline(e, t, l),
                  (n = n.bind(n, e, t, l)),
                  ne ? ie.get(se).push(n) : n());
              };
              return (d.runCleanups = c), d;
            })(e, t)
          );
      }
      var ne = !1,
        ie = new Map(),
        se = Symbol(),
        re =
          (e, t) =>
          ({ name: n, value: i }) => (
            n.startsWith(e) && (n = n.replace(e, t)), { name: n, value: i }
          );
      function ae(e = () => {}) {
        return ({ name: t, value: n }) => {
          let { name: i, value: s } = oe.reduce((e, t) => t(e), {
            name: t,
            value: n,
          });
          return i !== t && e(i, t), { name: i, value: s };
        };
      }
      var oe = [];
      function le(e) {
        oe.push(e);
      }
      function ce({ name: e }) {
        return de().test(e);
      }
      var de = () => new RegExp(`^${J}([^:^.]+)\\b`),
        ue = [
          "ignore",
          "ref",
          "data",
          "bind",
          "init",
          "for",
          "model",
          "transition",
          "show",
          "if",
          "DEFAULT",
          "element",
        ];
      function pe(e, t) {
        let n = -1 === ue.indexOf(e.type) ? "DEFAULT" : e.type,
          i = -1 === ue.indexOf(t.type) ? "DEFAULT" : t.type;
        return ue.indexOf(n) - ue.indexOf(i);
      }
      function fe(e, t, n = {}) {
        e.dispatchEvent(
          new CustomEvent(t, {
            detail: n,
            bubbles: !0,
            composed: !0,
            cancelable: !0,
          })
        );
      }
      var he = [],
        me = !1;
      function ge(e) {
        he.push(e),
          queueMicrotask(() => {
            me ||
              setTimeout(() => {
                ve();
              });
          });
      }
      function ve() {
        for (me = !1; he.length; ) he.shift()();
      }
      function be(e, t) {
        if ("function" == typeof ShadowRoot && e instanceof ShadowRoot)
          return void Array.from(e.children).forEach((e) => be(e, t));
        let n = !1;
        if ((t(e, () => (n = !0)), n)) return;
        let i = e.firstElementChild;
        for (; i; ) be(i, t), (i = i.nextElementSibling);
      }
      function we(e, ...t) {
        console.warn("Alpine Warning: " + e, ...t);
      }
      var ye = [],
        xe = [];
      function _e() {
        return ye.map((e) => e());
      }
      function Ee() {
        return ye.concat(xe).map((e) => e());
      }
      function Te(e) {
        ye.push(e);
      }
      function Ce(e, t = !1) {
        if (e)
          return (t ? Ee() : _e()).some((t) => e.matches(t))
            ? e
            : e.parentElement
            ? Ce(e.parentElement, t)
            : void 0;
      }
      function Se(e, t = be) {
        !(function (e) {
          ne = !0;
          let t = Symbol();
          (se = t), ie.set(t, []);
          let n = () => {
            for (; ie.get(t).length; ) ie.get(t).shift()();
            ie.delete(t);
          };
          e(), (ne = !1), n();
        })(() => {
          t(e, (e, t) => {
            te(e, e.attributes).forEach((e) => e()), e._x_ignore && t();
          });
        });
      }
      function ke(e, t) {
        return Array.isArray(t)
          ? Me(e, t.join(" "))
          : "object" == typeof t && null !== t
          ? (function (e, t) {
              let n = (e) => e.split(" ").filter(Boolean),
                i = Object.entries(t)
                  .flatMap(([e, t]) => !!t && n(e))
                  .filter(Boolean),
                s = Object.entries(t)
                  .flatMap(([e, t]) => !t && n(e))
                  .filter(Boolean),
                r = [],
                a = [];
              return (
                s.forEach((t) => {
                  e.classList.contains(t) && (e.classList.remove(t), a.push(t));
                }),
                i.forEach((t) => {
                  e.classList.contains(t) || (e.classList.add(t), r.push(t));
                }),
                () => {
                  a.forEach((t) => e.classList.add(t)),
                    r.forEach((t) => e.classList.remove(t));
                }
              );
            })(e, t)
          : "function" == typeof t
          ? ke(e, t())
          : Me(e, t);
      }
      function Me(e, t) {
        return (
          (t = !0 === t ? (t = "") : t || ""),
          (n = t
            .split(" ")
            .filter((t) => !e.classList.contains(t))
            .filter(Boolean)),
          e.classList.add(...n),
          () => {
            e.classList.remove(...n);
          }
        );
        var n;
      }
      function Oe(e, t) {
        return "object" == typeof t && null !== t
          ? (function (e, t) {
              let n = {};
              return (
                Object.entries(t).forEach(([t, i]) => {
                  (n[t] = e.style[t]),
                    e.style.setProperty(
                      t.replace(/([a-z])([A-Z])/g, "$1-$2").toLowerCase(),
                      i
                    );
                }),
                setTimeout(() => {
                  0 === e.style.length && e.removeAttribute("style");
                }),
                () => {
                  Oe(e, n);
                }
              );
            })(e, t)
          : (function (e, t) {
              let n = e.getAttribute("style", t);
              return (
                e.setAttribute("style", t),
                () => {
                  e.setAttribute("style", n);
                }
              );
            })(e, t);
      }
      function Ae(e, t = () => {}) {
        let n = !1;
        return function () {
          n ? t.apply(this, arguments) : ((n = !0), e.apply(this, arguments));
        };
      }
      function Le(e, t, n = {}) {
        e._x_transition ||
          (e._x_transition = {
            enter: { during: n, start: n, end: n },
            leave: { during: n, start: n, end: n },
            in(n = () => {}, i = () => {}) {
              Pe(
                e,
                t,
                {
                  during: this.enter.during,
                  start: this.enter.start,
                  end: this.enter.end,
                },
                n,
                i
              );
            },
            out(n = () => {}, i = () => {}) {
              Pe(
                e,
                t,
                {
                  during: this.leave.during,
                  start: this.leave.start,
                  end: this.leave.end,
                },
                n,
                i
              );
            },
          });
      }
      function Pe(
        e,
        t,
        { during: n, start: i, end: s } = {},
        r = () => {},
        a = () => {}
      ) {
        if (
          (e._x_transitioning && e._x_transitioning.cancel(),
          0 === Object.keys(n).length &&
            0 === Object.keys(i).length &&
            0 === Object.keys(s).length)
        )
          return r(), void a();
        let o, l, c;
        !(function (e, t) {
          let n,
            i,
            s,
            r = Ae(() => {
              I(() => {
                (n = !0),
                  i || t.before(),
                  s || (t.end(), ve()),
                  t.after(),
                  e.isConnected && t.cleanup(),
                  delete e._x_transitioning;
              });
            });
          (e._x_transitioning = {
            beforeCancels: [],
            beforeCancel(e) {
              this.beforeCancels.push(e);
            },
            cancel: Ae(function () {
              for (; this.beforeCancels.length; ) this.beforeCancels.shift()();
              r();
            }),
            finish: r,
          }),
            I(() => {
              t.start(), t.during();
            }),
            (me = !0),
            requestAnimationFrame(() => {
              if (n) return;
              let r =
                  1e3 *
                  Number(
                    getComputedStyle(e)
                      .transitionDuration.replace(/,.*/, "")
                      .replace("s", "")
                  ),
                a =
                  1e3 *
                  Number(
                    getComputedStyle(e)
                      .transitionDelay.replace(/,.*/, "")
                      .replace("s", "")
                  );
              0 === r &&
                (r =
                  1e3 *
                  Number(
                    getComputedStyle(e).animationDuration.replace("s", "")
                  )),
                I(() => {
                  t.before();
                }),
                (i = !0),
                requestAnimationFrame(() => {
                  n ||
                    (I(() => {
                      t.end();
                    }),
                    ve(),
                    setTimeout(e._x_transitioning.finish, r + a),
                    (s = !0));
                });
            });
        })(e, {
          start() {
            o = t(e, i);
          },
          during() {
            l = t(e, n);
          },
          before: r,
          end() {
            o(), (c = t(e, s));
          },
          after: a,
          cleanup() {
            l(), c();
          },
        });
      }
      function Ie(e, t, n) {
        if (-1 === e.indexOf(t)) return n;
        const i = e[e.indexOf(t) + 1];
        if (!i) return n;
        if ("scale" === t && isNaN(i)) return n;
        if ("duration" === t) {
          let e = i.match(/([0-9]+)ms/);
          if (e) return e[1];
        }
        return "origin" === t &&
          ["top", "right", "left", "center", "bottom"].includes(
            e[e.indexOf(t) + 2]
          )
          ? [i, e[e.indexOf(t) + 2]].join(" ")
          : i;
      }
      function $e(e, t) {
        var n;
        return function () {
          var i = this,
            s = arguments;
          clearTimeout(n),
            (n = setTimeout(function () {
              (n = null), e.apply(i, s);
            }, t));
        };
      }
      function ze(e, t) {
        let n;
        return function () {
          let i = arguments;
          n || (e.apply(this, i), (n = !0), setTimeout(() => (n = !1), t));
        };
      }
      ee(
        "transition",
        (e, { value: t, modifiers: n, expression: i }, { evaluate: s }) => {
          "function" == typeof i && (i = s(i)),
            i
              ? (function (e, t, n) {
                  Le(e, ke, ""),
                    {
                      enter: (t) => {
                        e._x_transition.enter.during = t;
                      },
                      "enter-start": (t) => {
                        e._x_transition.enter.start = t;
                      },
                      "enter-end": (t) => {
                        e._x_transition.enter.end = t;
                      },
                      leave: (t) => {
                        e._x_transition.leave.during = t;
                      },
                      "leave-start": (t) => {
                        e._x_transition.leave.start = t;
                      },
                      "leave-end": (t) => {
                        e._x_transition.leave.end = t;
                      },
                    }[n](t);
                })(e, i, t)
              : (function (e, t, n) {
                  Le(e, Oe);
                  let i = !t.includes("in") && !t.includes("out") && !n,
                    s = i || t.includes("in") || ["enter"].includes(n),
                    r = i || t.includes("out") || ["leave"].includes(n);
                  t.includes("in") &&
                    !i &&
                    (t = t.filter((e, n) => n < t.indexOf("out"))),
                    t.includes("out") &&
                      !i &&
                      (t = t.filter((e, n) => n > t.indexOf("out")));
                  let a = !t.includes("opacity") && !t.includes("scale"),
                    o = a || t.includes("opacity") ? 0 : 1,
                    l = a || t.includes("scale") ? Ie(t, "scale", 95) / 100 : 1,
                    c = Ie(t, "delay", 0),
                    d = Ie(t, "origin", "center"),
                    u = Ie(t, "duration", 150) / 1e3,
                    p = Ie(t, "duration", 75) / 1e3,
                    f = "cubic-bezier(0.4, 0.0, 0.2, 1)";
                  s &&
                    ((e._x_transition.enter.during = {
                      transformOrigin: d,
                      transitionDelay: c,
                      transitionProperty: "opacity, transform",
                      transitionDuration: u + "s",
                      transitionTimingFunction: f,
                    }),
                    (e._x_transition.enter.start = {
                      opacity: o,
                      transform: `scale(${l})`,
                    }),
                    (e._x_transition.enter.end = {
                      opacity: 1,
                      transform: "scale(1)",
                    })),
                    r &&
                      ((e._x_transition.leave.during = {
                        transformOrigin: d,
                        transitionDelay: c,
                        transitionProperty: "opacity, transform",
                        transitionDuration: p + "s",
                        transitionTimingFunction: f,
                      }),
                      (e._x_transition.leave.start = {
                        opacity: 1,
                        transform: "scale(1)",
                      }),
                      (e._x_transition.leave.end = {
                        opacity: o,
                        transform: `scale(${l})`,
                      }));
                })(e, n, t);
        }
      ),
        (window.Element.prototype._x_toggleAndCascadeWithTransitions =
          function (e, t, n, i) {
            t
              ? e._x_transition
                ? e._x_transition.in(n)
                : "visible" === document.visibilityState
                ? requestAnimationFrame(n)
                : setTimeout(n)
              : ((e._x_hidePromise = e._x_transition
                  ? new Promise((t, n) => {
                      e._x_transition.out(
                        () => {},
                        () => t(i)
                      ),
                        e._x_transitioning.beforeCancel(() =>
                          n({ isFromCancelledTransition: !0 })
                        );
                    })
                  : Promise.resolve(i)),
                queueMicrotask(() => {
                  let t = (function e(t) {
                    let n = t.parentNode;
                    if (n) return n._x_hidePromise ? n : e(n);
                  })(e);
                  t
                    ? (t._x_hideChildren || (t._x_hideChildren = []),
                      t._x_hideChildren.push(e))
                    : queueMicrotask(() => {
                        let t = (e) => {
                          let n = Promise.all([
                            e._x_hidePromise,
                            ...(e._x_hideChildren || []).map(t),
                          ]).then(([e]) => e());
                          return (
                            delete e._x_hidePromise, delete e._x_hideChildren, n
                          );
                        };
                        t(e).catch((e) => {
                          if (!e.isFromCancelledTransition) throw e;
                        });
                      });
                }));
          });
      var Ne = {},
        Re = !1,
        De = !1;
      function je(e) {
        return (...t) => De || e(...t);
      }
      var Be = {},
        Ve = {
          get reactive() {
            return i;
          },
          get release() {
            return r;
          },
          get effect() {
            return s;
          },
          get raw() {
            return a;
          },
          version: "3.4.2",
          flushAndStopDeferringMutations: function () {
            ($ = !1), N(z), (z = []);
          },
          disableEffectScheduling: function (e) {
            (_ = !1), e(), (_ = !0);
          },
          setReactivityEngine: function (e) {
            (i = e.reactive),
              (r = e.release),
              (s = (t) =>
                e.effect(t, {
                  scheduler: (e) => {
                    _
                      ? (function (e) {
                          !(function (e) {
                            y.includes(e) || y.push(e),
                              w || b || ((b = !0), queueMicrotask(x));
                          })(e);
                        })(e)
                      : e();
                  },
                })),
              (a = e.raw);
          },
          addRootSelector: Te,
          deferMutations: function () {
            $ = !0;
          },
          mapAttributes: le,
          evaluateLater: q,
          setEvaluator: function (e) {
            Y = e;
          },
          closestRoot: Ce,
          interceptor: V,
          transition: Pe,
          setStyles: Oe,
          mutateDom: I,
          directive: ee,
          throttle: ze,
          debounce: $e,
          evaluate: W,
          initTree: Se,
          nextTick: ge,
          prefix: function (e) {
            J = e;
          },
          plugin: function (e) {
            e(Ve);
          },
          magic: G,
          store: function (e, t) {
            if ((Re || ((Ne = i(Ne)), (Re = !0)), void 0 === t)) return Ne[e];
            (Ne[e] = t),
              "object" == typeof t &&
                null !== t &&
                t.hasOwnProperty("init") &&
                "function" == typeof t.init &&
                Ne[e].init();
          },
          start: function () {
            var e;
            document.body ||
              we(
                "Unable to initialize. Trying to load Alpine before `<body>` is available. Did you forget to add `defer` in Alpine's `<script>` tag?"
              ),
              fe(document, "alpine:init"),
              fe(document, "alpine:initializing"),
              A(),
              (e = (e) => Se(e, be)),
              S.push(e),
              C.push((e) =>
                ge(() => {
                  be(e, (e) => k(e));
                })
              ),
              T.push((e, t) => {
                te(e, t).forEach((e) => e());
              }),
              Array.from(document.querySelectorAll(Ee()))
                .filter((e) => !Ce(e.parentElement, !0))
                .forEach((e) => {
                  Se(e);
                }),
              fe(document, "alpine:initialized");
          },
          clone: function (e, t) {
            (t._x_dataStack = e._x_dataStack),
              (De = !0),
              (function (e) {
                let t = s;
                E((e, n) => {
                  let i = t(e);
                  return r(i), () => {};
                }),
                  e(),
                  E(t);
              })(() => {
                !(function (e) {
                  let t = !1;
                  Se(e, (e, n) => {
                    be(e, (e, i) => {
                      if (
                        t &&
                        (function (e) {
                          return _e().some((t) => e.matches(t));
                        })(e)
                      )
                        return i();
                      (t = !0), n(e, i);
                    });
                  });
                })(t);
              }),
              (De = !1);
          },
          data: function (e, t) {
            Be[e] = t;
          },
        },
        Fe = ((e) => {
          return ((e, t, n) => {
            if ((t && "object" == typeof t) || "function" == typeof t)
              for (let i of u(t))
                d.call(e, i) ||
                  "default" === i ||
                  l(e, i, {
                    get: () => t[i],
                    enumerable: !(n = p(t, i)) || n.enumerable,
                  });
            return e;
          })(
            ((t = l(
              null != e ? o(c(e)) : {},
              "default",
              e && e.__esModule && "default" in e
                ? { get: () => e.default, enumerable: !0 }
                : { value: e, enumerable: !0 }
            )),
            l(t, "__esModule", { value: !0 })),
            e
          );
          var t;
        })(v());
      G("nextTick", () => ge),
        G("dispatch", (e) => fe.bind(fe, e)),
        G("watch", (e) => (t, n) => {
          let i,
            r = q(e, t),
            a = !0;
          s(() =>
            r((e) => {
              (document.createElement("div").dataset.throwAway = e),
                a
                  ? (i = e)
                  : queueMicrotask(() => {
                      n(e, i), (i = e);
                    }),
                (a = !1);
            })
          );
        }),
        G("store", function () {
          return Ne;
        }),
        G("root", (e) => Ce(e)),
        G(
          "refs",
          (e) => (
            e._x_refs_proxy ||
              (e._x_refs_proxy = B(
                (function (e) {
                  let t = [],
                    n = e;
                  for (; n; )
                    n._x_refs && t.push(n._x_refs), (n = n.parentNode);
                  return t;
                })(e)
              )),
            e._x_refs_proxy
          )
        ),
        G("el", (e) => e);
      var Ge,
        He = () => {};
      function We(e, t, n, s = []) {
        switch (
          (e._x_bindings || (e._x_bindings = i({})),
          (e._x_bindings[t] = n),
          (t = s.includes("camel")
            ? t.toLowerCase().replace(/-(\w)/g, (e, t) => t.toUpperCase())
            : t))
        ) {
          case "value":
            !(function (e, t) {
              if ("radio" === e.type)
                void 0 === e.attributes.value && (e.value = t),
                  window.fromModel && (e.checked = qe(e.value, t));
              else if ("checkbox" === e.type)
                Number.isInteger(t)
                  ? (e.value = t)
                  : Number.isInteger(t) ||
                    Array.isArray(t) ||
                    "boolean" == typeof t ||
                    [null, void 0].includes(t)
                  ? Array.isArray(t)
                    ? (e.checked = t.some((t) => qe(t, e.value)))
                    : (e.checked = !!t)
                  : (e.value = String(t));
              else if ("SELECT" === e.tagName)
                !(function (e, t) {
                  const n = [].concat(t).map((e) => e + "");
                  Array.from(e.options).forEach((e) => {
                    e.selected = n.includes(e.value);
                  });
                })(e, t);
              else {
                if (e.value === t) return;
                e.value = t;
              }
            })(e, n);
            break;
          case "style":
            !(function (e, t) {
              e._x_undoAddedStyles && e._x_undoAddedStyles(),
                (e._x_undoAddedStyles = Oe(e, t));
            })(e, n);
            break;
          case "class":
            !(function (e, t) {
              e._x_undoAddedClasses && e._x_undoAddedClasses(),
                (e._x_undoAddedClasses = ke(e, t));
            })(e, n);
            break;
          default:
            !(function (e, t, n) {
              [null, void 0, !1].includes(n) &&
              !["aria-pressed", "aria-checked", "aria-expanded"].includes(t)
                ? e.removeAttribute(t)
                : ([
                    "disabled",
                    "checked",
                    "required",
                    "readonly",
                    "hidden",
                    "open",
                    "selected",
                    "autofocus",
                    "itemscope",
                    "multiple",
                    "novalidate",
                    "allowfullscreen",
                    "allowpaymentrequest",
                    "formnovalidate",
                    "autoplay",
                    "controls",
                    "loop",
                    "muted",
                    "playsinline",
                    "default",
                    "ismap",
                    "reversed",
                    "async",
                    "defer",
                    "nomodule",
                  ].includes(t) && (n = t),
                  (function (e, t, n) {
                    e.getAttribute(t) != n && e.setAttribute(t, n);
                  })(e, t, n));
            })(e, t, n);
        }
      }
      function qe(e, t) {
        return e == t;
      }
      function Ye(e, t, n, i) {
        let s = e,
          r = (e) => i(e),
          a = {},
          o = (e, t) => (n) => t(e, n);
        if (
          (n.includes("dot") && (t = t.replace(/-/g, ".")),
          n.includes("camel") &&
            (t = t.toLowerCase().replace(/-(\w)/g, (e, t) => t.toUpperCase())),
          n.includes("passive") && (a.passive = !0),
          n.includes("capture") && (a.capture = !0),
          n.includes("window") && (s = window),
          n.includes("document") && (s = document),
          n.includes("prevent") &&
            (r = o(r, (e, t) => {
              t.preventDefault(), e(t);
            })),
          n.includes("stop") &&
            (r = o(r, (e, t) => {
              t.stopPropagation(), e(t);
            })),
          n.includes("self") &&
            (r = o(r, (t, n) => {
              n.target === e && t(n);
            })),
          (n.includes("away") || n.includes("outside")) &&
            ((s = document),
            (r = o(r, (t, n) => {
              e.contains(n.target) ||
                (e.offsetWidth < 1 && e.offsetHeight < 1) ||
                t(n);
            }))),
          (r = o(r, (e, i) => {
            ((function (e) {
              return ["keydown", "keyup"].includes(t);
            })() &&
              (function (e, t) {
                let n = t.filter(
                  (e) =>
                    !["window", "document", "prevent", "stop", "once"].includes(
                      e
                    )
                );
                if (n.includes("debounce")) {
                  let e = n.indexOf("debounce");
                  n.splice(
                    e,
                    Ue((n[e + 1] || "invalid-wait").split("ms")[0]) ? 2 : 1
                  );
                }
                if (0 === n.length) return !1;
                if (1 === n.length && Xe(e.key).includes(n[0])) return !1;
                const i = [
                  "ctrl",
                  "shift",
                  "alt",
                  "meta",
                  "cmd",
                  "super",
                ].filter((e) => n.includes(e));
                return (
                  (n = n.filter((e) => !i.includes(e))),
                  !(
                    i.length > 0 &&
                    i.filter(
                      (t) => (
                        ("cmd" !== t && "super" !== t) || (t = "meta"),
                        e[t + "Key"]
                      )
                    ).length === i.length &&
                    Xe(e.key).includes(n[0])
                  )
                );
              })(i, n)) ||
              e(i);
          })),
          n.includes("debounce"))
        ) {
          let e = n[n.indexOf("debounce") + 1] || "invalid-wait",
            t = Ue(e.split("ms")[0]) ? Number(e.split("ms")[0]) : 250;
          r = $e(r, t);
        }
        if (n.includes("throttle")) {
          let e = n[n.indexOf("throttle") + 1] || "invalid-wait",
            t = Ue(e.split("ms")[0]) ? Number(e.split("ms")[0]) : 250;
          r = ze(r, t);
        }
        return (
          n.includes("once") &&
            (r = o(r, (e, n) => {
              e(n), s.removeEventListener(t, r, a);
            })),
          s.addEventListener(t, r, a),
          () => {
            s.removeEventListener(t, r, a);
          }
        );
      }
      function Ue(e) {
        return !Array.isArray(e) && !isNaN(e);
      }
      function Xe(e) {
        if (!e) return [];
        e = e
          .replace(/([a-z])([A-Z])/g, "$1-$2")
          .replace(/[_\s]/, "-")
          .toLowerCase();
        let t = {
          ctrl: "control",
          slash: "/",
          space: "-",
          spacebar: "-",
          cmd: "meta",
          esc: "escape",
          up: "arrow-up",
          down: "arrow-down",
          left: "arrow-left",
          right: "arrow-right",
          period: ".",
          equal: "=",
        };
        return (
          (t[e] = e),
          Object.keys(t)
            .map((n) => {
              if (t[n] === e) return n;
            })
            .filter((e) => e)
        );
      }
      function Ke(e) {
        let t = e ? parseFloat(e) : null;
        return (n = t), Array.isArray(n) || isNaN(n) ? e : t;
        var n;
      }
      function Je(e, t, n, i) {
        let s = {};
        return (
          /^\[.*\]$/.test(e.item) && Array.isArray(t)
            ? e.item
                .replace("[", "")
                .replace("]", "")
                .split(",")
                .map((e) => e.trim())
                .forEach((e, n) => {
                  s[e] = t[n];
                })
            : /^\{.*\}$/.test(e.item) &&
              !Array.isArray(t) &&
              "object" == typeof t
            ? e.item
                .replace("{", "")
                .replace("}", "")
                .split(",")
                .map((e) => e.trim())
                .forEach((e) => {
                  s[e] = t[e];
                })
            : (s[e.item] = t),
          e.index && (s[e.index] = n),
          e.collection && (s[e.collection] = i),
          s
        );
      }
      function Ze() {}
      (He.inline = (e, { modifiers: t }, { cleanup: n }) => {
        t.includes("self") ? (e._x_ignoreSelf = !0) : (e._x_ignore = !0),
          n(() => {
            t.includes("self") ? delete e._x_ignoreSelf : delete e._x_ignore;
          });
      }),
        ee("ignore", He),
        ee("effect", (e, { expression: t }, { effect: n }) => n(q(e, t))),
        ee(
          "model",
          (e, { modifiers: t, expression: n }, { effect: i, cleanup: s }) => {
            let r = q(e, n),
              a = q(e, `${n} = rightSideOfExpression($event, ${n})`);
            var o =
              "select" === e.tagName.toLowerCase() ||
              ["checkbox", "radio"].includes(e.type) ||
              t.includes("lazy")
                ? "change"
                : "input";
            let l = (function (e, t, n) {
                return (
                  "radio" === e.type &&
                    I(() => {
                      e.hasAttribute("name") || e.setAttribute("name", n);
                    }),
                  (n, i) =>
                    I(() => {
                      if (n instanceof CustomEvent && void 0 !== n.detail)
                        return n.detail || n.target.value;
                      if ("checkbox" === e.type) {
                        if (Array.isArray(i)) {
                          let e = t.includes("number")
                            ? Ke(n.target.value)
                            : n.target.value;
                          return n.target.checked
                            ? i.concat([e])
                            : i.filter((t) => !(t == e));
                        }
                        return n.target.checked;
                      }
                      if ("select" === e.tagName.toLowerCase() && e.multiple)
                        return t.includes("number")
                          ? Array.from(n.target.selectedOptions).map((e) =>
                              Ke(e.value || e.text)
                            )
                          : Array.from(n.target.selectedOptions).map(
                              (e) => e.value || e.text
                            );
                      {
                        let e = n.target.value;
                        return t.includes("number")
                          ? Ke(e)
                          : t.includes("trim")
                          ? e.trim()
                          : e;
                      }
                    })
                );
              })(e, t, n),
              c = Ye(e, o, t, (e) => {
                a(() => {}, { scope: { $event: e, rightSideOfExpression: l } });
              });
            s(() => c()),
              (e._x_forceModelUpdate = () => {
                r((t) => {
                  void 0 === t && n.match(/\./) && (t = ""),
                    (window.fromModel = !0),
                    I(() => We(e, "value", t)),
                    delete window.fromModel;
                });
              }),
              i(() => {
                (t.includes("unintrusive") &&
                  document.activeElement.isSameNode(e)) ||
                  e._x_forceModelUpdate();
              });
          }
        ),
        ee("cloak", (e) =>
          queueMicrotask(() => I(() => e.removeAttribute(Z("cloak"))))
        ),
        (Ge = () => `[${Z("init")}]`),
        xe.push(Ge),
        ee(
          "init",
          je((e, { expression: t }) =>
            "string" == typeof t ? !!t.trim() && W(e, t, {}) : W(e, t, {})
          )
        ),
        ee("text", (e, { expression: t }, { effect: n, evaluateLater: i }) => {
          let s = i(t);
          n(() => {
            s((t) => {
              I(() => {
                e.textContent = t;
              });
            });
          });
        }),
        ee("html", (e, { expression: t }, { effect: n, evaluateLater: i }) => {
          let s = i(t);
          n(() => {
            s((t) => {
              e.innerHTML = t;
            });
          });
        }),
        le(re(":", Z("bind:"))),
        ee(
          "bind",
          (
            e,
            { value: t, modifiers: n, expression: i, original: s },
            { effect: r }
          ) => {
            if (!t)
              return (function (e, t, n, i) {
                let s = q(e, t),
                  r = [];
                i(() => {
                  for (; r.length; ) r.pop()();
                  s((t) => {
                    let i = Object.entries(t).map(([e, t]) => ({
                      name: e,
                      value: t,
                    }));
                    (function (e) {
                      return Array.from(e)
                        .map(ae())
                        .filter((e) => !ce(e));
                    })(i).forEach(({ name: e, value: t }, n) => {
                      i[n] = { name: "x-bind:" + e, value: `"${t}"` };
                    }),
                      te(e, i, n).map((e) => {
                        r.push(e.runCleanups), e();
                      });
                  });
                });
              })(e, i, s, r);
            if ("key" === t)
              return (function (e, t) {
                e._x_keyExpression = t;
              })(e, i);
            let a = q(e, i);
            r(() =>
              a((s) => {
                void 0 === s && i.match(/\./) && (s = ""),
                  I(() => We(e, t, s, n));
              })
            );
          }
        ),
        Te(() => `[${Z("data")}]`),
        ee(
          "data",
          je((e, { expression: t }, { cleanup: n }) => {
            t = "" === t ? "{}" : t;
            let s = {};
            H(s, e);
            let r = {};
            var a, o;
            (a = r),
              (o = s),
              Object.entries(Be).forEach(([e, t]) => {
                Object.defineProperty(a, e, {
                  get:
                    () =>
                    (...e) =>
                      t.bind(o)(...e),
                  enumerable: !1,
                });
              });
            let l = W(e, t, { scope: r });
            H(l, e);
            let c = i(l);
            !(function (e) {
              let t = (n, i = "") => {
                Object.entries(n).forEach(([s, r]) => {
                  let a = "" === i ? s : `${i}.${s}`;
                  var o;
                  "object" == typeof r && null !== r && r._x_interceptor
                    ? (n[s] = r.initialize(e, a, s))
                    : "object" != typeof (o = r) ||
                      Array.isArray(o) ||
                      null === o ||
                      r === n ||
                      r instanceof Element ||
                      t(r, a);
                });
              };
              t(e);
            })(c);
            let d = R(e, c);
            c.init && W(e, c.init),
              n(() => {
                d(), c.destroy && W(e, c.destroy);
              });
          })
        ),
        ee("show", (e, { modifiers: t, expression: n }, { effect: i }) => {
          let s,
            r = q(e, n),
            a = () =>
              I(() => {
                (e.style.display = "none"), (e._x_isShown = !1);
              }),
            o = () =>
              I(() => {
                1 === e.style.length && "none" === e.style.display
                  ? e.removeAttribute("style")
                  : e.style.removeProperty("display"),
                  (e._x_isShown = !0);
              }),
            l = () => setTimeout(o),
            c = Ae(
              (e) => (e ? o() : a()),
              (t) => {
                "function" == typeof e._x_toggleAndCascadeWithTransitions
                  ? e._x_toggleAndCascadeWithTransitions(e, t, o, a)
                  : t
                  ? l()
                  : a();
              }
            ),
            d = !0;
          i(() =>
            r((e) => {
              (d || e !== s) &&
                (t.includes("immediate") && (e ? l() : a()),
                c(e),
                (s = e),
                (d = !1));
            })
          );
        }),
        ee("for", (e, { expression: t }, { effect: n, cleanup: s }) => {
          let r = (function (e) {
              let t = /,([^,\}\]]*)(?:,([^,\}\]]*))?$/,
                n = e.match(/([\s\S]*?)\s+(?:in|of)\s+([\s\S]*)/);
              if (!n) return;
              let i = {};
              i.items = n[2].trim();
              let s = n[1].replace(/^\s*\(|\)\s*$/g, "").trim(),
                r = s.match(t);
              return (
                r
                  ? ((i.item = s.replace(t, "").trim()),
                    (i.index = r[1].trim()),
                    r[2] && (i.collection = r[2].trim()))
                  : (i.item = s),
                i
              );
            })(t),
            a = q(e, r.items),
            o = q(e, e._x_keyExpression || "index");
          (e._x_prevKeys = []),
            (e._x_lookup = {}),
            n(() =>
              (function (e, t, n, s) {
                let r = e;
                a((n) => {
                  var a;
                  (a = n),
                    !Array.isArray(a) &&
                      !isNaN(a) &&
                      n >= 0 &&
                      (n = Array.from(Array(n).keys(), (e) => e + 1)),
                    void 0 === n && (n = []);
                  let o = e._x_lookup,
                    l = e._x_prevKeys,
                    c = [],
                    d = [];
                  if ("object" != typeof (u = n) || Array.isArray(u))
                    for (let e = 0; e < n.length; e++) {
                      let i = Je(t, n[e], e, n);
                      s((e) => d.push(e), { scope: { index: e, ...i } }),
                        c.push(i);
                    }
                  else
                    n = Object.entries(n).map(([e, i]) => {
                      let r = Je(t, i, e, n);
                      s((e) => d.push(e), { scope: { index: e, ...r } }),
                        c.push(r);
                    });
                  var u;
                  let p = [],
                    f = [],
                    h = [],
                    m = [];
                  for (let e = 0; e < l.length; e++) {
                    let t = l[e];
                    -1 === d.indexOf(t) && h.push(t);
                  }
                  l = l.filter((e) => !h.includes(e));
                  let g = "template";
                  for (let e = 0; e < d.length; e++) {
                    let t = d[e],
                      n = l.indexOf(t);
                    if (-1 === n) l.splice(e, 0, t), p.push([g, e]);
                    else if (n !== e) {
                      let t = l.splice(e, 1)[0],
                        i = l.splice(n - 1, 1)[0];
                      l.splice(e, 0, i), l.splice(n, 0, t), f.push([t, i]);
                    } else m.push(t);
                    g = t;
                  }
                  for (let e = 0; e < h.length; e++) {
                    let t = h[e];
                    o[t].remove(), (o[t] = null), delete o[t];
                  }
                  for (let e = 0; e < f.length; e++) {
                    let [t, n] = f[e],
                      i = o[t],
                      s = o[n],
                      r = document.createElement("div");
                    I(() => {
                      s.after(r), i.after(s), r.before(i), r.remove();
                    }),
                      D(s, c[d.indexOf(n)]);
                  }
                  for (let e = 0; e < p.length; e++) {
                    let [t, n] = p[e],
                      s = "template" === t ? r : o[t],
                      a = c[n],
                      l = d[n],
                      u = document.importNode(r.content, !0).firstElementChild;
                    R(u, i(a), r),
                      I(() => {
                        s.after(u), Se(u);
                      }),
                      "object" == typeof l &&
                        we(
                          "x-for key cannot be an object, it must be a string or an integer",
                          r
                        ),
                      (o[l] = u);
                  }
                  for (let e = 0; e < m.length; e++)
                    D(o[m[e]], c[d.indexOf(m[e])]);
                  r._x_prevKeys = d;
                });
              })(e, r, 0, o)
            ),
            s(() => {
              Object.values(e._x_lookup).forEach((e) => e.remove()),
                delete e._x_prevKeys,
                delete e._x_lookup;
            });
        }),
        (Ze.inline = (e, { expression: t }, { cleanup: n }) => {
          let i = Ce(e);
          i._x_refs || (i._x_refs = {}),
            (i._x_refs[t] = e),
            n(() => delete i._x_refs[t]);
        }),
        ee("ref", Ze),
        ee("if", (e, { expression: t }, { effect: n, cleanup: i }) => {
          let s = q(e, t);
          n(() =>
            s((t) => {
              t
                ? (() => {
                    if (e._x_currentIfEl) return e._x_currentIfEl;
                    let t = e.content.cloneNode(!0).firstElementChild;
                    R(t, {}, e),
                      I(() => {
                        e.after(t), Se(t);
                      }),
                      (e._x_currentIfEl = t),
                      (e._x_undoIf = () => {
                        t.remove(), delete e._x_currentIfEl;
                      });
                  })()
                : e._x_undoIf && (e._x_undoIf(), delete e._x_undoIf);
            })
          ),
            i(() => e._x_undoIf && e._x_undoIf());
        }),
        le(re("@", Z("on:"))),
        ee(
          "on",
          je((e, { value: t, modifiers: n, expression: i }, { cleanup: s }) => {
            let r = i ? q(e, i) : () => {},
              a = Ye(e, t, n, (e) => {
                r(() => {}, { scope: { $event: e }, params: [e] });
              });
            s(() => a());
          })
        ),
        Ve.setEvaluator(U),
        Ve.setReactivityEngine({
          reactive: Fe.reactive,
          effect: Fe.effect,
          release: Fe.stop,
          raw: Fe.toRaw,
        });
      var Qe = Ve;
    }).call(this, n(4));
  },
// ===================================================================================================================

  function (e, t, n) {
    var i, s, r;
    (r = function () {
      function e() {
        for (var e = 0, t = {}; e < arguments.length; e++) {
          var n = arguments[e];
          for (var i in n) t[i] = n[i];
        }
        return t;
      }
      function t(e) {
        return e.replace(/(%[0-9A-Z]{2})+/g, decodeURIComponent);
      }
      return (function n(i) {
        function s() {}
        function r(t, n, r) {
          if ("undefined" != typeof document) {
            "number" == typeof (r = e({ path: "/" }, s.defaults, r)).expires &&
              (r.expires = new Date(1 * new Date() + 864e5 * r.expires)),
              (r.expires = r.expires ? r.expires.toUTCString() : "");
            try {
              var a = JSON.stringify(n);
              /^[\{\[]/.test(a) && (n = a);
            } catch (e) {}
            (n = i.write
              ? i.write(n, t)
              : encodeURIComponent(String(n)).replace(
                  /%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,
                  decodeURIComponent
                )),
              (t = encodeURIComponent(String(t))
                .replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent)
                .replace(/[\(\)]/g, escape));
            var o = "";
            for (var l in r)
              r[l] &&
                ((o += "; " + l),
                !0 !== r[l] && (o += "=" + r[l].split(";")[0]));
            return (document.cookie = t + "=" + n + o);
          }
        }
        function a(e, n) {
          if ("undefined" != typeof document) {
            for (
              var s = {},
                r = document.cookie ? document.cookie.split("; ") : [],
                a = 0;
              a < r.length;
              a++
            ) {
              var o = r[a].split("="),
                l = o.slice(1).join("=");
              n || '"' !== l.charAt(0) || (l = l.slice(1, -1));
              try {
                var c = t(o[0]);
                if (((l = (i.read || i)(l, c) || t(l)), n))
                  try {
                    l = JSON.parse(l);
                  } catch (e) {}
                if (((s[c] = l), e === c)) break;
              } catch (e) {}
            }
            return e ? s[e] : s;
          }
        }
        return (
          (s.set = r),
          (s.get = function (e) {
            return a(e, !1);
          }),
          (s.getJSON = function (e) {
            return a(e, !0);
          }),
          (s.remove = function (t, n) {
            r(t, "", e(n, { expires: -1 }));
          }),
          (s.defaults = {}),
          (s.withConverter = n),
          s
        );
      })(function () {});
    }),
      void 0 === (s = "function" == typeof (i = r) ? i.call(t, n, t, e) : i) ||
        (e.exports = s),
      (e.exports = r());
  },

===================================================================

  function (e, t, n) {
    var i, s;
    void 0 ===
      (s =
        "function" ==
        typeof (i =
          () =>
          ({
            selector: e,
            enter: t = () => {},
            exit: n = () => {},
            progress: i = () => {},
            offset: s = 0,
            once: r = !1,
          }) => {
            let a = null,
              o = !1,
              l = [],
              c = 0;
            function d() {
              const e = document.documentElement.clientHeight,
                t = window.innerHeight || 0;
              c = Math.max(e, t);
            }
            function u() {
              o = !1;
              const e = (function () {
                if (s && "number" == typeof s) {
                  const e = Math.min(Math.max(0, s), 1);
                  return c - e * c;
                }
                return c;
              })();
              (l = l.filter((s) => {
                const {
                    top: a,
                    bottom: o,
                    height: l,
                  } = s.getBoundingClientRect(),
                  c = a < e,
                  d = o < e;
                if (c && !s.__ev_entered) {
                  if ((t(s), (s.__ev_progress = 0), i(s, s.__ev_progress), r))
                    return !1;
                } else
                  !c &&
                    s.__ev_entered &&
                    ((s.__ev_progress = 0), i(s, s.__ev_progress), n(s));
                if (c && !d) {
                  const t = (e - a) / l;
                  (s.__ev_progress = Math.min(1, Math.max(0, t))),
                    i(s, s.__ev_progress);
                }
                return (
                  c &&
                    d &&
                    1 !== s.__ev_progress &&
                    ((s.__ev_progress = 1), i(s, s.__ev_progress)),
                  (s.__ev_entered = c),
                  !0
                );
              })).length ||
                (window.removeEventListener("scroll", p, !0),
                window.removeEventListener("resize", f, !0),
                window.removeEventListener("load", h, !0));
            }
            function p() {
              o || ((o = !0), a(u));
            }
            function f() {
              d(), u();
            }
            function h() {
              d(), u();
            }
            function m(e) {
              const t = e.length,
                n = [];
              for (let i = 0; i < t; i += 1) n.push(e[i]);
              return n;
            }
            e
              ? (l = (function (e, t = document) {
                  return "string" == typeof e
                    ? m(t.querySelectorAll(e))
                    : e instanceof NodeList
                    ? m(e)
                    : e instanceof Array
                    ? e
                    : void 0;
                })(e)) && l.length
                ? ((a =
                    window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    window.msRequestAnimationFrame ||
                    function (e) {
                      return setTimeout(e, 1e3 / 60);
                    }),
                  window.addEventListener("resize", f, !0),
                  window.addEventListener("scroll", p, !0),
                  window.addEventListener("load", h, !0),
                  f(),
                  u())
                : console.error("no selector elements found")
              : console.error("must pass a selector");
          })
          ? i.call(t, n, t, e)
          : i) || (e.exports = s);
  },

===================================================================


  function (e, t, n) {
    e.exports = (function () {
      "use strict";
      function e() {
        return (e =
          Object.assign ||
          function (e) {
            for (var t = 1; t < arguments.length; t++) {
              var n = arguments[t];
              for (var i in n)
                Object.prototype.hasOwnProperty.call(n, i) && (e[i] = n[i]);
            }
            return e;
          }).apply(this, arguments);
      }
      var t = "undefined" != typeof window,
        n =
          (t && !("onscroll" in window)) ||
          ("undefined" != typeof navigator &&
            /(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent)),
        i = t && "IntersectionObserver" in window,
        s = t && "classList" in document.createElement("p"),
        r = t && window.devicePixelRatio > 1,
        a = {
          elements_selector: ".lazy",
          container: n || t ? document : null,
          threshold: 300,
          thresholds: null,
          data_src: "src",
          data_srcset: "srcset",
          data_sizes: "sizes",
          data_bg: "bg",
          data_bg_hidpi: "bg-hidpi",
          data_bg_multi: "bg-multi",
          data_bg_multi_hidpi: "bg-multi-hidpi",
          data_poster: "poster",
          class_applied: "applied",
          class_loading: "loading",
          class_loaded: "loaded",
          class_error: "error",
          class_entered: "entered",
          class_exited: "exited",
          unobserve_completed: !0,
          unobserve_entered: !1,
          cancel_on_exit: !0,
          callback_enter: null,
          callback_exit: null,
          callback_applied: null,
          callback_loading: null,
          callback_loaded: null,
          callback_error: null,
          callback_finish: null,
          callback_cancel: null,
          use_native: !1,
        },
        o = function (t) {
          return e({}, a, t);
        },
        l = function (e, t) {
          var n,
            i = "LazyLoad::Initialized",
            s = new e(t);
          try {
            n = new CustomEvent(i, { detail: { instance: s } });
          } catch (e) {
            (n = document.createEvent("CustomEvent")).initCustomEvent(
              i,
              !1,
              !1,
              { instance: s }
            );
          }
          window.dispatchEvent(n);
        },
        c = "loading",
        d = "loaded",
        u = "applied",
        p = "error",
        f = "native",
        h = function (e, t) {
          return e.getAttribute("data-" + t);
        },
        m = function (e) {
          return h(e, "ll-status");
        },
        g = function (e, t) {
          return (function (e, t, n) {
            var i = "data-ll-status";
            null !== n ? e.setAttribute(i, n) : e.removeAttribute(i);
          })(e, 0, t);
        },
        v = function (e) {
          return g(e, null);
        },
        b = function (e) {
          return null === m(e);
        },
        w = function (e) {
          return m(e) === f;
        },
        y = [c, d, u, p],
        x = function (e, t, n, i) {
          e && (void 0 === i ? (void 0 === n ? e(t) : e(t, n)) : e(t, n, i));
        },
        _ = function (e, t) {
          s
            ? e.classList.add(t)
            : (e.className += (e.className ? " " : "") + t);
        },
        E = function (e, t) {
          s
            ? e.classList.remove(t)
            : (e.className = e.className
                .replace(new RegExp("(^|\\s+)" + t + "(\\s+|$)"), " ")
                .replace(/^\s+/, "")
                .replace(/\s+$/, ""));
        },
        T = function (e) {
          return e.llTempImage;
        },
        C = function (e, t) {
          if (t) {
            var n = t._observer;
            n && n.unobserve(e);
          }
        },
        S = function (e, t) {
          e && (e.loadingCount += t);
        },
        k = function (e, t) {
          e && (e.toLoadCount = t);
        },
        M = function (e) {
          for (var t, n = [], i = 0; (t = e.children[i]); i += 1)
            "SOURCE" === t.tagName && n.push(t);
          return n;
        },
        O = function (e, t, n) {
          n && e.setAttribute(t, n);
        },
        A = function (e, t) {
          e.removeAttribute(t);
        },
        L = function (e) {
          return !!e.llOriginalAttrs;
        },
        P = function (e) {
          if (!L(e)) {
            var t = {};
            (t.src = e.getAttribute("src")),
              (t.srcset = e.getAttribute("srcset")),
              (t.sizes = e.getAttribute("sizes")),
              (e.llOriginalAttrs = t);
          }
        },
        I = function (e) {
          if (L(e)) {
            var t = e.llOriginalAttrs;
            O(e, "src", t.src),
              O(e, "srcset", t.srcset),
              O(e, "sizes", t.sizes);
          }
        },
        $ = function (e, t) {
          O(e, "sizes", h(e, t.data_sizes)),
            O(e, "srcset", h(e, t.data_srcset)),
            O(e, "src", h(e, t.data_src));
        },
        z = function (e) {
          A(e, "src"), A(e, "srcset"), A(e, "sizes");
        },
        N = function (e, t) {
          var n = e.parentNode;
          n && "PICTURE" === n.tagName && M(n).forEach(t);
        },
        R = {
          IMG: function (e, t) {
            N(e, function (e) {
              P(e), $(e, t);
            }),
              P(e),
              $(e, t);
          },
          IFRAME: function (e, t) {
            O(e, "src", h(e, t.data_src));
          },
          VIDEO: function (e, t) {
            !(function (e, n) {
              M(e).forEach(function (e) {
                O(e, "src", h(e, t.data_src));
              });
            })(e),
              O(e, "poster", h(e, t.data_poster)),
              O(e, "src", h(e, t.data_src)),
              e.load();
          },
        },
        D = function (e, t) {
          var n = R[e.tagName];
          n && n(e, t);
        },
        j = function (e, t, n) {
          S(n, 1), _(e, t.class_loading), g(e, c), x(t.callback_loading, e, n);
        },
        B = ["IMG", "IFRAME", "VIDEO"],
        V = function (e, t) {
          !t ||
            t.loadingCount > 0 ||
            t.toLoadCount > 0 ||
            x(e.callback_finish, t);
        },
        F = function (e, t, n) {
          e.addEventListener(t, n), (e.llEvLisnrs[t] = n);
        },
        G = function (e, t, n) {
          e.removeEventListener(t, n);
        },
        H = function (e) {
          return !!e.llEvLisnrs;
        },
        W = function (e) {
          if (H(e)) {
            var t = e.llEvLisnrs;
            for (var n in t) {
              var i = t[n];
              G(e, n, i);
            }
            delete e.llEvLisnrs;
          }
        },
        q = function (e, t, n) {
          !(function (e) {
            delete e.llTempImage;
          })(e),
            S(n, -1),
            n && (n.toLoadCount -= 1),
            E(e, t.class_loading),
            t.unobserve_completed && C(e, n);
        },
        Y = function (e, t, n) {
          var i = T(e) || e;
          H(i) ||
            (function (e, t, n) {
              H(e) || (e.llEvLisnrs = {});
              var i = "VIDEO" === e.tagName ? "loadeddata" : "load";
              F(e, i, t), F(e, "error", n);
            })(
              i,
              function (s) {
                !(function (e, t, n, i) {
                  var s = w(t);
                  q(t, n, i),
                    _(t, n.class_loaded),
                    g(t, d),
                    x(n.callback_loaded, t, i),
                    s || V(n, i);
                })(0, e, t, n),
                  W(i);
              },
              function (s) {
                !(function (e, t, n, i) {
                  var s = w(t);
                  q(t, n, i),
                    _(t, n.class_error),
                    g(t, p),
                    x(n.callback_error, t, i),
                    s || V(n, i);
                })(0, e, t, n),
                  W(i);
              }
            );
        },
        U = function (e, t, n) {
          !(function (e) {
            return B.indexOf(e.tagName) > -1;
          })(e)
            ? (function (e, t, n) {
                !(function (e) {
                  e.llTempImage = document.createElement("IMG");
                })(e),
                  Y(e, t, n),
                  (function (e, t, n) {
                    var i = h(e, t.data_bg),
                      s = h(e, t.data_bg_hidpi),
                      a = r && s ? s : i;
                    a &&
                      ((e.style.backgroundImage = 'url("'.concat(a, '")')),
                      T(e).setAttribute("src", a),
                      j(e, t, n));
                  })(e, t, n),
                  (function (e, t, n) {
                    var i = h(e, t.data_bg_multi),
                      s = h(e, t.data_bg_multi_hidpi),
                      a = r && s ? s : i;
                    a &&
                      ((e.style.backgroundImage = a),
                      (function (e, t, n) {
                        _(e, t.class_applied),
                          g(e, u),
                          t.unobserve_completed && C(e, t),
                          x(t.callback_applied, e, n);
                      })(e, t, n));
                  })(e, t, n);
              })(e, t, n)
            : (function (e, t, n) {
                Y(e, t, n), D(e, t), j(e, t, n);
              })(e, t, n);
        },
        X = ["IMG", "IFRAME", "VIDEO"],
        K = function (e) {
          return e.use_native && "loading" in HTMLImageElement.prototype;
        },
        J = function (e) {
          return Array.prototype.slice.call(e);
        },
        Z = function (e) {
          return e.container.querySelectorAll(e.elements_selector);
        },
        Q = function (e) {
          return (function (e) {
            return m(e) === p;
          })(e);
        },
        ee = function (e, t) {
          return (function (e) {
            return J(e).filter(b);
          })(e || Z(t));
        },
        te = function (e, n) {
          var s = o(e);
          (this._settings = s),
            (this.loadingCount = 0),
            (function (e, t) {
              i &&
                !K(e) &&
                (t._observer = new IntersectionObserver(
                  function (n) {
                    !(function (e, t, n) {
                      e.forEach(function (e) {
                        return (function (e) {
                          return e.isIntersecting || e.intersectionRatio > 0;
                        })(e)
                          ? (function (e, t, n, i) {
                              var s = (function (e) {
                                return y.indexOf(m(e)) >= 0;
                              })(e);
                              g(e, "entered"),
                                _(e, n.class_entered),
                                E(e, n.class_exited),
                                (function (e, t, n) {
                                  t.unobserve_entered && C(e, n);
                                })(e, n, i),
                                x(n.callback_enter, e, t, i),
                                s || U(e, n, i);
                            })(e.target, e, t, n)
                          : (function (e, t, n, i) {
                              b(e) ||
                                (_(e, n.class_exited),
                                (function (e, t, n, i) {
                                  n.cancel_on_exit &&
                                    (function (e) {
                                      return m(e) === c;
                                    })(e) &&
                                    "IMG" === e.tagName &&
                                    (W(e),
                                    (function (e) {
                                      N(e, function (e) {
                                        z(e);
                                      }),
                                        z(e);
                                    })(e),
                                    (function (e) {
                                      N(e, function (e) {
                                        I(e);
                                      }),
                                        I(e);
                                    })(e),
                                    E(e, n.class_loading),
                                    S(i, -1),
                                    v(e),
                                    x(n.callback_cancel, e, t, i));
                                })(e, t, n, i),
                                x(n.callback_exit, e, t, i));
                            })(e.target, e, t, n);
                      });
                    })(n, e, t);
                  },
                  (function (e) {
                    return {
                      root: e.container === document ? null : e.container,
                      rootMargin: e.thresholds || e.threshold + "px",
                    };
                  })(e)
                ));
            })(s, this),
            (function (e, n) {
              t &&
                window.addEventListener("online", function () {
                  !(function (e, t) {
                    var n;
                    ((n = Z(e)), J(n).filter(Q)).forEach(function (t) {
                      E(t, e.class_error), v(t);
                    }),
                      t.update();
                  })(e, n);
                });
            })(s, this),
            this.update(n);
        };
      return (
        (te.prototype = {
          update: function (e) {
            var t,
              s,
              r = this._settings,
              a = ee(e, r);
            k(this, a.length),
              !n && i
                ? K(r)
                  ? (function (e, t, n) {
                      a.forEach(function (e) {
                        -1 !== X.indexOf(e.tagName) &&
                          (function (e, t, n) {
                            e.setAttribute("loading", "lazy"),
                              Y(e, t, n),
                              D(e, t),
                              g(e, f);
                          })(e, t, n);
                      }),
                        k(n, 0);
                    })(0, r, this)
                  : ((s = a),
                    (function (e) {
                      e.disconnect();
                    })((t = this._observer)),
                    (function (e, t) {
                      s.forEach(function (t) {
                        e.observe(t);
                      });
                    })(t))
                : this.loadAll(a);
          },
          destroy: function () {
            this._observer && this._observer.disconnect(),
              Z(this._settings).forEach(function (e) {
                delete e.llOriginalAttrs;
              }),
              delete this._observer,
              delete this._settings,
              delete this.loadingCount,
              delete this.toLoadCount;
          },
          loadAll: function (e) {
            var t = this,
              n = this._settings;
            ee(e, n).forEach(function (e) {
              C(e, t), U(e, n, t);
            });
          },
        }),
        (te.load = function (e, t) {
          var n = o(t);
          U(e, n);
        }),
        (te.resetStatus = function (e) {
          v(e);
        }),
        t &&
          (function (e, t) {
            if (t)
              if (t.length) for (var n, i = 0; (n = t[i]); i += 1) l(e, n);
              else l(e, t);
          })(te, window.lazyLoadOptions),
        te
      );
    })();
  },
// ===================================================================

  function (e, t) {
    var n;
    n = (function () {
      return this;
    })();
    try {
      n = n || new Function("return this")();
    } catch (e) {
      "object" == typeof window && (n = window);
    }
    e.exports = n;
  },
// ===================================================================

  function (e, t, n) {
    e.exports = (function (e) {
      function t(i) {
        if (n[i]) return n[i].exports;
        var s = (n[i] = { exports: {}, id: i, loaded: !1 });
        return (
          e[i].call(s.exports, s, s.exports, t), (s.loaded = !0), s.exports
        );
      }
      var n = {};
      return (t.m = e), (t.c = n), (t.p = ""), t(0);
    })([
      function (e, t, n) {
        "use strict";
        var i = n(1).isInBrowser,
          s = new (n(2))(i ? document.body : null);
        s.setStateFromDOM(null),
          s.listenToDOM(),
          i && (window.scrollMonitor = s),
          (e.exports = s);
      },
      function (e, t) {
        "use strict";
        (t.VISIBILITYCHANGE = "visibilityChange"),
          (t.ENTERVIEWPORT = "enterViewport"),
          (t.FULLYENTERVIEWPORT = "fullyEnterViewport"),
          (t.EXITVIEWPORT = "exitViewport"),
          (t.PARTIALLYEXITVIEWPORT = "partiallyExitViewport"),
          (t.LOCATIONCHANGE = "locationChange"),
          (t.STATECHANGE = "stateChange"),
          (t.eventTypes = [
            t.VISIBILITYCHANGE,
            t.ENTERVIEWPORT,
            t.FULLYENTERVIEWPORT,
            t.EXITVIEWPORT,
            t.PARTIALLYEXITVIEWPORT,
            t.LOCATIONCHANGE,
            t.STATECHANGE,
          ]),
          (t.isOnServer = "undefined" == typeof window),
          (t.isInBrowser = !t.isOnServer),
          (t.defaultOffsets = { top: 0, bottom: 0 });
      },
      function (e, t, n) {
        "use strict";
        function i(e) {
          return o
            ? 0
            : e === document.body
            ? window.innerHeight || document.documentElement.clientHeight
            : e.clientHeight;
        }
        function s(e) {
          return o
            ? 0
            : e === document.body
            ? Math.max(
                document.body.scrollHeight,
                document.documentElement.scrollHeight,
                document.body.offsetHeight,
                document.documentElement.offsetHeight,
                document.documentElement.clientHeight
              )
            : e.scrollHeight;
        }
        function r(e) {
          return o
            ? 0
            : e === document.body
            ? window.pageYOffset ||
              (document.documentElement &&
                document.documentElement.scrollTop) ||
              document.body.scrollTop
            : e.scrollTop;
        }
        var a = n(1),
          o = a.isOnServer,
          l = a.isInBrowser,
          c = a.eventTypes,
          d = n(3),
          u = !1;
        if (l)
          try {
            var p = Object.defineProperty({}, "passive", {
              get: function () {
                u = !0;
              },
            });
            window.addEventListener("test", null, p);
          } catch (e) {}
        var f = !!u && { capture: !1, passive: !0 },
          h = (function () {
            function e(t, n) {
              !(function (e, t) {
                if (!(e instanceof t))
                  throw new TypeError("Cannot call a class as a function");
              })(this, e);
              var a,
                o,
                l,
                d = this;
              (this.item = t),
                (this.watchers = []),
                (this.viewportTop = null),
                (this.viewportBottom = null),
                (this.documentHeight = s(t)),
                (this.viewportHeight = i(t)),
                (this.DOMListener = function () {
                  e.prototype.DOMListener.apply(d, arguments);
                }),
                (this.eventTypes = c),
                n && (this.containerWatcher = n.create(t)),
                (this.update = function () {
                  (function () {
                    if (
                      ((d.viewportTop = r(t)),
                      (d.viewportBottom = d.viewportTop + d.viewportHeight),
                      (d.documentHeight = s(t)),
                      d.documentHeight !== a)
                    ) {
                      for (o = d.watchers.length; o--; )
                        d.watchers[o].recalculateLocation();
                      a = d.documentHeight;
                    }
                  })(),
                    (function () {
                      for (l = d.watchers.length; l--; ) d.watchers[l].update();
                      for (l = d.watchers.length; l--; )
                        d.watchers[l].triggerCallbacks();
                    })();
                }),
                (this.recalculateLocations = function () {
                  (this.documentHeight = 0), this.update();
                });
            }
            return (
              (e.prototype.listenToDOM = function () {
                l &&
                  (window.addEventListener
                    ? (this.item === document.body
                        ? window.addEventListener("scroll", this.DOMListener, f)
                        : this.item.addEventListener(
                            "scroll",
                            this.DOMListener,
                            f
                          ),
                      window.addEventListener("resize", this.DOMListener))
                    : (this.item === document.body
                        ? window.attachEvent("onscroll", this.DOMListener)
                        : this.item.attachEvent("onscroll", this.DOMListener),
                      window.attachEvent("onresize", this.DOMListener)),
                  (this.destroy = function () {
                    window.addEventListener
                      ? (this.item === document.body
                          ? (window.removeEventListener(
                              "scroll",
                              this.DOMListener,
                              f
                            ),
                            this.containerWatcher.destroy())
                          : this.item.removeEventListener(
                              "scroll",
                              this.DOMListener,
                              f
                            ),
                        window.removeEventListener("resize", this.DOMListener))
                      : (this.item === document.body
                          ? (window.detachEvent("onscroll", this.DOMListener),
                            this.containerWatcher.destroy())
                          : this.item.detachEvent("onscroll", this.DOMListener),
                        window.detachEvent("onresize", this.DOMListener));
                  }));
              }),
              (e.prototype.destroy = function () {}),
              (e.prototype.DOMListener = function (e) {
                this.setStateFromDOM(e);
              }),
              (e.prototype.setStateFromDOM = function (e) {
                var t = r(this.item),
                  n = i(this.item),
                  a = s(this.item);
                this.setState(t, n, a, e);
              }),
              (e.prototype.setState = function (e, t, n, i) {
                var s = t !== this.viewportHeight || n !== this.contentHeight;
                if (
                  ((this.latestEvent = i),
                  (this.viewportTop = e),
                  (this.viewportHeight = t),
                  (this.viewportBottom = e + t),
                  (this.contentHeight = n),
                  s)
                )
                  for (var r = this.watchers.length; r--; )
                    this.watchers[r].recalculateLocation();
                this.updateAndTriggerWatchers(i);
              }),
              (e.prototype.updateAndTriggerWatchers = function (e) {
                for (var t = this.watchers.length; t--; )
                  this.watchers[t].update();
                for (t = this.watchers.length; t--; )
                  this.watchers[t].triggerCallbacks(e);
              }),
              (e.prototype.createCustomContainer = function () {
                return new e();
              }),
              (e.prototype.createContainer = function (t) {
                "string" == typeof t
                  ? (t = document.querySelector(t))
                  : t && t.length > 0 && (t = t[0]);
                var n = new e(t, this);
                return n.setStateFromDOM(), n.listenToDOM(), n;
              }),
              (e.prototype.create = function (e, t) {
                "string" == typeof e
                  ? (e = document.querySelector(e))
                  : e && e.length > 0 && (e = e[0]);
                var n = new d(this, e, t);
                return this.watchers.push(n), n;
              }),
              (e.prototype.beget = function (e, t) {
                return this.create(e, t);
              }),
              e
            );
          })();
        e.exports = h;
      },
      function (e, t, n) {
        "use strict";
        function i(e, t, n) {
          function i(e, t) {
            if (0 !== e.length)
              for (v = e.length; v--; )
                (b = e[v]).callback.call(w, t, w), b.isOne && e.splice(v, 1);
          }
          var s,
            h,
            m,
            g,
            v,
            b,
            w = this;
          (this.watchItem = t),
            (this.container = e),
            (this.offsets = n
              ? n === +n
                ? { top: n, bottom: n }
                : { top: n.top || f.top, bottom: n.bottom || f.bottom }
              : f),
            (this.callbacks = {});
          for (var y = 0, x = p.length; y < x; y++) w.callbacks[p[y]] = [];
          (this.locked = !1),
            (this.triggerCallbacks = function (e) {
              switch (
                (this.isInViewport && !s && i(this.callbacks[a], e),
                this.isFullyInViewport && !h && i(this.callbacks[o], e),
                this.isAboveViewport !== m &&
                  this.isBelowViewport !== g &&
                  (i(this.callbacks[r], e),
                  h ||
                    this.isFullyInViewport ||
                    (i(this.callbacks[o], e), i(this.callbacks[c], e)),
                  s ||
                    this.isInViewport ||
                    (i(this.callbacks[a], e), i(this.callbacks[l], e))),
                !this.isFullyInViewport && h && i(this.callbacks[c], e),
                !this.isInViewport && s && i(this.callbacks[l], e),
                this.isInViewport !== s && i(this.callbacks[r], e),
                !0)
              ) {
                case s !== this.isInViewport:
                case h !== this.isFullyInViewport:
                case m !== this.isAboveViewport:
                case g !== this.isBelowViewport:
                  i(this.callbacks[u], e);
              }
              (s = this.isInViewport),
                (h = this.isFullyInViewport),
                (m = this.isAboveViewport),
                (g = this.isBelowViewport);
            }),
            (this.recalculateLocation = function () {
              if (!this.locked) {
                var e = this.top,
                  t = this.bottom;
                if (this.watchItem.nodeName) {
                  var n = this.watchItem.style.display;
                  "none" === n && (this.watchItem.style.display = "");
                  for (var s = 0, r = this.container; r.containerWatcher; )
                    (s +=
                      r.containerWatcher.top -
                      r.containerWatcher.container.viewportTop),
                      (r = r.containerWatcher.container);
                  var a = this.watchItem.getBoundingClientRect();
                  (this.top = a.top + this.container.viewportTop - s),
                    (this.bottom = a.bottom + this.container.viewportTop - s),
                    "none" === n && (this.watchItem.style.display = n);
                } else
                  this.watchItem === +this.watchItem
                    ? this.watchItem > 0
                      ? (this.top = this.bottom = this.watchItem)
                      : (this.top = this.bottom =
                          this.container.documentHeight - this.watchItem)
                    : ((this.top = this.watchItem.top),
                      (this.bottom = this.watchItem.bottom));
                (this.top -= this.offsets.top),
                  (this.bottom += this.offsets.bottom),
                  (this.height = this.bottom - this.top),
                  (void 0 === e && void 0 === t) ||
                    (this.top === e && this.bottom === t) ||
                    i(this.callbacks[d], null);
              }
            }),
            this.recalculateLocation(),
            this.update(),
            (s = this.isInViewport),
            (h = this.isFullyInViewport),
            (m = this.isAboveViewport),
            (g = this.isBelowViewport);
        }
        var s = n(1),
          r = s.VISIBILITYCHANGE,
          a = s.ENTERVIEWPORT,
          o = s.FULLYENTERVIEWPORT,
          l = s.EXITVIEWPORT,
          c = s.PARTIALLYEXITVIEWPORT,
          d = s.LOCATIONCHANGE,
          u = s.STATECHANGE,
          p = s.eventTypes,
          f = s.defaultOffsets;
        i.prototype = {
          on: function (e, t, n) {
            switch (!0) {
              case e === r && !this.isInViewport && this.isAboveViewport:
              case e === a && this.isInViewport:
              case e === o && this.isFullyInViewport:
              case e === l && this.isAboveViewport && !this.isInViewport:
              case e === c && this.isInViewport && this.isAboveViewport:
                if ((t.call(this, this.container.latestEvent, this), n)) return;
            }
            if (!this.callbacks[e])
              throw new Error(
                "Tried to add a scroll monitor listener of type " +
                  e +
                  ". Your options are: " +
                  p.join(", ")
              );
            this.callbacks[e].push({ callback: t, isOne: n || !1 });
          },
          off: function (e, t) {
            if (!this.callbacks[e])
              throw new Error(
                "Tried to remove a scroll monitor listener of type " +
                  e +
                  ". Your options are: " +
                  p.join(", ")
              );
            for (var n, i = 0; (n = this.callbacks[e][i]); i++)
              if (n.callback === t) {
                this.callbacks[e].splice(i, 1);
                break;
              }
          },
          one: function (e, t) {
            this.on(e, t, !0);
          },
          recalculateSize: function () {
            (this.height =
              this.watchItem.offsetHeight +
              this.offsets.top +
              this.offsets.bottom),
              (this.bottom = this.top + this.height);
          },
          update: function () {
            (this.isAboveViewport = this.top < this.container.viewportTop),
              (this.isBelowViewport =
                this.bottom > this.container.viewportBottom),
              (this.isInViewport =
                this.top < this.container.viewportBottom &&
                this.bottom > this.container.viewportTop),
              (this.isFullyInViewport =
                (this.top >= this.container.viewportTop &&
                  this.bottom <= this.container.viewportBottom) ||
                (this.isAboveViewport && this.isBelowViewport));
          },
          destroy: function () {
            var e = this.container.watchers.indexOf(this);
            this.container.watchers.splice(e, 1);
            for (var t = 0, n = p.length; t < n; t++)
              this.callbacks[p[t]].length = 0;
          },
          lock: function () {
            this.locked = !0;
          },
          unlock: function () {
            this.locked = !1;
          },
        };
        for (
          var h = function (e) {
              return function (t, n) {
                this.on.call(this, e, t, n);
              };
            },
            m = 0,
            g = p.length;
          m < g;
          m++
        ) {
          var v = p[m];
          i.prototype[v] = h(v);
        }
        e.exports = i;
      },
    ]);
  },

  // =========================================================

  function (e, t, n) {
    "use strict";
    n.r(t);
    var i = n(0);
    function s(e, t, n) {
      if (-1 === e.indexOf(t)) return n;
      const i = e[e.indexOf(t) + 1];
      if (!i) return n;
      if ("duration" === t) {
        let e = i.match(/([0-9]+)ms/);
        if (e) return e[1];
      }
      if ("min" === t) {
        let e = i.match(/([0-9]+)px/);
        if (e) return e[1];
      }
      return i;
    }
    var r = function (e) {
        function t(t, { modifiers: n }) {
          let i = s(n, "duration", 250) / 1e3,
            r = s(n, "min", 0),
            a = !n.includes("min");
          t._x_isShown || (t.style.height = r + "px"),
            !t._x_isShown && a && (t.hidden = !0),
            t._x_isShown || (t.style.overflow = "hidden");
          let o = (t, n) => {
              let i = e.setStyles(t, n);
              return n.height ? () => {} : i;
            },
            l = {
              transitionProperty: "height",
              transitionDuration: i + "s",
              transitionTimingFunction: "cubic-bezier(0.4, 0.0, 0.2, 1)",
            };
          t._x_transition = {
            in(n = () => {}, i = () => {}) {
              a && (t.hidden = !1), a && (t.style.display = null);
              let s = t.getBoundingClientRect().height;
              t.style.height = "auto";
              let o = t.getBoundingClientRect().height;
              s === o && (s = r),
                e.transition(
                  t,
                  e.setStyles,
                  {
                    during: l,
                    start: { height: s + "px" },
                    end: { height: o + "px" },
                  },
                  () => (t._x_isShown = !0),
                  () => {
                    t.style.height == o + "px" && (t.style.overflow = null);
                  }
                );
            },
            out(n = () => {}, i = () => {}) {
              let s = t.getBoundingClientRect().height;
              e.transition(
                t,
                o,
                {
                  during: l,
                  start: { height: s + "px" },
                  end: { height: r + "px" },
                },
                () => (t.style.overflow = "hidden"),
                () => {
                  (t._x_isShown = !1),
                    t.style.height == r + "px" &&
                      a &&
                      ((t.style.display = "none"), (t.hidden = !0));
                }
              );
            },
          };
        }
        e.directive("collapse", t),
          (t.inline = (e, { modifiers: t }) => {
            t.includes("min") &&
              ((e._x_doShow = () => {}), (e._x_doHide = () => {}));
          });
      },
      a = n(1),
      o = n.n(a);
    function l(e) {
      return (
        null !== e &&
        "object" == typeof e &&
        "constructor" in e &&
        e.constructor === Object
      );
    }
    function c(e = {}, t = {}) {
      Object.keys(t).forEach((n) => {
        void 0 === e[n]
          ? (e[n] = t[n])
          : l(t[n]) && l(e[n]) && Object.keys(t[n]).length > 0 && c(e[n], t[n]);
      });
    }
    const d = {
      body: {},
      addEventListener() {},
      removeEventListener() {},
      activeElement: { blur() {}, nodeName: "" },
      querySelector: () => null,
      querySelectorAll: () => [],
      getElementById: () => null,
      createEvent: () => ({ initEvent() {} }),
      createElement: () => ({
        children: [],
        childNodes: [],
        style: {},
        setAttribute() {},
        getElementsByTagName: () => [],
      }),
      createElementNS: () => ({}),
      importNode: () => null,
      location: {
        hash: "",
        host: "",
        hostname: "",
        href: "",
        origin: "",
        pathname: "",
        protocol: "",
        search: "",
      },
    };
    function u() {
      const e = "undefined" != typeof document ? document : {};
      return c(e, d), e;
    }
    const p = {
      document: d,
      navigator: { userAgent: "" },
      location: {
        hash: "",
        host: "",
        hostname: "",
        href: "",
        origin: "",
        pathname: "",
        protocol: "",
        search: "",
      },
      history: { replaceState() {}, pushState() {}, go() {}, back() {} },
      CustomEvent: function () {
        return this;
      },
      addEventListener() {},
      removeEventListener() {},
      getComputedStyle: () => ({ getPropertyValue: () => "" }),
      Image() {},
      Date() {},
      screen: {},
      setTimeout() {},
      clearTimeout() {},
      matchMedia: () => ({}),
      requestAnimationFrame: (e) =>
        "undefined" == typeof setTimeout ? (e(), null) : setTimeout(e, 0),
      cancelAnimationFrame(e) {
        "undefined" != typeof setTimeout && clearTimeout(e);
      },
    };
    function f() {
      const e = "undefined" != typeof window ? window : {};
      return c(e, p), e;
    }
    class h extends Array {
      constructor(e) {
        "number" == typeof e
          ? super(e)
          : (super(...(e || [])),
            (function (e) {
              const t = e.__proto__;
              Object.defineProperty(e, "__proto__", {
                get: () => t,
                set(e) {
                  t.__proto__ = e;
                },
              });
            })(this));
      }
    }
    function m(e = []) {
      const t = [];
      return (
        e.forEach((e) => {
          Array.isArray(e) ? t.push(...m(e)) : t.push(e);
        }),
        t
      );
    }
    function g(e, t) {
      return Array.prototype.filter.call(e, t);
    }
    function v(e, t) {
      const n = f(),
        i = u();
      let s = [];
      if (!t && e instanceof h) return e;
      if (!e) return new h(s);
      if ("string" == typeof e) {
        const n = e.trim();
        if (n.indexOf("<") >= 0 && n.indexOf(">") >= 0) {
          let e = "div";
          0 === n.indexOf("<li") && (e = "ul"),
            0 === n.indexOf("<tr") && (e = "tbody"),
            (0 !== n.indexOf("<td") && 0 !== n.indexOf("<th")) || (e = "tr"),
            0 === n.indexOf("<tbody") && (e = "table"),
            0 === n.indexOf("<option") && (e = "select");
          const t = i.createElement(e);
          t.innerHTML = n;
          for (let e = 0; e < t.childNodes.length; e += 1)
            s.push(t.childNodes[e]);
        } else
          s = (function (e, t) {
            if ("string" != typeof e) return [e];
            const n = [],
              i = t.querySelectorAll(e);
            for (let e = 0; e < i.length; e += 1) n.push(i[e]);
            return n;
          })(e.trim(), t || i);
      } else if (e.nodeType || e === n || e === i) s.push(e);
      else if (Array.isArray(e)) {
        if (e instanceof h) return e;
        s = e;
      }
      return new h(
        (function (e) {
          const t = [];
          for (let n = 0; n < e.length; n += 1)
            -1 === t.indexOf(e[n]) && t.push(e[n]);
          return t;
        })(s)
      );
    }
    v.fn = h.prototype;
    const b = "resize scroll".split(" ");
    function w(e) {
      return function (...t) {
        if (void 0 === t[0]) {
          for (let t = 0; t < this.length; t += 1)
            b.indexOf(e) < 0 &&
              (e in this[t] ? this[t][e]() : v(this[t]).trigger(e));
          return this;
        }
        return this.on(e, ...t);
      };
    }
    w("click"),
      w("blur"),
      w("focus"),
      w("focusin"),
      w("focusout"),
      w("keyup"),
      w("keydown"),
      w("keypress"),
      w("submit"),
      w("change"),
      w("mousedown"),
      w("mousemove"),
      w("mouseup"),
      w("mouseenter"),
      w("mouseleave"),
      w("mouseout"),
      w("mouseover"),
      w("touchstart"),
      w("touchend"),
      w("touchmove"),
      w("resize"),
      w("scroll");
    const y = {
      addClass: function (...e) {
        const t = m(e.map((e) => e.split(" ")));
        return (
          this.forEach((e) => {
            e.classList.add(...t);
          }),
          this
        );
      },
      removeClass: function (...e) {
        const t = m(e.map((e) => e.split(" ")));
        return (
          this.forEach((e) => {
            e.classList.remove(...t);
          }),
          this
        );
      },
      hasClass: function (...e) {
        const t = m(e.map((e) => e.split(" ")));
        return (
          g(this, (e) => t.filter((t) => e.classList.contains(t)).length > 0)
            .length > 0
        );
      },
      toggleClass: function (...e) {
        const t = m(e.map((e) => e.split(" ")));
        this.forEach((e) => {
          t.forEach((t) => {
            e.classList.toggle(t);
          });
        });
      },
      attr: function (e, t) {
        if (1 === arguments.length && "string" == typeof e)
          return this[0] ? this[0].getAttribute(e) : void 0;
        for (let n = 0; n < this.length; n += 1)
          if (2 === arguments.length) this[n].setAttribute(e, t);
          else
            for (const t in e)
              (this[n][t] = e[t]), this[n].setAttribute(t, e[t]);
        return this;
      },
      removeAttr: function (e) {
        for (let t = 0; t < this.length; t += 1) this[t].removeAttribute(e);
        return this;
      },
      transform: function (e) {
        for (let t = 0; t < this.length; t += 1) this[t].style.transform = e;
        return this;
      },
      transition: function (e) {
        for (let t = 0; t < this.length; t += 1)
          this[t].style.transitionDuration =
            "string" != typeof e ? e + "ms" : e;
        return this;
      },
      on: function (...e) {
        let [t, n, i, s] = e;
        function r(e) {
          const t = e.target;
          if (!t) return;
          const s = e.target.dom7EventData || [];
          if ((s.indexOf(e) < 0 && s.unshift(e), v(t).is(n))) i.apply(t, s);
          else {
            const e = v(t).parents();
            for (let t = 0; t < e.length; t += 1)
              v(e[t]).is(n) && i.apply(e[t], s);
          }
        }
        function a(e) {
          const t = (e && e.target && e.target.dom7EventData) || [];
          t.indexOf(e) < 0 && t.unshift(e), i.apply(this, t);
        }
        "function" == typeof e[1] && (([t, i, s] = e), (n = void 0)),
          s || (s = !1);
        const o = t.split(" ");
        let l;
        for (let e = 0; e < this.length; e += 1) {
          const t = this[e];
          if (n)
            for (l = 0; l < o.length; l += 1) {
              const e = o[l];
              t.dom7LiveListeners || (t.dom7LiveListeners = {}),
                t.dom7LiveListeners[e] || (t.dom7LiveListeners[e] = []),
                t.dom7LiveListeners[e].push({ listener: i, proxyListener: r }),
                t.addEventListener(e, r, s);
            }
          else
            for (l = 0; l < o.length; l += 1) {
              const e = o[l];
              t.dom7Listeners || (t.dom7Listeners = {}),
                t.dom7Listeners[e] || (t.dom7Listeners[e] = []),
                t.dom7Listeners[e].push({ listener: i, proxyListener: a }),
                t.addEventListener(e, a, s);
            }
        }
        return this;
      },
      off: function (...e) {
        let [t, n, i, s] = e;
        "function" == typeof e[1] && (([t, i, s] = e), (n = void 0)),
          s || (s = !1);
        const r = t.split(" ");
        for (let e = 0; e < r.length; e += 1) {
          const t = r[e];
          for (let e = 0; e < this.length; e += 1) {
            const r = this[e];
            let a;
            if (
              (!n && r.dom7Listeners
                ? (a = r.dom7Listeners[t])
                : n && r.dom7LiveListeners && (a = r.dom7LiveListeners[t]),
              a && a.length)
            )
              for (let e = a.length - 1; e >= 0; e -= 1) {
                const n = a[e];
                (i && n.listener === i) ||
                (i &&
                  n.listener &&
                  n.listener.dom7proxy &&
                  n.listener.dom7proxy === i)
                  ? (r.removeEventListener(t, n.proxyListener, s),
                    a.splice(e, 1))
                  : i ||
                    (r.removeEventListener(t, n.proxyListener, s),
                    a.splice(e, 1));
              }
          }
        }
        return this;
      },
      trigger: function (...e) {
        const t = f(),
          n = e[0].split(" "),
          i = e[1];
        for (let s = 0; s < n.length; s += 1) {
          const r = n[s];
          for (let n = 0; n < this.length; n += 1) {
            const s = this[n];
            if (t.CustomEvent) {
              const n = new t.CustomEvent(r, {
                detail: i,
                bubbles: !0,
                cancelable: !0,
              });
              (s.dom7EventData = e.filter((e, t) => t > 0)),
                s.dispatchEvent(n),
                (s.dom7EventData = []),
                delete s.dom7EventData;
            }
          }
        }
        return this;
      },
      transitionEnd: function (e) {
        const t = this;
        return (
          e &&
            t.on("transitionend", function n(i) {
              i.target === this && (e.call(this, i), t.off("transitionend", n));
            }),
          this
        );
      },
      outerWidth: function (e) {
        if (this.length > 0) {
          if (e) {
            const e = this.styles();
            return (
              this[0].offsetWidth +
              parseFloat(e.getPropertyValue("margin-right")) +
              parseFloat(e.getPropertyValue("margin-left"))
            );
          }
          return this[0].offsetWidth;
        }
        return null;
      },
      outerHeight: function (e) {
        if (this.length > 0) {
          if (e) {
            const e = this.styles();
            return (
              this[0].offsetHeight +
              parseFloat(e.getPropertyValue("margin-top")) +
              parseFloat(e.getPropertyValue("margin-bottom"))
            );
          }
          return this[0].offsetHeight;
        }
        return null;
      },
      styles: function () {
        const e = f();
        return this[0] ? e.getComputedStyle(this[0], null) : {};
      },
      offset: function () {
        if (this.length > 0) {
          const e = f(),
            t = u(),
            n = this[0],
            i = n.getBoundingClientRect(),
            s = t.body,
            r = n.clientTop || s.clientTop || 0,
            a = n.clientLeft || s.clientLeft || 0,
            o = n === e ? e.scrollY : n.scrollTop,
            l = n === e ? e.scrollX : n.scrollLeft;
          return { top: i.top + o - r, left: i.left + l - a };
        }
        return null;
      },
      css: function (e, t) {
        const n = f();
        let i;
        if (1 === arguments.length) {
          if ("string" != typeof e) {
            for (i = 0; i < this.length; i += 1)
              for (const t in e) this[i].style[t] = e[t];
            return this;
          }
          if (this[0])
            return n.getComputedStyle(this[0], null).getPropertyValue(e);
        }
        if (2 === arguments.length && "string" == typeof e) {
          for (i = 0; i < this.length; i += 1) this[i].style[e] = t;
          return this;
        }
        return this;
      },
      each: function (e) {
        return e
          ? (this.forEach((t, n) => {
              e.apply(t, [t, n]);
            }),
            this)
          : this;
      },
      html: function (e) {
        if (void 0 === e) return this[0] ? this[0].innerHTML : null;
        for (let t = 0; t < this.length; t += 1) this[t].innerHTML = e;
        return this;
      },
      text: function (e) {
        if (void 0 === e) return this[0] ? this[0].textContent.trim() : null;
        for (let t = 0; t < this.length; t += 1) this[t].textContent = e;
        return this;
      },
      is: function (e) {
        const t = f(),
          n = u(),
          i = this[0];
        let s, r;
        if (!i || void 0 === e) return !1;
        if ("string" == typeof e) {
          if (i.matches) return i.matches(e);
          if (i.webkitMatchesSelector) return i.webkitMatchesSelector(e);
          if (i.msMatchesSelector) return i.msMatchesSelector(e);
          for (s = v(e), r = 0; r < s.length; r += 1) if (s[r] === i) return !0;
          return !1;
        }
        if (e === n) return i === n;
        if (e === t) return i === t;
        if (e.nodeType || e instanceof h) {
          for (s = e.nodeType ? [e] : e, r = 0; r < s.length; r += 1)
            if (s[r] === i) return !0;
          return !1;
        }
        return !1;
      },
      index: function () {
        let e,
          t = this[0];
        if (t) {
          for (e = 0; null !== (t = t.previousSibling); )
            1 === t.nodeType && (e += 1);
          return e;
        }
      },
      eq: function (e) {
        if (void 0 === e) return this;
        const t = this.length;
        if (e > t - 1) return v([]);
        if (e < 0) {
          const n = t + e;
          return v(n < 0 ? [] : [this[n]]);
        }
        return v([this[e]]);
      },
      append: function (...e) {
        let t;
        const n = u();
        for (let i = 0; i < e.length; i += 1) {
          t = e[i];
          for (let e = 0; e < this.length; e += 1)
            if ("string" == typeof t) {
              const i = n.createElement("div");
              for (i.innerHTML = t; i.firstChild; )
                this[e].appendChild(i.firstChild);
            } else if (t instanceof h)
              for (let n = 0; n < t.length; n += 1) this[e].appendChild(t[n]);
            else this[e].appendChild(t);
        }
        return this;
      },
      prepend: function (e) {
        const t = u();
        let n, i;
        for (n = 0; n < this.length; n += 1)
          if ("string" == typeof e) {
            const s = t.createElement("div");
            for (s.innerHTML = e, i = s.childNodes.length - 1; i >= 0; i -= 1)
              this[n].insertBefore(s.childNodes[i], this[n].childNodes[0]);
          } else if (e instanceof h)
            for (i = 0; i < e.length; i += 1)
              this[n].insertBefore(e[i], this[n].childNodes[0]);
          else this[n].insertBefore(e, this[n].childNodes[0]);
        return this;
      },
      next: function (e) {
        return this.length > 0
          ? e
            ? this[0].nextElementSibling && v(this[0].nextElementSibling).is(e)
              ? v([this[0].nextElementSibling])
              : v([])
            : this[0].nextElementSibling
            ? v([this[0].nextElementSibling])
            : v([])
          : v([]);
      },
      nextAll: function (e) {
        const t = [];
        let n = this[0];
        if (!n) return v([]);
        for (; n.nextElementSibling; ) {
          const i = n.nextElementSibling;
          e ? v(i).is(e) && t.push(i) : t.push(i), (n = i);
        }
        return v(t);
      },
      prev: function (e) {
        if (this.length > 0) {
          const t = this[0];
          return e
            ? t.previousElementSibling && v(t.previousElementSibling).is(e)
              ? v([t.previousElementSibling])
              : v([])
            : t.previousElementSibling
            ? v([t.previousElementSibling])
            : v([]);
        }
        return v([]);
      },
      prevAll: function (e) {
        const t = [];
        let n = this[0];
        if (!n) return v([]);
        for (; n.previousElementSibling; ) {
          const i = n.previousElementSibling;
          e ? v(i).is(e) && t.push(i) : t.push(i), (n = i);
        }
        return v(t);
      },
      parent: function (e) {
        const t = [];
        for (let n = 0; n < this.length; n += 1)
          null !== this[n].parentNode &&
            (e
              ? v(this[n].parentNode).is(e) && t.push(this[n].parentNode)
              : t.push(this[n].parentNode));
        return v(t);
      },
      parents: function (e) {
        const t = [];
        for (let n = 0; n < this.length; n += 1) {
          let i = this[n].parentNode;
          for (; i; )
            e ? v(i).is(e) && t.push(i) : t.push(i), (i = i.parentNode);
        }
        return v(t);
      },
      closest: function (e) {
        let t = this;
        return void 0 === e ? v([]) : (t.is(e) || (t = t.parents(e).eq(0)), t);
      },
      find: function (e) {
        const t = [];
        for (let n = 0; n < this.length; n += 1) {
          const i = this[n].querySelectorAll(e);
          for (let e = 0; e < i.length; e += 1) t.push(i[e]);
        }
        return v(t);
      },
      children: function (e) {
        const t = [];
        for (let n = 0; n < this.length; n += 1) {
          const i = this[n].children;
          for (let n = 0; n < i.length; n += 1)
            (e && !v(i[n]).is(e)) || t.push(i[n]);
        }
        return v(t);
      },
      filter: function (e) {
        return v(g(this, e));
      },
      remove: function () {
        for (let e = 0; e < this.length; e += 1)
          this[e].parentNode && this[e].parentNode.removeChild(this[e]);
        return this;
      },
    };
    Object.keys(y).forEach((e) => {
      Object.defineProperty(v.fn, e, { value: y[e], writable: !0 });
    });
    var x = v;
    function _(e, t) {
      return void 0 === t && (t = 0), setTimeout(e, t);
    }
    function E() {
      return Date.now();
    }
    function T(e) {
      return (
        "object" == typeof e &&
        null !== e &&
        e.constructor &&
        "Object" === Object.prototype.toString.call(e).slice(8, -1)
      );
    }
    function C(e) {
      return "undefined" != typeof window && void 0 !== window.HTMLElement
        ? e instanceof HTMLElement
        : e && (1 === e.nodeType || 11 === e.nodeType);
    }
    function S() {
      const e = Object(arguments.length <= 0 ? void 0 : arguments[0]),
        t = ["__proto__", "constructor", "prototype"];
      for (let n = 1; n < arguments.length; n += 1) {
        const i = n < 0 || arguments.length <= n ? void 0 : arguments[n];
        if (null != i && !C(i)) {
          const n = Object.keys(Object(i)).filter((e) => t.indexOf(e) < 0);
          for (let t = 0, s = n.length; t < s; t += 1) {
            const s = n[t],
              r = Object.getOwnPropertyDescriptor(i, s);
            void 0 !== r &&
              r.enumerable &&
              (T(e[s]) && T(i[s])
                ? i[s].__swiper__
                  ? (e[s] = i[s])
                  : S(e[s], i[s])
                : !T(e[s]) && T(i[s])
                ? ((e[s] = {}), i[s].__swiper__ ? (e[s] = i[s]) : S(e[s], i[s]))
                : (e[s] = i[s]));
          }
        }
      }
      return e;
    }
    function k(e, t, n) {
      e.style.setProperty(t, n);
    }
    function M(e) {
      let { swiper: t, targetPosition: n, side: i } = e;
      const s = f(),
        r = -t.translate;
      let a,
        o = null;
      const l = t.params.speed;
      (t.wrapperEl.style.scrollSnapType = "none"),
        s.cancelAnimationFrame(t.cssModeFrameID);
      const c = n > r ? "next" : "prev",
        d = (e, t) => ("next" === c && e >= t) || ("prev" === c && e <= t),
        u = () => {
          (a = new Date().getTime()), null === o && (o = a);
          const e = Math.max(Math.min((a - o) / l, 1), 0),
            c = 0.5 - Math.cos(e * Math.PI) / 2;
          let p = r + c * (n - r);
          if ((d(p, n) && (p = n), t.wrapperEl.scrollTo({ [i]: p }), d(p, n)))
            return (
              (t.wrapperEl.style.overflow = "hidden"),
              (t.wrapperEl.style.scrollSnapType = ""),
              setTimeout(() => {
                (t.wrapperEl.style.overflow = ""),
                  t.wrapperEl.scrollTo({ [i]: p });
              }),
              void s.cancelAnimationFrame(t.cssModeFrameID)
            );
          t.cssModeFrameID = s.requestAnimationFrame(u);
        };
      u();
    }
    let O, A, L;
    function P() {
      return (
        O ||
          (O = (function () {
            const e = f(),
              t = u();
            return {
              smoothScroll:
                t.documentElement &&
                "scrollBehavior" in t.documentElement.style,
              touch: !!(
                "ontouchstart" in e ||
                (e.DocumentTouch && t instanceof e.DocumentTouch)
              ),
              passiveListener: (function () {
                let t = !1;
                try {
                  const n = Object.defineProperty({}, "passive", {
                    get() {
                      t = !0;
                    },
                  });
                  e.addEventListener("testPassiveListener", null, n);
                } catch (e) {}
                return t;
              })(),
              gestures: "ongesturestart" in e,
            };
          })()),
        O
      );
    }
    function I(e) {
      let { swiper: t, runCallbacks: n, direction: i, step: s } = e;
      const { activeIndex: r, previousIndex: a } = t;
      let o = i;
      if (
        (o || (o = r > a ? "next" : r < a ? "prev" : "reset"),
        t.emit("transition" + s),
        n && r !== a)
      ) {
        if ("reset" === o) return void t.emit("slideResetTransition" + s);
        t.emit("slideChangeTransition" + s),
          "next" === o
            ? t.emit("slideNextTransition" + s)
            : t.emit("slidePrevTransition" + s);
      }
    }
    function $() {
      const e = this,
        { params: t, el: n } = e;
      if (n && 0 === n.offsetWidth) return;
      t.breakpoints && e.setBreakpoint();
      const { allowSlideNext: i, allowSlidePrev: s, snapGrid: r } = e;
      (e.allowSlideNext = !0),
        (e.allowSlidePrev = !0),
        e.updateSize(),
        e.updateSlides(),
        e.updateSlidesClasses(),
        ("auto" === t.slidesPerView || t.slidesPerView > 1) &&
        e.isEnd &&
        !e.isBeginning &&
        !e.params.centeredSlides
          ? e.slideTo(e.slides.length - 1, 0, !1, !0)
          : e.slideTo(e.activeIndex, 0, !1, !0),
        e.autoplay &&
          e.autoplay.running &&
          e.autoplay.paused &&
          e.autoplay.run(),
        (e.allowSlidePrev = s),
        (e.allowSlideNext = i),
        e.params.watchOverflow && r !== e.snapGrid && e.checkOverflow();
    }
    let z = !1;
    function N() {}
    const R = (e, t) => {
        const n = u(),
          {
            params: i,
            touchEvents: s,
            el: r,
            wrapperEl: a,
            device: o,
            support: l,
          } = e,
          c = !!i.nested,
          d = "on" === t ? "addEventListener" : "removeEventListener",
          p = t;
        if (l.touch) {
          const t = !(
            "touchstart" !== s.start ||
            !l.passiveListener ||
            !i.passiveListeners
          ) && { passive: !0, capture: !1 };
          r[d](s.start, e.onTouchStart, t),
            r[d](
              s.move,
              e.onTouchMove,
              l.passiveListener ? { passive: !1, capture: c } : c
            ),
            r[d](s.end, e.onTouchEnd, t),
            s.cancel && r[d](s.cancel, e.onTouchEnd, t);
        } else
          r[d](s.start, e.onTouchStart, !1),
            n[d](s.move, e.onTouchMove, c),
            n[d](s.end, e.onTouchEnd, !1);
        (i.preventClicks || i.preventClicksPropagation) &&
          r[d]("click", e.onClick, !0),
          i.cssMode && a[d]("scroll", e.onScroll),
          i.updateOnWindowResize
            ? e[p](
                o.ios || o.android
                  ? "resize orientationchange observerUpdate"
                  : "resize observerUpdate",
                $,
                !0
              )
            : e[p]("observerUpdate", $, !0);
      },
      D = (e, t) => e.grid && t.grid && t.grid.rows > 1;
    var j = {
      init: !0,
      direction: "horizontal",
      touchEventsTarget: "wrapper",
      initialSlide: 0,
      speed: 300,
      cssMode: !1,
      updateOnWindowResize: !0,
      resizeObserver: !0,
      nested: !1,
      createElements: !1,
      enabled: !0,
      focusableElements:
        "input, select, option, textarea, button, video, label",
      width: null,
      height: null,
      preventInteractionOnTransition: !1,
      userAgent: null,
      url: null,
      edgeSwipeDetection: !1,
      edgeSwipeThreshold: 20,
      autoHeight: !1,
      setWrapperSize: !1,
      virtualTranslate: !1,
      effect: "slide",
      breakpoints: void 0,
      breakpointsBase: "window",
      spaceBetween: 0,
      slidesPerView: 1,
      slidesPerGroup: 1,
      slidesPerGroupSkip: 0,
      slidesPerGroupAuto: !1,
      centeredSlides: !1,
      centeredSlidesBounds: !1,
      slidesOffsetBefore: 0,
      slidesOffsetAfter: 0,
      normalizeSlideIndex: !0,
      centerInsufficientSlides: !1,
      watchOverflow: !0,
      roundLengths: !1,
      touchRatio: 1,
      touchAngle: 45,
      simulateTouch: !0,
      shortSwipes: !0,
      longSwipes: !0,
      longSwipesRatio: 0.5,
      longSwipesMs: 300,
      followFinger: !0,
      allowTouchMove: !0,
      threshold: 0,
      touchMoveStopPropagation: !1,
      touchStartPreventDefault: !0,
      touchStartForcePreventDefault: !1,
      touchReleaseOnEdges: !1,
      uniqueNavElements: !0,
      resistance: !0,
      resistanceRatio: 0.85,
      watchSlidesProgress: !1,
      grabCursor: !1,
      preventClicks: !0,
      preventClicksPropagation: !0,
      slideToClickedSlide: !1,
      preloadImages: !0,
      updateOnImagesReady: !0,
      loop: !1,
      loopAdditionalSlides: 0,
      loopedSlides: null,
      loopFillGroupWithBlank: !1,
      loopPreventsSlide: !0,
      rewind: !1,
      allowSlidePrev: !0,
      allowSlideNext: !0,
      swipeHandler: null,
      noSwiping: !0,
      noSwipingClass: "swiper-no-swiping",
      noSwipingSelector: null,
      passiveListeners: !0,
      maxBackfaceHiddenSlides: 10,
      containerModifierClass: "swiper-",
      slideClass: "swiper-slide",
      slideBlankClass: "swiper-slide-invisible-blank",
      slideActiveClass: "swiper-slide-active",
      slideDuplicateActiveClass: "swiper-slide-duplicate-active",
      slideVisibleClass: "swiper-slide-visible",
      slideDuplicateClass: "swiper-slide-duplicate",
      slideNextClass: "swiper-slide-next",
      slideDuplicateNextClass: "swiper-slide-duplicate-next",
      slidePrevClass: "swiper-slide-prev",
      slideDuplicatePrevClass: "swiper-slide-duplicate-prev",
      wrapperClass: "swiper-wrapper",
      runCallbacksOnInit: !0,
      _emitClasses: !1,
    };
    function B(e, t) {
      return function (n) {
        void 0 === n && (n = {});
        const i = Object.keys(n)[0],
          s = n[i];
        "object" == typeof s && null !== s
          ? (["navigation", "pagination", "scrollbar"].indexOf(i) >= 0 &&
              !0 === e[i] &&
              (e[i] = { auto: !0 }),
            i in e && "enabled" in s
              ? (!0 === e[i] && (e[i] = { enabled: !0 }),
                "object" != typeof e[i] ||
                  "enabled" in e[i] ||
                  (e[i].enabled = !0),
                e[i] || (e[i] = { enabled: !1 }),
                S(t, n))
              : S(t, n))
          : S(t, n);
      };
    }
    const V = {
        eventsEmitter: {
          on(e, t, n) {
            const i = this;
            if ("function" != typeof t) return i;
            const s = n ? "unshift" : "push";
            return (
              e.split(" ").forEach((e) => {
                i.eventsListeners[e] || (i.eventsListeners[e] = []),
                  i.eventsListeners[e][s](t);
              }),
              i
            );
          },
          once(e, t, n) {
            const i = this;
            if ("function" != typeof t) return i;
            function s() {
              i.off(e, s), s.__emitterProxy && delete s.__emitterProxy;
              for (
                var n = arguments.length, r = new Array(n), a = 0;
                a < n;
                a++
              )
                r[a] = arguments[a];
              t.apply(i, r);
            }
            return (s.__emitterProxy = t), i.on(e, s, n);
          },
          onAny(e, t) {
            const n = this;
            if ("function" != typeof e) return n;
            const i = t ? "unshift" : "push";
            return (
              n.eventsAnyListeners.indexOf(e) < 0 && n.eventsAnyListeners[i](e),
              n
            );
          },
          offAny(e) {
            const t = this;
            if (!t.eventsAnyListeners) return t;
            const n = t.eventsAnyListeners.indexOf(e);
            return n >= 0 && t.eventsAnyListeners.splice(n, 1), t;
          },
          off(e, t) {
            const n = this;
            return n.eventsListeners
              ? (e.split(" ").forEach((e) => {
                  void 0 === t
                    ? (n.eventsListeners[e] = [])
                    : n.eventsListeners[e] &&
                      n.eventsListeners[e].forEach((i, s) => {
                        (i === t ||
                          (i.__emitterProxy && i.__emitterProxy === t)) &&
                          n.eventsListeners[e].splice(s, 1);
                      });
                }),
                n)
              : n;
          },
          emit() {
            const e = this;
            if (!e.eventsListeners) return e;
            let t, n, i;
            for (var s = arguments.length, r = new Array(s), a = 0; a < s; a++)
              r[a] = arguments[a];
            return (
              "string" == typeof r[0] || Array.isArray(r[0])
                ? ((t = r[0]), (n = r.slice(1, r.length)), (i = e))
                : ((t = r[0].events), (n = r[0].data), (i = r[0].context || e)),
              n.unshift(i),
              (Array.isArray(t) ? t : t.split(" ")).forEach((t) => {
                e.eventsAnyListeners &&
                  e.eventsAnyListeners.length &&
                  e.eventsAnyListeners.forEach((e) => {
                    e.apply(i, [t, ...n]);
                  }),
                  e.eventsListeners &&
                    e.eventsListeners[t] &&
                    e.eventsListeners[t].forEach((e) => {
                      e.apply(i, n);
                    });
              }),
              e
            );
          },
        },
        update: {
          updateSize: function () {
            const e = this;
            let t, n;
            const i = e.$el;
            (t =
              void 0 !== e.params.width && null !== e.params.width
                ? e.params.width
                : i[0].clientWidth),
              (n =
                void 0 !== e.params.height && null !== e.params.height
                  ? e.params.height
                  : i[0].clientHeight),
              (0 === t && e.isHorizontal()) ||
                (0 === n && e.isVertical()) ||
                ((t =
                  t -
                  parseInt(i.css("padding-left") || 0, 10) -
                  parseInt(i.css("padding-right") || 0, 10)),
                (n =
                  n -
                  parseInt(i.css("padding-top") || 0, 10) -
                  parseInt(i.css("padding-bottom") || 0, 10)),
                Number.isNaN(t) && (t = 0),
                Number.isNaN(n) && (n = 0),
                Object.assign(e, {
                  width: t,
                  height: n,
                  size: e.isHorizontal() ? t : n,
                }));
          },
          updateSlides: function () {
            const e = this;
            function t(t) {
              return e.isHorizontal()
                ? t
                : {
                    width: "height",
                    "margin-top": "margin-left",
                    "margin-bottom ": "margin-right",
                    "margin-left": "margin-top",
                    "margin-right": "margin-bottom",
                    "padding-left": "padding-top",
                    "padding-right": "padding-bottom",
                    marginRight: "marginBottom",
                  }[t];
            }
            function n(e, n) {
              return parseFloat(e.getPropertyValue(t(n)) || 0);
            }
            const i = e.params,
              { $wrapperEl: s, size: r, rtlTranslate: a, wrongRTL: o } = e,
              l = e.virtual && i.virtual.enabled,
              c = l ? e.virtual.slides.length : e.slides.length,
              d = s.children("." + e.params.slideClass),
              u = l ? e.virtual.slides.length : d.length;
            let p = [];
            const f = [],
              h = [];
            let m = i.slidesOffsetBefore;
            "function" == typeof m && (m = i.slidesOffsetBefore.call(e));
            let g = i.slidesOffsetAfter;
            "function" == typeof g && (g = i.slidesOffsetAfter.call(e));
            const v = e.snapGrid.length,
              b = e.slidesGrid.length;
            let w = i.spaceBetween,
              y = -m,
              x = 0,
              _ = 0;
            if (void 0 === r) return;
            "string" == typeof w &&
              w.indexOf("%") >= 0 &&
              (w = (parseFloat(w.replace("%", "")) / 100) * r),
              (e.virtualSize = -w),
              a
                ? d.css({ marginLeft: "", marginBottom: "", marginTop: "" })
                : d.css({ marginRight: "", marginBottom: "", marginTop: "" }),
              i.centeredSlides &&
                i.cssMode &&
                (k(e.wrapperEl, "--swiper-centered-offset-before", ""),
                k(e.wrapperEl, "--swiper-centered-offset-after", ""));
            const E = i.grid && i.grid.rows > 1 && e.grid;
            let T;
            E && e.grid.initSlides(u);
            const C =
              "auto" === i.slidesPerView &&
              i.breakpoints &&
              Object.keys(i.breakpoints).filter(
                (e) => void 0 !== i.breakpoints[e].slidesPerView
              ).length > 0;
            for (let s = 0; s < u; s += 1) {
              T = 0;
              const a = d.eq(s);
              if (
                (E && e.grid.updateSlide(s, a, u, t),
                "none" !== a.css("display"))
              ) {
                if ("auto" === i.slidesPerView) {
                  C && (d[s].style[t("width")] = "");
                  const r = getComputedStyle(a[0]),
                    o = a[0].style.transform,
                    l = a[0].style.webkitTransform;
                  if (
                    (o && (a[0].style.transform = "none"),
                    l && (a[0].style.webkitTransform = "none"),
                    i.roundLengths)
                  )
                    T = e.isHorizontal() ? a.outerWidth(!0) : a.outerHeight(!0);
                  else {
                    const e = n(r, "width"),
                      t = n(r, "padding-left"),
                      i = n(r, "padding-right"),
                      s = n(r, "margin-left"),
                      o = n(r, "margin-right"),
                      l = r.getPropertyValue("box-sizing");
                    if (l && "border-box" === l) T = e + s + o;
                    else {
                      const { clientWidth: n, offsetWidth: r } = a[0];
                      T = e + t + i + s + o + (r - n);
                    }
                  }
                  o && (a[0].style.transform = o),
                    l && (a[0].style.webkitTransform = l),
                    i.roundLengths && (T = Math.floor(T));
                } else
                  (T = (r - (i.slidesPerView - 1) * w) / i.slidesPerView),
                    i.roundLengths && (T = Math.floor(T)),
                    d[s] && (d[s].style[t("width")] = T + "px");
                d[s] && (d[s].swiperSlideSize = T),
                  h.push(T),
                  i.centeredSlides
                    ? ((y = y + T / 2 + x / 2 + w),
                      0 === x && 0 !== s && (y = y - r / 2 - w),
                      0 === s && (y = y - r / 2 - w),
                      Math.abs(y) < 0.001 && (y = 0),
                      i.roundLengths && (y = Math.floor(y)),
                      _ % i.slidesPerGroup == 0 && p.push(y),
                      f.push(y))
                    : (i.roundLengths && (y = Math.floor(y)),
                      (_ - Math.min(e.params.slidesPerGroupSkip, _)) %
                        e.params.slidesPerGroup ==
                        0 && p.push(y),
                      f.push(y),
                      (y = y + T + w)),
                  (e.virtualSize += T + w),
                  (x = T),
                  (_ += 1);
              }
            }
            if (
              ((e.virtualSize = Math.max(e.virtualSize, r) + g),
              a &&
                o &&
                ("slide" === i.effect || "coverflow" === i.effect) &&
                s.css({ width: e.virtualSize + i.spaceBetween + "px" }),
              i.setWrapperSize &&
                s.css({ [t("width")]: e.virtualSize + i.spaceBetween + "px" }),
              E && e.grid.updateWrapperSize(T, p, t),
              !i.centeredSlides)
            ) {
              const t = [];
              for (let n = 0; n < p.length; n += 1) {
                let s = p[n];
                i.roundLengths && (s = Math.floor(s)),
                  p[n] <= e.virtualSize - r && t.push(s);
              }
              (p = t),
                Math.floor(e.virtualSize - r) - Math.floor(p[p.length - 1]) >
                  1 && p.push(e.virtualSize - r);
            }
            if ((0 === p.length && (p = [0]), 0 !== i.spaceBetween)) {
              const n = e.isHorizontal() && a ? "marginLeft" : t("marginRight");
              d.filter((e, t) => !i.cssMode || t !== d.length - 1).css({
                [n]: w + "px",
              });
            }
            if (i.centeredSlides && i.centeredSlidesBounds) {
              let e = 0;
              h.forEach((t) => {
                e += t + (i.spaceBetween ? i.spaceBetween : 0);
              });
              const t = (e -= i.spaceBetween) - r;
              p = p.map((e) => (e < 0 ? -m : e > t ? t + g : e));
            }
            if (i.centerInsufficientSlides) {
              let e = 0;
              if (
                (h.forEach((t) => {
                  e += t + (i.spaceBetween ? i.spaceBetween : 0);
                }),
                (e -= i.spaceBetween) < r)
              ) {
                const t = (r - e) / 2;
                p.forEach((e, n) => {
                  p[n] = e - t;
                }),
                  f.forEach((e, n) => {
                    f[n] = e + t;
                  });
              }
            }
            if (
              (Object.assign(e, {
                slides: d,
                snapGrid: p,
                slidesGrid: f,
                slidesSizesGrid: h,
              }),
              i.centeredSlides && i.cssMode && !i.centeredSlidesBounds)
            ) {
              k(e.wrapperEl, "--swiper-centered-offset-before", -p[0] + "px"),
                k(
                  e.wrapperEl,
                  "--swiper-centered-offset-after",
                  e.size / 2 - h[h.length - 1] / 2 + "px"
                );
              const t = -e.snapGrid[0],
                n = -e.slidesGrid[0];
              (e.snapGrid = e.snapGrid.map((e) => e + t)),
                (e.slidesGrid = e.slidesGrid.map((e) => e + n));
            }
            if (
              (u !== c && e.emit("slidesLengthChange"),
              p.length !== v &&
                (e.params.watchOverflow && e.checkOverflow(),
                e.emit("snapGridLengthChange")),
              f.length !== b && e.emit("slidesGridLengthChange"),
              i.watchSlidesProgress && e.updateSlidesOffset(),
              !(
                l ||
                i.cssMode ||
                ("slide" !== i.effect && "fade" !== i.effect)
              ))
            ) {
              const t = i.containerModifierClass + "backface-hidden",
                n = e.$el.hasClass(t);
              u <= i.maxBackfaceHiddenSlides
                ? n || e.$el.addClass(t)
                : n && e.$el.removeClass(t);
            }
          },
          updateAutoHeight: function (e) {
            const t = this,
              n = [],
              i = t.virtual && t.params.virtual.enabled;
            let s,
              r = 0;
            "number" == typeof e
              ? t.setTransition(e)
              : !0 === e && t.setTransition(t.params.speed);
            const a = (e) =>
              i
                ? t.slides.filter(
                    (t) =>
                      parseInt(
                        t.getAttribute("data-swiper-slide-index"),
                        10
                      ) === e
                  )[0]
                : t.slides.eq(e)[0];
            if ("auto" !== t.params.slidesPerView && t.params.slidesPerView > 1)
              if (t.params.centeredSlides)
                t.visibleSlides.each((e) => {
                  n.push(e);
                });
              else
                for (s = 0; s < Math.ceil(t.params.slidesPerView); s += 1) {
                  const e = t.activeIndex + s;
                  if (e > t.slides.length && !i) break;
                  n.push(a(e));
                }
            else n.push(a(t.activeIndex));
            for (s = 0; s < n.length; s += 1)
              if (void 0 !== n[s]) {
                const e = n[s].offsetHeight;
                r = e > r ? e : r;
              }
            (r || 0 === r) && t.$wrapperEl.css("height", r + "px");
          },
          updateSlidesOffset: function () {
            const e = this,
              t = e.slides;
            for (let n = 0; n < t.length; n += 1)
              t[n].swiperSlideOffset = e.isHorizontal()
                ? t[n].offsetLeft
                : t[n].offsetTop;
          },
          updateSlidesProgress: function (e) {
            void 0 === e && (e = (this && this.translate) || 0);
            const t = this,
              n = t.params,
              { slides: i, rtlTranslate: s, snapGrid: r } = t;
            if (0 === i.length) return;
            void 0 === i[0].swiperSlideOffset && t.updateSlidesOffset();
            let a = -e;
            s && (a = e),
              i.removeClass(n.slideVisibleClass),
              (t.visibleSlidesIndexes = []),
              (t.visibleSlides = []);
            for (let e = 0; e < i.length; e += 1) {
              const o = i[e];
              let l = o.swiperSlideOffset;
              n.cssMode && n.centeredSlides && (l -= i[0].swiperSlideOffset);
              const c =
                  (a + (n.centeredSlides ? t.minTranslate() : 0) - l) /
                  (o.swiperSlideSize + n.spaceBetween),
                d =
                  (a - r[0] + (n.centeredSlides ? t.minTranslate() : 0) - l) /
                  (o.swiperSlideSize + n.spaceBetween),
                u = -(a - l),
                p = u + t.slidesSizesGrid[e];
              ((u >= 0 && u < t.size - 1) ||
                (p > 1 && p <= t.size) ||
                (u <= 0 && p >= t.size)) &&
                (t.visibleSlides.push(o),
                t.visibleSlidesIndexes.push(e),
                i.eq(e).addClass(n.slideVisibleClass)),
                (o.progress = s ? -c : c),
                (o.originalProgress = s ? -d : d);
            }
            t.visibleSlides = x(t.visibleSlides);
          },
          updateProgress: function (e) {
            const t = this;
            if (void 0 === e) {
              const n = t.rtlTranslate ? -1 : 1;
              e = (t && t.translate && t.translate * n) || 0;
            }
            const n = t.params,
              i = t.maxTranslate() - t.minTranslate();
            let { progress: s, isBeginning: r, isEnd: a } = t;
            const o = r,
              l = a;
            0 === i
              ? ((s = 0), (r = !0), (a = !0))
              : ((r = (s = (e - t.minTranslate()) / i) <= 0), (a = s >= 1)),
              Object.assign(t, { progress: s, isBeginning: r, isEnd: a }),
              (n.watchSlidesProgress || (n.centeredSlides && n.autoHeight)) &&
                t.updateSlidesProgress(e),
              r && !o && t.emit("reachBeginning toEdge"),
              a && !l && t.emit("reachEnd toEdge"),
              ((o && !r) || (l && !a)) && t.emit("fromEdge"),
              t.emit("progress", s);
          },
          updateSlidesClasses: function () {
            const e = this,
              {
                slides: t,
                params: n,
                $wrapperEl: i,
                activeIndex: s,
                realIndex: r,
              } = e,
              a = e.virtual && n.virtual.enabled;
            let o;
            t.removeClass(
              `${n.slideActiveClass} ${n.slideNextClass} ${n.slidePrevClass} ${n.slideDuplicateActiveClass} ${n.slideDuplicateNextClass} ${n.slideDuplicatePrevClass}`
            ),
              (o = a
                ? e.$wrapperEl.find(
                    `.${n.slideClass}[data-swiper-slide-index="${s}"]`
                  )
                : t.eq(s)).addClass(n.slideActiveClass),
              n.loop &&
                (o.hasClass(n.slideDuplicateClass)
                  ? i
                      .children(
                        `.${n.slideClass}:not(.${n.slideDuplicateClass})[data-swiper-slide-index="${r}"]`
                      )
                      .addClass(n.slideDuplicateActiveClass)
                  : i
                      .children(
                        `.${n.slideClass}.${n.slideDuplicateClass}[data-swiper-slide-index="${r}"]`
                      )
                      .addClass(n.slideDuplicateActiveClass));
            let l = o
              .nextAll("." + n.slideClass)
              .eq(0)
              .addClass(n.slideNextClass);
            n.loop &&
              0 === l.length &&
              (l = t.eq(0)).addClass(n.slideNextClass);
            let c = o
              .prevAll("." + n.slideClass)
              .eq(0)
              .addClass(n.slidePrevClass);
            n.loop &&
              0 === c.length &&
              (c = t.eq(-1)).addClass(n.slidePrevClass),
              n.loop &&
                (l.hasClass(n.slideDuplicateClass)
                  ? i
                      .children(
                        `.${n.slideClass}:not(.${
                          n.slideDuplicateClass
                        })[data-swiper-slide-index="${l.attr(
                          "data-swiper-slide-index"
                        )}"]`
                      )
                      .addClass(n.slideDuplicateNextClass)
                  : i
                      .children(
                        `.${n.slideClass}.${
                          n.slideDuplicateClass
                        }[data-swiper-slide-index="${l.attr(
                          "data-swiper-slide-index"
                        )}"]`
                      )
                      .addClass(n.slideDuplicateNextClass),
                c.hasClass(n.slideDuplicateClass)
                  ? i
                      .children(
                        `.${n.slideClass}:not(.${
                          n.slideDuplicateClass
                        })[data-swiper-slide-index="${c.attr(
                          "data-swiper-slide-index"
                        )}"]`
                      )
                      .addClass(n.slideDuplicatePrevClass)
                  : i
                      .children(
                        `.${n.slideClass}.${
                          n.slideDuplicateClass
                        }[data-swiper-slide-index="${c.attr(
                          "data-swiper-slide-index"
                        )}"]`
                      )
                      .addClass(n.slideDuplicatePrevClass)),
              e.emitSlidesClasses();
          },
          updateActiveIndex: function (e) {
            const t = this,
              n = t.rtlTranslate ? t.translate : -t.translate,
              {
                slidesGrid: i,
                snapGrid: s,
                params: r,
                activeIndex: a,
                realIndex: o,
                snapIndex: l,
              } = t;
            let c,
              d = e;
            if (void 0 === d) {
              for (let e = 0; e < i.length; e += 1)
                void 0 !== i[e + 1]
                  ? n >= i[e] && n < i[e + 1] - (i[e + 1] - i[e]) / 2
                    ? (d = e)
                    : n >= i[e] && n < i[e + 1] && (d = e + 1)
                  : n >= i[e] && (d = e);
              r.normalizeSlideIndex && (d < 0 || void 0 === d) && (d = 0);
            }
            if (s.indexOf(n) >= 0) c = s.indexOf(n);
            else {
              const e = Math.min(r.slidesPerGroupSkip, d);
              c = e + Math.floor((d - e) / r.slidesPerGroup);
            }
            if ((c >= s.length && (c = s.length - 1), d === a))
              return void (
                c !== l && ((t.snapIndex = c), t.emit("snapIndexChange"))
              );
            const u = parseInt(
              t.slides.eq(d).attr("data-swiper-slide-index") || d,
              10
            );
            Object.assign(t, {
              snapIndex: c,
              realIndex: u,
              previousIndex: a,
              activeIndex: d,
            }),
              t.emit("activeIndexChange"),
              t.emit("snapIndexChange"),
              o !== u && t.emit("realIndexChange"),
              (t.initialized || t.params.runCallbacksOnInit) &&
                t.emit("slideChange");
          },
          updateClickedSlide: function (e) {
            const t = this,
              n = t.params,
              i = x(e).closest("." + n.slideClass)[0];
            let s,
              r = !1;
            if (i)
              for (let e = 0; e < t.slides.length; e += 1)
                if (t.slides[e] === i) {
                  (r = !0), (s = e);
                  break;
                }
            if (!i || !r)
              return (t.clickedSlide = void 0), void (t.clickedIndex = void 0);
            (t.clickedSlide = i),
              t.virtual && t.params.virtual.enabled
                ? (t.clickedIndex = parseInt(
                    x(i).attr("data-swiper-slide-index"),
                    10
                  ))
                : (t.clickedIndex = s),
              n.slideToClickedSlide &&
                void 0 !== t.clickedIndex &&
                t.clickedIndex !== t.activeIndex &&
                t.slideToClickedSlide();
          },
        },
        translate: {
          getTranslate: function (e) {
            void 0 === e && (e = this.isHorizontal() ? "x" : "y");
            const {
              params: t,
              rtlTranslate: n,
              translate: i,
              $wrapperEl: s,
            } = this;
            if (t.virtualTranslate) return n ? -i : i;
            if (t.cssMode) return i;
            let r = (function (e, t) {
              void 0 === t && (t = "x");
              const n = f();
              let i, s, r;
              const a = (function (e) {
                const t = f();
                let n;
                return (
                  t.getComputedStyle && (n = t.getComputedStyle(e, null)),
                  !n && e.currentStyle && (n = e.currentStyle),
                  n || (n = e.style),
                  n
                );
              })(e);
              return (
                n.WebKitCSSMatrix
                  ? ((s = a.transform || a.webkitTransform).split(",").length >
                      6 &&
                      (s = s
                        .split(", ")
                        .map((e) => e.replace(",", "."))
                        .join(", ")),
                    (r = new n.WebKitCSSMatrix("none" === s ? "" : s)))
                  : (i = (r =
                      a.MozTransform ||
                      a.OTransform ||
                      a.MsTransform ||
                      a.msTransform ||
                      a.transform ||
                      a
                        .getPropertyValue("transform")
                        .replace("translate(", "matrix(1, 0, 0, 1,"))
                      .toString()
                      .split(",")),
                "x" === t &&
                  (s = n.WebKitCSSMatrix
                    ? r.m41
                    : 16 === i.length
                    ? parseFloat(i[12])
                    : parseFloat(i[4])),
                "y" === t &&
                  (s = n.WebKitCSSMatrix
                    ? r.m42
                    : 16 === i.length
                    ? parseFloat(i[13])
                    : parseFloat(i[5])),
                s || 0
              );
            })(s[0], e);
            return n && (r = -r), r || 0;
          },
          setTranslate: function (e, t) {
            const n = this,
              {
                rtlTranslate: i,
                params: s,
                $wrapperEl: r,
                wrapperEl: a,
                progress: o,
              } = n;
            let l,
              c = 0,
              d = 0;
            n.isHorizontal() ? (c = i ? -e : e) : (d = e),
              s.roundLengths && ((c = Math.floor(c)), (d = Math.floor(d))),
              s.cssMode
                ? (a[n.isHorizontal() ? "scrollLeft" : "scrollTop"] =
                    n.isHorizontal() ? -c : -d)
                : s.virtualTranslate ||
                  r.transform(`translate3d(${c}px, ${d}px, 0px)`),
              (n.previousTranslate = n.translate),
              (n.translate = n.isHorizontal() ? c : d);
            const u = n.maxTranslate() - n.minTranslate();
            (l = 0 === u ? 0 : (e - n.minTranslate()) / u) !== o &&
              n.updateProgress(e),
              n.emit("setTranslate", n.translate, t);
          },
          minTranslate: function () {
            return -this.snapGrid[0];
          },
          maxTranslate: function () {
            return -this.snapGrid[this.snapGrid.length - 1];
          },
          translateTo: function (e, t, n, i, s) {
            void 0 === e && (e = 0),
              void 0 === t && (t = this.params.speed),
              void 0 === n && (n = !0),
              void 0 === i && (i = !0);
            const r = this,
              { params: a, wrapperEl: o } = r;
            if (r.animating && a.preventInteractionOnTransition) return !1;
            const l = r.minTranslate(),
              c = r.maxTranslate();
            let d;
            if (
              ((d = i && e > l ? l : i && e < c ? c : e),
              r.updateProgress(d),
              a.cssMode)
            ) {
              const e = r.isHorizontal();
              if (0 === t) o[e ? "scrollLeft" : "scrollTop"] = -d;
              else {
                if (!r.support.smoothScroll)
                  return (
                    M({
                      swiper: r,
                      targetPosition: -d,
                      side: e ? "left" : "top",
                    }),
                    !0
                  );
                o.scrollTo({ [e ? "left" : "top"]: -d, behavior: "smooth" });
              }
              return !0;
            }
            return (
              0 === t
                ? (r.setTransition(0),
                  r.setTranslate(d),
                  n &&
                    (r.emit("beforeTransitionStart", t, s),
                    r.emit("transitionEnd")))
                : (r.setTransition(t),
                  r.setTranslate(d),
                  n &&
                    (r.emit("beforeTransitionStart", t, s),
                    r.emit("transitionStart")),
                  r.animating ||
                    ((r.animating = !0),
                    r.onTranslateToWrapperTransitionEnd ||
                      (r.onTranslateToWrapperTransitionEnd = function (e) {
                        r &&
                          !r.destroyed &&
                          e.target === this &&
                          (r.$wrapperEl[0].removeEventListener(
                            "transitionend",
                            r.onTranslateToWrapperTransitionEnd
                          ),
                          r.$wrapperEl[0].removeEventListener(
                            "webkitTransitionEnd",
                            r.onTranslateToWrapperTransitionEnd
                          ),
                          (r.onTranslateToWrapperTransitionEnd = null),
                          delete r.onTranslateToWrapperTransitionEnd,
                          n && r.emit("transitionEnd"));
                      }),
                    r.$wrapperEl[0].addEventListener(
                      "transitionend",
                      r.onTranslateToWrapperTransitionEnd
                    ),
                    r.$wrapperEl[0].addEventListener(
                      "webkitTransitionEnd",
                      r.onTranslateToWrapperTransitionEnd
                    ))),
              !0
            );
          },
        },
        transition: {
          setTransition: function (e, t) {
            const n = this;
            n.params.cssMode || n.$wrapperEl.transition(e),
              n.emit("setTransition", e, t);
          },
          transitionStart: function (e, t) {
            void 0 === e && (e = !0);
            const n = this,
              { params: i } = n;
            i.cssMode ||
              (i.autoHeight && n.updateAutoHeight(),
              I({ swiper: n, runCallbacks: e, direction: t, step: "Start" }));
          },
          transitionEnd: function (e, t) {
            void 0 === e && (e = !0);
            const { params: n } = this;
            (this.animating = !1),
              n.cssMode ||
                (this.setTransition(0),
                I({
                  swiper: this,
                  runCallbacks: e,
                  direction: t,
                  step: "End",
                }));
          },
        },
        slide: {
          slideTo: function (e, t, n, i, s) {
            if (
              (void 0 === e && (e = 0),
              void 0 === t && (t = this.params.speed),
              void 0 === n && (n = !0),
              "number" != typeof e && "string" != typeof e)
            )
              throw new Error(
                `The 'index' argument cannot have type other than 'number' or 'string'. [${typeof e}] given.`
              );
            if ("string" == typeof e) {
              const t = parseInt(e, 10);
              if (!isFinite(t))
                throw new Error(
                  `The passed-in 'index' (string) couldn't be converted to 'number'. [${e}] given.`
                );
              e = t;
            }
            const r = this;
            let a = e;
            a < 0 && (a = 0);
            const {
              params: o,
              snapGrid: l,
              slidesGrid: c,
              previousIndex: d,
              activeIndex: u,
              rtlTranslate: p,
              wrapperEl: f,
              enabled: h,
            } = r;
            if (
              (r.animating && o.preventInteractionOnTransition) ||
              (!h && !i && !s)
            )
              return !1;
            const m = Math.min(r.params.slidesPerGroupSkip, a);
            let g = m + Math.floor((a - m) / r.params.slidesPerGroup);
            g >= l.length && (g = l.length - 1),
              (u || o.initialSlide || 0) === (d || 0) &&
                n &&
                r.emit("beforeSlideChangeStart");
            const v = -l[g];
            if ((r.updateProgress(v), o.normalizeSlideIndex))
              for (let e = 0; e < c.length; e += 1) {
                const t = -Math.floor(100 * v),
                  n = Math.floor(100 * c[e]),
                  i = Math.floor(100 * c[e + 1]);
                void 0 !== c[e + 1]
                  ? t >= n && t < i - (i - n) / 2
                    ? (a = e)
                    : t >= n && t < i && (a = e + 1)
                  : t >= n && (a = e);
              }
            if (r.initialized && a !== u) {
              if (!r.allowSlideNext && v < r.translate && v < r.minTranslate())
                return !1;
              if (
                !r.allowSlidePrev &&
                v > r.translate &&
                v > r.maxTranslate() &&
                (u || 0) !== a
              )
                return !1;
            }
            let b;
            if (
              ((b = a > u ? "next" : a < u ? "prev" : "reset"),
              (p && -v === r.translate) || (!p && v === r.translate))
            )
              return (
                r.updateActiveIndex(a),
                o.autoHeight && r.updateAutoHeight(),
                r.updateSlidesClasses(),
                "slide" !== o.effect && r.setTranslate(v),
                "reset" !== b &&
                  (r.transitionStart(n, b), r.transitionEnd(n, b)),
                !1
              );
            if (o.cssMode) {
              const e = r.isHorizontal(),
                n = p ? v : -v;
              if (0 === t) {
                const t = r.virtual && r.params.virtual.enabled;
                t &&
                  ((r.wrapperEl.style.scrollSnapType = "none"),
                  (r._immediateVirtual = !0)),
                  (f[e ? "scrollLeft" : "scrollTop"] = n),
                  t &&
                    requestAnimationFrame(() => {
                      (r.wrapperEl.style.scrollSnapType = ""),
                        (r._swiperImmediateVirtual = !1);
                    });
              } else {
                if (!r.support.smoothScroll)
                  return (
                    M({
                      swiper: r,
                      targetPosition: n,
                      side: e ? "left" : "top",
                    }),
                    !0
                  );
                f.scrollTo({ [e ? "left" : "top"]: n, behavior: "smooth" });
              }
              return !0;
            }
            return (
              r.setTransition(t),
              r.setTranslate(v),
              r.updateActiveIndex(a),
              r.updateSlidesClasses(),
              r.emit("beforeTransitionStart", t, i),
              r.transitionStart(n, b),
              0 === t
                ? r.transitionEnd(n, b)
                : r.animating ||
                  ((r.animating = !0),
                  r.onSlideToWrapperTransitionEnd ||
                    (r.onSlideToWrapperTransitionEnd = function (e) {
                      r &&
                        !r.destroyed &&
                        e.target === this &&
                        (r.$wrapperEl[0].removeEventListener(
                          "transitionend",
                          r.onSlideToWrapperTransitionEnd
                        ),
                        r.$wrapperEl[0].removeEventListener(
                          "webkitTransitionEnd",
                          r.onSlideToWrapperTransitionEnd
                        ),
                        (r.onSlideToWrapperTransitionEnd = null),
                        delete r.onSlideToWrapperTransitionEnd,
                        r.transitionEnd(n, b));
                    }),
                  r.$wrapperEl[0].addEventListener(
                    "transitionend",
                    r.onSlideToWrapperTransitionEnd
                  ),
                  r.$wrapperEl[0].addEventListener(
                    "webkitTransitionEnd",
                    r.onSlideToWrapperTransitionEnd
                  )),
              !0
            );
          },
          slideToLoop: function (e, t, n, i) {
            void 0 === e && (e = 0),
              void 0 === t && (t = this.params.speed),
              void 0 === n && (n = !0);
            const s = this;
            let r = e;
            return (
              s.params.loop && (r += s.loopedSlides), s.slideTo(r, t, n, i)
            );
          },
          slideNext: function (e, t, n) {
            void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
            const i = this,
              { animating: s, enabled: r, params: a } = i;
            if (!r) return i;
            let o = a.slidesPerGroup;
            "auto" === a.slidesPerView &&
              1 === a.slidesPerGroup &&
              a.slidesPerGroupAuto &&
              (o = Math.max(i.slidesPerViewDynamic("current", !0), 1));
            const l = i.activeIndex < a.slidesPerGroupSkip ? 1 : o;
            if (a.loop) {
              if (s && a.loopPreventsSlide) return !1;
              i.loopFix(), (i._clientLeft = i.$wrapperEl[0].clientLeft);
            }
            return a.rewind && i.isEnd
              ? i.slideTo(0, e, t, n)
              : i.slideTo(i.activeIndex + l, e, t, n);
          },
          slidePrev: function (e, t, n) {
            void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
            const i = this,
              {
                params: s,
                animating: r,
                snapGrid: a,
                slidesGrid: o,
                rtlTranslate: l,
                enabled: c,
              } = i;
            if (!c) return i;
            if (s.loop) {
              if (r && s.loopPreventsSlide) return !1;
              i.loopFix(), (i._clientLeft = i.$wrapperEl[0].clientLeft);
            }
            function d(e) {
              return e < 0 ? -Math.floor(Math.abs(e)) : Math.floor(e);
            }
            const u = d(l ? i.translate : -i.translate),
              p = a.map((e) => d(e));
            let f = a[p.indexOf(u) - 1];
            if (void 0 === f && s.cssMode) {
              let e;
              a.forEach((t, n) => {
                u >= t && (e = n);
              }),
                void 0 !== e && (f = a[e > 0 ? e - 1 : e]);
            }
            let h = 0;
            if (
              (void 0 !== f &&
                ((h = o.indexOf(f)) < 0 && (h = i.activeIndex - 1),
                "auto" === s.slidesPerView &&
                  1 === s.slidesPerGroup &&
                  s.slidesPerGroupAuto &&
                  ((h = h - i.slidesPerViewDynamic("previous", !0) + 1),
                  (h = Math.max(h, 0)))),
              s.rewind && i.isBeginning)
            ) {
              const s =
                i.params.virtual && i.params.virtual.enabled && i.virtual
                  ? i.virtual.slides.length - 1
                  : i.slides.length - 1;
              return i.slideTo(s, e, t, n);
            }
            return i.slideTo(h, e, t, n);
          },
          slideReset: function (e, t, n) {
            return (
              void 0 === e && (e = this.params.speed),
              void 0 === t && (t = !0),
              this.slideTo(this.activeIndex, e, t, n)
            );
          },
          slideToClosest: function (e, t, n, i) {
            void 0 === e && (e = this.params.speed),
              void 0 === t && (t = !0),
              void 0 === i && (i = 0.5);
            const s = this;
            let r = s.activeIndex;
            const a = Math.min(s.params.slidesPerGroupSkip, r),
              o = a + Math.floor((r - a) / s.params.slidesPerGroup),
              l = s.rtlTranslate ? s.translate : -s.translate;
            if (l >= s.snapGrid[o]) {
              const e = s.snapGrid[o];
              l - e > (s.snapGrid[o + 1] - e) * i &&
                (r += s.params.slidesPerGroup);
            } else {
              const e = s.snapGrid[o - 1];
              l - e <= (s.snapGrid[o] - e) * i &&
                (r -= s.params.slidesPerGroup);
            }
            return (
              (r = Math.max(r, 0)),
              (r = Math.min(r, s.slidesGrid.length - 1)),
              s.slideTo(r, e, t, n)
            );
          },
          slideToClickedSlide: function () {
            const e = this,
              { params: t, $wrapperEl: n } = e,
              i =
                "auto" === t.slidesPerView
                  ? e.slidesPerViewDynamic()
                  : t.slidesPerView;
            let s,
              r = e.clickedIndex;
            if (t.loop) {
              if (e.animating) return;
              (s = parseInt(
                x(e.clickedSlide).attr("data-swiper-slide-index"),
                10
              )),
                t.centeredSlides
                  ? r < e.loopedSlides - i / 2 ||
                    r > e.slides.length - e.loopedSlides + i / 2
                    ? (e.loopFix(),
                      (r = n
                        .children(
                          `.${t.slideClass}[data-swiper-slide-index="${s}"]:not(.${t.slideDuplicateClass})`
                        )
                        .eq(0)
                        .index()),
                      _(() => {
                        e.slideTo(r);
                      }))
                    : e.slideTo(r)
                  : r > e.slides.length - i
                  ? (e.loopFix(),
                    (r = n
                      .children(
                        `.${t.slideClass}[data-swiper-slide-index="${s}"]:not(.${t.slideDuplicateClass})`
                      )
                      .eq(0)
                      .index()),
                    _(() => {
                      e.slideTo(r);
                    }))
                  : e.slideTo(r);
            } else e.slideTo(r);
          },
        },
        loop: {
          loopCreate: function () {
            const e = this,
              t = u(),
              { params: n, $wrapperEl: i } = e,
              s = i.children().length > 0 ? x(i.children()[0].parentNode) : i;
            s.children(`.${n.slideClass}.${n.slideDuplicateClass}`).remove();
            let r = s.children("." + n.slideClass);
            if (n.loopFillGroupWithBlank) {
              const e = n.slidesPerGroup - (r.length % n.slidesPerGroup);
              if (e !== n.slidesPerGroup) {
                for (let i = 0; i < e; i += 1) {
                  const e = x(t.createElement("div")).addClass(
                    `${n.slideClass} ${n.slideBlankClass}`
                  );
                  s.append(e);
                }
                r = s.children("." + n.slideClass);
              }
            }
            "auto" !== n.slidesPerView ||
              n.loopedSlides ||
              (n.loopedSlides = r.length),
              (e.loopedSlides = Math.ceil(
                parseFloat(n.loopedSlides || n.slidesPerView, 10)
              )),
              (e.loopedSlides += n.loopAdditionalSlides),
              e.loopedSlides > r.length && (e.loopedSlides = r.length);
            const a = [],
              o = [];
            r.each((t, n) => {
              const i = x(t);
              n < e.loopedSlides && o.push(t),
                n < r.length && n >= r.length - e.loopedSlides && a.push(t),
                i.attr("data-swiper-slide-index", n);
            });
            for (let e = 0; e < o.length; e += 1)
              s.append(x(o[e].cloneNode(!0)).addClass(n.slideDuplicateClass));
            for (let e = a.length - 1; e >= 0; e -= 1)
              s.prepend(x(a[e].cloneNode(!0)).addClass(n.slideDuplicateClass));
          },
          loopFix: function () {
            const e = this;
            e.emit("beforeLoopFix");
            const {
              activeIndex: t,
              slides: n,
              loopedSlides: i,
              allowSlidePrev: s,
              allowSlideNext: r,
              snapGrid: a,
              rtlTranslate: o,
            } = e;
            let l;
            (e.allowSlidePrev = !0), (e.allowSlideNext = !0);
            const c = -a[t] - e.getTranslate();
            t < i
              ? ((l = n.length - 3 * i + t),
                (l += i),
                e.slideTo(l, 0, !1, !0) &&
                  0 !== c &&
                  e.setTranslate((o ? -e.translate : e.translate) - c))
              : t >= n.length - i &&
                ((l = -n.length + t + i),
                (l += i),
                e.slideTo(l, 0, !1, !0) &&
                  0 !== c &&
                  e.setTranslate((o ? -e.translate : e.translate) - c)),
              (e.allowSlidePrev = s),
              (e.allowSlideNext = r),
              e.emit("loopFix");
          },
          loopDestroy: function () {
            const { $wrapperEl: e, params: t, slides: n } = this;
            e
              .children(
                `.${t.slideClass}.${t.slideDuplicateClass},.${t.slideClass}.${t.slideBlankClass}`
              )
              .remove(),
              n.removeAttr("data-swiper-slide-index");
          },
        },
        grabCursor: {
          setGrabCursor: function (e) {
            if (
              this.support.touch ||
              !this.params.simulateTouch ||
              (this.params.watchOverflow && this.isLocked) ||
              this.params.cssMode
            )
              return;
            const t =
              "container" === this.params.touchEventsTarget
                ? this.el
                : this.wrapperEl;
            (t.style.cursor = "move"),
              (t.style.cursor = e ? "grabbing" : "grab");
          },
          unsetGrabCursor: function () {
            this.support.touch ||
              (this.params.watchOverflow && this.isLocked) ||
              this.params.cssMode ||
              (this[
                "container" === this.params.touchEventsTarget
                  ? "el"
                  : "wrapperEl"
              ].style.cursor = "");
          },
        },
        events: {
          attachEvents: function () {
            const e = this,
              t = u(),
              { params: n, support: i } = e;
            (e.onTouchStart = function (e) {
              const t = this,
                n = u(),
                i = f(),
                s = t.touchEventsData,
                { params: r, touches: a, enabled: o } = t;
              if (!o) return;
              if (t.animating && r.preventInteractionOnTransition) return;
              !t.animating && r.cssMode && r.loop && t.loopFix();
              let l = e;
              l.originalEvent && (l = l.originalEvent);
              let c = x(l.target);
              if (
                "wrapper" === r.touchEventsTarget &&
                !c.closest(t.wrapperEl).length
              )
                return;
              if (
                ((s.isTouchEvent = "touchstart" === l.type),
                !s.isTouchEvent && "which" in l && 3 === l.which)
              )
                return;
              if (!s.isTouchEvent && "button" in l && l.button > 0) return;
              if (s.isTouched && s.isMoved) return;
              r.noSwipingClass &&
                "" !== r.noSwipingClass &&
                l.target &&
                l.target.shadowRoot &&
                e.path &&
                e.path[0] &&
                (c = x(e.path[0]));
              const d = r.noSwipingSelector
                  ? r.noSwipingSelector
                  : "." + r.noSwipingClass,
                p = !(!l.target || !l.target.shadowRoot);
              if (
                r.noSwiping &&
                (p
                  ? (function (e, t) {
                      return (
                        void 0 === t && (t = this),
                        (function t(n) {
                          return n && n !== u() && n !== f()
                            ? (n.assignedSlot && (n = n.assignedSlot),
                              n.closest(e) || t(n.getRootNode().host))
                            : null;
                        })(t)
                      );
                    })(d, l.target)
                  : c.closest(d)[0])
              )
                return void (t.allowClick = !0);
              if (r.swipeHandler && !c.closest(r.swipeHandler)[0]) return;
              (a.currentX =
                "touchstart" === l.type ? l.targetTouches[0].pageX : l.pageX),
                (a.currentY =
                  "touchstart" === l.type ? l.targetTouches[0].pageY : l.pageY);
              const h = a.currentX,
                m = a.currentY,
                g = r.edgeSwipeDetection || r.iOSEdgeSwipeDetection,
                v = r.edgeSwipeThreshold || r.iOSEdgeSwipeThreshold;
              if (g && (h <= v || h >= i.innerWidth - v)) {
                if ("prevent" !== g) return;
                e.preventDefault();
              }
              if (
                (Object.assign(s, {
                  isTouched: !0,
                  isMoved: !1,
                  allowTouchCallbacks: !0,
                  isScrolling: void 0,
                  startMoving: void 0,
                }),
                (a.startX = h),
                (a.startY = m),
                (s.touchStartTime = E()),
                (t.allowClick = !0),
                t.updateSize(),
                (t.swipeDirection = void 0),
                r.threshold > 0 && (s.allowThresholdMove = !1),
                "touchstart" !== l.type)
              ) {
                let e = !0;
                c.is(s.focusableElements) &&
                  ((e = !1), "SELECT" === c[0].nodeName && (s.isTouched = !1)),
                  n.activeElement &&
                    x(n.activeElement).is(s.focusableElements) &&
                    n.activeElement !== c[0] &&
                    n.activeElement.blur();
                const i = e && t.allowTouchMove && r.touchStartPreventDefault;
                (!r.touchStartForcePreventDefault && !i) ||
                  c[0].isContentEditable ||
                  l.preventDefault();
              }
              t.params.freeMode &&
                t.params.freeMode.enabled &&
                t.freeMode &&
                t.animating &&
                !r.cssMode &&
                t.freeMode.onTouchStart(),
                t.emit("touchStart", l);
            }.bind(e)),
              (e.onTouchMove = function (e) {
                const t = u(),
                  n = this,
                  i = n.touchEventsData,
                  { params: s, touches: r, rtlTranslate: a, enabled: o } = n;
                if (!o) return;
                let l = e;
                if ((l.originalEvent && (l = l.originalEvent), !i.isTouched))
                  return void (
                    i.startMoving &&
                    i.isScrolling &&
                    n.emit("touchMoveOpposite", l)
                  );
                if (i.isTouchEvent && "touchmove" !== l.type) return;
                const c =
                    "touchmove" === l.type &&
                    l.targetTouches &&
                    (l.targetTouches[0] || l.changedTouches[0]),
                  d = "touchmove" === l.type ? c.pageX : l.pageX,
                  p = "touchmove" === l.type ? c.pageY : l.pageY;
                if (l.preventedByNestedSwiper)
                  return (r.startX = d), void (r.startY = p);
                if (!n.allowTouchMove)
                  return (
                    x(l.target).is(i.focusableElements) || (n.allowClick = !1),
                    void (
                      i.isTouched &&
                      (Object.assign(r, {
                        startX: d,
                        startY: p,
                        currentX: d,
                        currentY: p,
                      }),
                      (i.touchStartTime = E()))
                    )
                  );
                if (i.isTouchEvent && s.touchReleaseOnEdges && !s.loop)
                  if (n.isVertical()) {
                    if (
                      (p < r.startY && n.translate <= n.maxTranslate()) ||
                      (p > r.startY && n.translate >= n.minTranslate())
                    )
                      return (i.isTouched = !1), void (i.isMoved = !1);
                  } else if (
                    (d < r.startX && n.translate <= n.maxTranslate()) ||
                    (d > r.startX && n.translate >= n.minTranslate())
                  )
                    return;
                if (
                  i.isTouchEvent &&
                  t.activeElement &&
                  l.target === t.activeElement &&
                  x(l.target).is(i.focusableElements)
                )
                  return (i.isMoved = !0), void (n.allowClick = !1);
                if (
                  (i.allowTouchCallbacks && n.emit("touchMove", l),
                  l.targetTouches && l.targetTouches.length > 1)
                )
                  return;
                (r.currentX = d), (r.currentY = p);
                const f = r.currentX - r.startX,
                  h = r.currentY - r.startY;
                if (
                  n.params.threshold &&
                  Math.sqrt(f ** 2 + h ** 2) < n.params.threshold
                )
                  return;
                if (void 0 === i.isScrolling) {
                  let e;
                  (n.isHorizontal() && r.currentY === r.startY) ||
                  (n.isVertical() && r.currentX === r.startX)
                    ? (i.isScrolling = !1)
                    : f * f + h * h >= 25 &&
                      ((e =
                        (180 * Math.atan2(Math.abs(h), Math.abs(f))) / Math.PI),
                      (i.isScrolling = n.isHorizontal()
                        ? e > s.touchAngle
                        : 90 - e > s.touchAngle));
                }
                if (
                  (i.isScrolling && n.emit("touchMoveOpposite", l),
                  void 0 === i.startMoving &&
                    ((r.currentX === r.startX && r.currentY === r.startY) ||
                      (i.startMoving = !0)),
                  i.isScrolling)
                )
                  return void (i.isTouched = !1);
                if (!i.startMoving) return;
                (n.allowClick = !1),
                  !s.cssMode && l.cancelable && l.preventDefault(),
                  s.touchMoveStopPropagation &&
                    !s.nested &&
                    l.stopPropagation(),
                  i.isMoved ||
                    (s.loop && !s.cssMode && n.loopFix(),
                    (i.startTranslate = n.getTranslate()),
                    n.setTransition(0),
                    n.animating &&
                      n.$wrapperEl.trigger("webkitTransitionEnd transitionend"),
                    (i.allowMomentumBounce = !1),
                    !s.grabCursor ||
                      (!0 !== n.allowSlideNext && !0 !== n.allowSlidePrev) ||
                      n.setGrabCursor(!0),
                    n.emit("sliderFirstMove", l)),
                  n.emit("sliderMove", l),
                  (i.isMoved = !0);
                let m = n.isHorizontal() ? f : h;
                (r.diff = m),
                  (m *= s.touchRatio),
                  a && (m = -m),
                  (n.swipeDirection = m > 0 ? "prev" : "next"),
                  (i.currentTranslate = m + i.startTranslate);
                let g = !0,
                  v = s.resistanceRatio;
                if (
                  (s.touchReleaseOnEdges && (v = 0),
                  m > 0 && i.currentTranslate > n.minTranslate()
                    ? ((g = !1),
                      s.resistance &&
                        (i.currentTranslate =
                          n.minTranslate() -
                          1 +
                          (-n.minTranslate() + i.startTranslate + m) ** v))
                    : m < 0 &&
                      i.currentTranslate < n.maxTranslate() &&
                      ((g = !1),
                      s.resistance &&
                        (i.currentTranslate =
                          n.maxTranslate() +
                          1 -
                          (n.maxTranslate() - i.startTranslate - m) ** v)),
                  g && (l.preventedByNestedSwiper = !0),
                  !n.allowSlideNext &&
                    "next" === n.swipeDirection &&
                    i.currentTranslate < i.startTranslate &&
                    (i.currentTranslate = i.startTranslate),
                  !n.allowSlidePrev &&
                    "prev" === n.swipeDirection &&
                    i.currentTranslate > i.startTranslate &&
                    (i.currentTranslate = i.startTranslate),
                  n.allowSlidePrev ||
                    n.allowSlideNext ||
                    (i.currentTranslate = i.startTranslate),
                  s.threshold > 0)
                ) {
                  if (!(Math.abs(m) > s.threshold || i.allowThresholdMove))
                    return void (i.currentTranslate = i.startTranslate);
                  if (!i.allowThresholdMove)
                    return (
                      (i.allowThresholdMove = !0),
                      (r.startX = r.currentX),
                      (r.startY = r.currentY),
                      (i.currentTranslate = i.startTranslate),
                      void (r.diff = n.isHorizontal()
                        ? r.currentX - r.startX
                        : r.currentY - r.startY)
                    );
                }
                s.followFinger &&
                  !s.cssMode &&
                  (((s.freeMode && s.freeMode.enabled && n.freeMode) ||
                    s.watchSlidesProgress) &&
                    (n.updateActiveIndex(), n.updateSlidesClasses()),
                  n.params.freeMode &&
                    s.freeMode.enabled &&
                    n.freeMode &&
                    n.freeMode.onTouchMove(),
                  n.updateProgress(i.currentTranslate),
                  n.setTranslate(i.currentTranslate));
              }.bind(e)),
              (e.onTouchEnd = function (e) {
                const t = this,
                  n = t.touchEventsData,
                  {
                    params: i,
                    touches: s,
                    rtlTranslate: r,
                    slidesGrid: a,
                    enabled: o,
                  } = t;
                if (!o) return;
                let l = e;
                if (
                  (l.originalEvent && (l = l.originalEvent),
                  n.allowTouchCallbacks && t.emit("touchEnd", l),
                  (n.allowTouchCallbacks = !1),
                  !n.isTouched)
                )
                  return (
                    n.isMoved && i.grabCursor && t.setGrabCursor(!1),
                    (n.isMoved = !1),
                    void (n.startMoving = !1)
                  );
                i.grabCursor &&
                  n.isMoved &&
                  n.isTouched &&
                  (!0 === t.allowSlideNext || !0 === t.allowSlidePrev) &&
                  t.setGrabCursor(!1);
                const c = E(),
                  d = c - n.touchStartTime;
                if (t.allowClick) {
                  const e = l.path || (l.composedPath && l.composedPath());
                  t.updateClickedSlide((e && e[0]) || l.target),
                    t.emit("tap click", l),
                    d < 300 &&
                      c - n.lastClickTime < 300 &&
                      t.emit("doubleTap doubleClick", l);
                }
                if (
                  ((n.lastClickTime = E()),
                  _(() => {
                    t.destroyed || (t.allowClick = !0);
                  }),
                  !n.isTouched ||
                    !n.isMoved ||
                    !t.swipeDirection ||
                    0 === s.diff ||
                    n.currentTranslate === n.startTranslate)
                )
                  return (
                    (n.isTouched = !1),
                    (n.isMoved = !1),
                    void (n.startMoving = !1)
                  );
                let u;
                if (
                  ((n.isTouched = !1),
                  (n.isMoved = !1),
                  (n.startMoving = !1),
                  (u = i.followFinger
                    ? r
                      ? t.translate
                      : -t.translate
                    : -n.currentTranslate),
                  i.cssMode)
                )
                  return;
                if (t.params.freeMode && i.freeMode.enabled)
                  return void t.freeMode.onTouchEnd({ currentPos: u });
                let p = 0,
                  f = t.slidesSizesGrid[0];
                for (
                  let e = 0;
                  e < a.length;
                  e += e < i.slidesPerGroupSkip ? 1 : i.slidesPerGroup
                ) {
                  const t = e < i.slidesPerGroupSkip - 1 ? 1 : i.slidesPerGroup;
                  void 0 !== a[e + t]
                    ? u >= a[e] &&
                      u < a[e + t] &&
                      ((p = e), (f = a[e + t] - a[e]))
                    : u >= a[e] &&
                      ((p = e), (f = a[a.length - 1] - a[a.length - 2]));
                }
                let h = null,
                  m = null;
                i.rewind &&
                  (t.isBeginning
                    ? (m =
                        t.params.virtual &&
                        t.params.virtual.enabled &&
                        t.virtual
                          ? t.virtual.slides.length - 1
                          : t.slides.length - 1)
                    : t.isEnd && (h = 0));
                const g = (u - a[p]) / f,
                  v = p < i.slidesPerGroupSkip - 1 ? 1 : i.slidesPerGroup;
                if (d > i.longSwipesMs) {
                  if (!i.longSwipes) return void t.slideTo(t.activeIndex);
                  "next" === t.swipeDirection &&
                    (g >= i.longSwipesRatio
                      ? t.slideTo(i.rewind && t.isEnd ? h : p + v)
                      : t.slideTo(p)),
                    "prev" === t.swipeDirection &&
                      (g > 1 - i.longSwipesRatio
                        ? t.slideTo(p + v)
                        : null !== m && g < 0 && Math.abs(g) > i.longSwipesRatio
                        ? t.slideTo(m)
                        : t.slideTo(p));
                } else {
                  if (!i.shortSwipes) return void t.slideTo(t.activeIndex);
                  !t.navigation ||
                  (l.target !== t.navigation.nextEl &&
                    l.target !== t.navigation.prevEl)
                    ? ("next" === t.swipeDirection &&
                        t.slideTo(null !== h ? h : p + v),
                      "prev" === t.swipeDirection &&
                        t.slideTo(null !== m ? m : p))
                    : l.target === t.navigation.nextEl
                    ? t.slideTo(p + v)
                    : t.slideTo(p);
                }
              }.bind(e)),
              n.cssMode &&
                (e.onScroll = function () {
                  const e = this,
                    { wrapperEl: t, rtlTranslate: n, enabled: i } = e;
                  if (!i) return;
                  let s;
                  (e.previousTranslate = e.translate),
                    e.isHorizontal()
                      ? (e.translate = -t.scrollLeft)
                      : (e.translate = -t.scrollTop),
                    0 === e.translate && (e.translate = 0),
                    e.updateActiveIndex(),
                    e.updateSlidesClasses();
                  const r = e.maxTranslate() - e.minTranslate();
                  (s = 0 === r ? 0 : (e.translate - e.minTranslate()) / r) !==
                    e.progress &&
                    e.updateProgress(n ? -e.translate : e.translate),
                    e.emit("setTranslate", e.translate, !1);
                }.bind(e)),
              (e.onClick = function (e) {
                const t = this;
                t.enabled &&
                  (t.allowClick ||
                    (t.params.preventClicks && e.preventDefault(),
                    t.params.preventClicksPropagation &&
                      t.animating &&
                      (e.stopPropagation(), e.stopImmediatePropagation())));
              }.bind(e)),
              i.touch && !z && (t.addEventListener("touchstart", N), (z = !0)),
              R(e, "on");
          },
          detachEvents: function () {
            R(this, "off");
          },
        },
        breakpoints: {
          setBreakpoint: function () {
            const e = this,
              {
                activeIndex: t,
                initialized: n,
                loopedSlides: i = 0,
                params: s,
                $el: r,
              } = e,
              a = s.breakpoints;
            if (!a || (a && 0 === Object.keys(a).length)) return;
            const o = e.getBreakpoint(a, e.params.breakpointsBase, e.el);
            if (!o || e.currentBreakpoint === o) return;
            const l = (o in a ? a[o] : void 0) || e.originalParams,
              c = D(e, s),
              d = D(e, l),
              u = s.enabled;
            c && !d
              ? (r.removeClass(
                  `${s.containerModifierClass}grid ${s.containerModifierClass}grid-column`
                ),
                e.emitContainerClasses())
              : !c &&
                d &&
                (r.addClass(s.containerModifierClass + "grid"),
                ((l.grid.fill && "column" === l.grid.fill) ||
                  (!l.grid.fill && "column" === s.grid.fill)) &&
                  r.addClass(s.containerModifierClass + "grid-column"),
                e.emitContainerClasses());
            const p = l.direction && l.direction !== s.direction,
              f = s.loop && (l.slidesPerView !== s.slidesPerView || p);
            p && n && e.changeDirection(), S(e.params, l);
            const h = e.params.enabled;
            Object.assign(e, {
              allowTouchMove: e.params.allowTouchMove,
              allowSlideNext: e.params.allowSlideNext,
              allowSlidePrev: e.params.allowSlidePrev,
            }),
              u && !h ? e.disable() : !u && h && e.enable(),
              (e.currentBreakpoint = o),
              e.emit("_beforeBreakpoint", l),
              f &&
                n &&
                (e.loopDestroy(),
                e.loopCreate(),
                e.updateSlides(),
                e.slideTo(t - i + e.loopedSlides, 0, !1)),
              e.emit("breakpoint", l);
          },
          getBreakpoint: function (e, t, n) {
            if (
              (void 0 === t && (t = "window"), !e || ("container" === t && !n))
            )
              return;
            let i = !1;
            const s = f(),
              r = "window" === t ? s.innerHeight : n.clientHeight,
              a = Object.keys(e).map((e) => {
                if ("string" == typeof e && 0 === e.indexOf("@")) {
                  const t = parseFloat(e.substr(1));
                  return { value: r * t, point: e };
                }
                return { value: e, point: e };
              });
            a.sort((e, t) => parseInt(e.value, 10) - parseInt(t.value, 10));
            for (let e = 0; e < a.length; e += 1) {
              const { point: r, value: o } = a[e];
              "window" === t
                ? s.matchMedia(`(min-width: ${o}px)`).matches && (i = r)
                : o <= n.clientWidth && (i = r);
            }
            return i || "max";
          },
        },
        checkOverflow: {
          checkOverflow: function () {
            const e = this,
              { isLocked: t, params: n } = e,
              { slidesOffsetBefore: i } = n;
            if (i) {
              const t = e.slides.length - 1,
                n = e.slidesGrid[t] + e.slidesSizesGrid[t] + 2 * i;
              e.isLocked = e.size > n;
            } else e.isLocked = 1 === e.snapGrid.length;
            !0 === n.allowSlideNext && (e.allowSlideNext = !e.isLocked),
              !0 === n.allowSlidePrev && (e.allowSlidePrev = !e.isLocked),
              t && t !== e.isLocked && (e.isEnd = !1),
              t !== e.isLocked && e.emit(e.isLocked ? "lock" : "unlock");
          },
        },
        classes: {
          addClasses: function () {
            const {
                classNames: e,
                params: t,
                rtl: n,
                $el: i,
                device: s,
                support: r,
              } = this,
              a = (function (e, t) {
                const n = [];
                return (
                  e.forEach((e) => {
                    "object" == typeof e
                      ? Object.keys(e).forEach((i) => {
                          e[i] && n.push(t + i);
                        })
                      : "string" == typeof e && n.push(t + e);
                  }),
                  n
                );
              })(
                [
                  "initialized",
                  t.direction,
                  { "pointer-events": !r.touch },
                  { "free-mode": this.params.freeMode && t.freeMode.enabled },
                  { autoheight: t.autoHeight },
                  { rtl: n },
                  { grid: t.grid && t.grid.rows > 1 },
                  {
                    "grid-column":
                      t.grid && t.grid.rows > 1 && "column" === t.grid.fill,
                  },
                  { android: s.android },
                  { ios: s.ios },
                  { "css-mode": t.cssMode },
                  { centered: t.cssMode && t.centeredSlides },
                ],
                t.containerModifierClass
              );
            e.push(...a),
              i.addClass([...e].join(" ")),
              this.emitContainerClasses();
          },
          removeClasses: function () {
            const { $el: e, classNames: t } = this;
            e.removeClass(t.join(" ")), this.emitContainerClasses();
          },
        },
        images: {
          loadImage: function (e, t, n, i, s, r) {
            const a = f();
            let o;
            function l() {
              r && r();
            }
            x(e).parent("picture")[0] || (e.complete && s)
              ? l()
              : t
              ? (((o = new a.Image()).onload = l),
                (o.onerror = l),
                i && (o.sizes = i),
                n && (o.srcset = n),
                t && (o.src = t))
              : l();
          },
          preloadImages: function () {
            const e = this;
            function t() {
              null != e &&
                e &&
                !e.destroyed &&
                (void 0 !== e.imagesLoaded && (e.imagesLoaded += 1),
                e.imagesLoaded === e.imagesToLoad.length &&
                  (e.params.updateOnImagesReady && e.update(),
                  e.emit("imagesReady")));
            }
            e.imagesToLoad = e.$el.find("img");
            for (let n = 0; n < e.imagesToLoad.length; n += 1) {
              const i = e.imagesToLoad[n];
              e.loadImage(
                i,
                i.currentSrc || i.getAttribute("src"),
                i.srcset || i.getAttribute("srcset"),
                i.sizes || i.getAttribute("sizes"),
                !0,
                t
              );
            }
          },
        },
      },
      F = {};
    class G {
      constructor() {
        let e, t;
        for (var n = arguments.length, i = new Array(n), s = 0; s < n; s++)
          i[s] = arguments[s];
        if (
          (1 === i.length &&
          i[0].constructor &&
          "Object" === Object.prototype.toString.call(i[0]).slice(8, -1)
            ? (t = i[0])
            : ([e, t] = i),
          t || (t = {}),
          (t = S({}, t)),
          e && !t.el && (t.el = e),
          t.el && x(t.el).length > 1)
        ) {
          const e = [];
          return (
            x(t.el).each((n) => {
              const i = S({}, t, { el: n });
              e.push(new G(i));
            }),
            e
          );
        }
        const r = this;
        (r.__swiper__ = !0),
          (r.support = P()),
          (r.device = (function (e) {
            return (
              void 0 === e && (e = {}),
              A ||
                (A = (function (e) {
                  let { userAgent: t } = void 0 === e ? {} : e;
                  const n = P(),
                    i = f(),
                    s = i.navigator.platform,
                    r = t || i.navigator.userAgent,
                    a = { ios: !1, android: !1 },
                    o = i.screen.width,
                    l = i.screen.height,
                    c = r.match(/(Android);?[\s\/]+([\d.]+)?/);
                  let d = r.match(/(iPad).*OS\s([\d_]+)/);
                  const u = r.match(/(iPod)(.*OS\s([\d_]+))?/),
                    p = !d && r.match(/(iPhone\sOS|iOS)\s([\d_]+)/),
                    h = "Win32" === s;
                  let m = "MacIntel" === s;
                  return (
                    !d &&
                      m &&
                      n.touch &&
                      [
                        "1024x1366",
                        "1366x1024",
                        "834x1194",
                        "1194x834",
                        "834x1112",
                        "1112x834",
                        "768x1024",
                        "1024x768",
                        "820x1180",
                        "1180x820",
                        "810x1080",
                        "1080x810",
                      ].indexOf(`${o}x${l}`) >= 0 &&
                      ((d = r.match(/(Version)\/([\d.]+)/)) ||
                        (d = [0, 1, "13_0_0"]),
                      (m = !1)),
                    c && !h && ((a.os = "android"), (a.android = !0)),
                    (d || p || u) && ((a.os = "ios"), (a.ios = !0)),
                    a
                  );
                })(e)),
              A
            );
          })({ userAgent: t.userAgent })),
          (r.browser =
            (L ||
              (L = (function () {
                const e = f();
                return {
                  isSafari: (function () {
                    const t = e.navigator.userAgent.toLowerCase();
                    return (
                      t.indexOf("safari") >= 0 &&
                      t.indexOf("chrome") < 0 &&
                      t.indexOf("android") < 0
                    );
                  })(),
                  isWebView:
                    /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(
                      e.navigator.userAgent
                    ),
                };
              })()),
            L)),
          (r.eventsListeners = {}),
          (r.eventsAnyListeners = []),
          (r.modules = [...r.__modules__]),
          t.modules && Array.isArray(t.modules) && r.modules.push(...t.modules);
        const a = {};
        r.modules.forEach((e) => {
          e({
            swiper: r,
            extendParams: B(t, a),
            on: r.on.bind(r),
            once: r.once.bind(r),
            off: r.off.bind(r),
            emit: r.emit.bind(r),
          });
        });
        const o = S({}, j, a);
        return (
          (r.params = S({}, o, F, t)),
          (r.originalParams = S({}, r.params)),
          (r.passedParams = S({}, t)),
          r.params &&
            r.params.on &&
            Object.keys(r.params.on).forEach((e) => {
              r.on(e, r.params.on[e]);
            }),
          r.params && r.params.onAny && r.onAny(r.params.onAny),
          (r.$ = x),
          Object.assign(r, {
            enabled: r.params.enabled,
            el: e,
            classNames: [],
            slides: x(),
            slidesGrid: [],
            snapGrid: [],
            slidesSizesGrid: [],
            isHorizontal: () => "horizontal" === r.params.direction,
            isVertical: () => "vertical" === r.params.direction,
            activeIndex: 0,
            realIndex: 0,
            isBeginning: !0,
            isEnd: !1,
            translate: 0,
            previousTranslate: 0,
            progress: 0,
            velocity: 0,
            animating: !1,
            allowSlideNext: r.params.allowSlideNext,
            allowSlidePrev: r.params.allowSlidePrev,
            touchEvents: (function () {
              const e = ["touchstart", "touchmove", "touchend", "touchcancel"],
                t = ["pointerdown", "pointermove", "pointerup"];
              return (
                (r.touchEventsTouch = {
                  start: e[0],
                  move: e[1],
                  end: e[2],
                  cancel: e[3],
                }),
                (r.touchEventsDesktop = { start: t[0], move: t[1], end: t[2] }),
                r.support.touch || !r.params.simulateTouch
                  ? r.touchEventsTouch
                  : r.touchEventsDesktop
              );
            })(),
            touchEventsData: {
              isTouched: void 0,
              isMoved: void 0,
              allowTouchCallbacks: void 0,
              touchStartTime: void 0,
              isScrolling: void 0,
              currentTranslate: void 0,
              startTranslate: void 0,
              allowThresholdMove: void 0,
              focusableElements: r.params.focusableElements,
              lastClickTime: E(),
              clickTimeout: void 0,
              velocities: [],
              allowMomentumBounce: void 0,
              isTouchEvent: void 0,
              startMoving: void 0,
            },
            allowClick: !0,
            allowTouchMove: r.params.allowTouchMove,
            touches: {
              startX: 0,
              startY: 0,
              currentX: 0,
              currentY: 0,
              diff: 0,
            },
            imagesToLoad: [],
            imagesLoaded: 0,
          }),
          r.emit("_swiper"),
          r.params.init && r.init(),
          r
        );
      }
      enable() {
        const e = this;
        e.enabled ||
          ((e.enabled = !0),
          e.params.grabCursor && e.setGrabCursor(),
          e.emit("enable"));
      }
      disable() {
        const e = this;
        e.enabled &&
          ((e.enabled = !1),
          e.params.grabCursor && e.unsetGrabCursor(),
          e.emit("disable"));
      }
      setProgress(e, t) {
        e = Math.min(Math.max(e, 0), 1);
        const n = this.minTranslate(),
          i = (this.maxTranslate() - n) * e + n;
        this.translateTo(i, void 0 === t ? 0 : t),
          this.updateActiveIndex(),
          this.updateSlidesClasses();
      }
      emitContainerClasses() {
        const e = this;
        if (!e.params._emitClasses || !e.el) return;
        const t = e.el.className
          .split(" ")
          .filter(
            (t) =>
              0 === t.indexOf("swiper") ||
              0 === t.indexOf(e.params.containerModifierClass)
          );
        e.emit("_containerClasses", t.join(" "));
      }
      getSlideClasses(e) {
        const t = this;
        return e.className
          .split(" ")
          .filter(
            (e) =>
              0 === e.indexOf("swiper-slide") ||
              0 === e.indexOf(t.params.slideClass)
          )
          .join(" ");
      }
      emitSlidesClasses() {
        const e = this;
        if (!e.params._emitClasses || !e.el) return;
        const t = [];
        e.slides.each((n) => {
          const i = e.getSlideClasses(n);
          t.push({ slideEl: n, classNames: i }), e.emit("_slideClass", n, i);
        }),
          e.emit("_slideClasses", t);
      }
      slidesPerViewDynamic(e, t) {
        void 0 === e && (e = "current"), void 0 === t && (t = !1);
        const {
          params: n,
          slides: i,
          slidesGrid: s,
          slidesSizesGrid: r,
          size: a,
          activeIndex: o,
        } = this;
        let l = 1;
        if (n.centeredSlides) {
          let e,
            t = i[o].swiperSlideSize;
          for (let n = o + 1; n < i.length; n += 1)
            i[n] &&
              !e &&
              ((l += 1), (t += i[n].swiperSlideSize) > a && (e = !0));
          for (let n = o - 1; n >= 0; n -= 1)
            i[n] &&
              !e &&
              ((l += 1), (t += i[n].swiperSlideSize) > a && (e = !0));
        } else if ("current" === e)
          for (let e = o + 1; e < i.length; e += 1)
            (t ? s[e] + r[e] - s[o] < a : s[e] - s[o] < a) && (l += 1);
        else for (let e = o - 1; e >= 0; e -= 1) s[o] - s[e] < a && (l += 1);
        return l;
      }
      update() {
        const e = this;
        if (!e || e.destroyed) return;
        const { snapGrid: t, params: n } = e;
        function i() {
          const t = e.rtlTranslate ? -1 * e.translate : e.translate,
            n = Math.min(Math.max(t, e.maxTranslate()), e.minTranslate());
          e.setTranslate(n), e.updateActiveIndex(), e.updateSlidesClasses();
        }
        let s;
        n.breakpoints && e.setBreakpoint(),
          e.updateSize(),
          e.updateSlides(),
          e.updateProgress(),
          e.updateSlidesClasses(),
          e.params.freeMode && e.params.freeMode.enabled
            ? (i(), e.params.autoHeight && e.updateAutoHeight())
            : (s =
                ("auto" === e.params.slidesPerView ||
                  e.params.slidesPerView > 1) &&
                e.isEnd &&
                !e.params.centeredSlides
                  ? e.slideTo(e.slides.length - 1, 0, !1, !0)
                  : e.slideTo(e.activeIndex, 0, !1, !0)) || i(),
          n.watchOverflow && t !== e.snapGrid && e.checkOverflow(),
          e.emit("update");
      }
      changeDirection(e, t) {
        void 0 === t && (t = !0);
        const n = this,
          i = n.params.direction;
        return (
          e || (e = "horizontal" === i ? "vertical" : "horizontal"),
          e === i ||
            ("horizontal" !== e && "vertical" !== e) ||
            (n.$el
              .removeClass(`${n.params.containerModifierClass}${i}`)
              .addClass(`${n.params.containerModifierClass}${e}`),
            n.emitContainerClasses(),
            (n.params.direction = e),
            n.slides.each((t) => {
              "vertical" === e ? (t.style.width = "") : (t.style.height = "");
            }),
            n.emit("changeDirection"),
            t && n.update()),
          n
        );
      }
      mount(e) {
        const t = this;
        if (t.mounted) return !0;
        const n = x(e || t.params.el);
        if (!(e = n[0])) return !1;
        e.swiper = t;
        const i = () =>
          "." + (t.params.wrapperClass || "").trim().split(" ").join(".");
        let s = (() => {
          if (e && e.shadowRoot && e.shadowRoot.querySelector) {
            const t = x(e.shadowRoot.querySelector(i()));
            return (t.children = (e) => n.children(e)), t;
          }
          return n.children(i());
        })();
        if (0 === s.length && t.params.createElements) {
          const e = u().createElement("div");
          (s = x(e)),
            (e.className = t.params.wrapperClass),
            n.append(e),
            n.children("." + t.params.slideClass).each((e) => {
              s.append(e);
            });
        }
        return (
          Object.assign(t, {
            $el: n,
            el: e,
            $wrapperEl: s,
            wrapperEl: s[0],
            mounted: !0,
            rtl: "rtl" === e.dir.toLowerCase() || "rtl" === n.css("direction"),
            rtlTranslate:
              "horizontal" === t.params.direction &&
              ("rtl" === e.dir.toLowerCase() || "rtl" === n.css("direction")),
            wrongRTL: "-webkit-box" === s.css("display"),
          }),
          !0
        );
      }
      init(e) {
        const t = this;
        return t.initialized
          ? t
          : (!1 === t.mount(e) ||
              (t.emit("beforeInit"),
              t.params.breakpoints && t.setBreakpoint(),
              t.addClasses(),
              t.params.loop && t.loopCreate(),
              t.updateSize(),
              t.updateSlides(),
              t.params.watchOverflow && t.checkOverflow(),
              t.params.grabCursor && t.enabled && t.setGrabCursor(),
              t.params.preloadImages && t.preloadImages(),
              t.params.loop
                ? t.slideTo(
                    t.params.initialSlide + t.loopedSlides,
                    0,
                    t.params.runCallbacksOnInit,
                    !1,
                    !0
                  )
                : t.slideTo(
                    t.params.initialSlide,
                    0,
                    t.params.runCallbacksOnInit,
                    !1,
                    !0
                  ),
              t.attachEvents(),
              (t.initialized = !0),
              t.emit("init"),
              t.emit("afterInit")),
            t);
      }
      destroy(e, t) {
        void 0 === e && (e = !0), void 0 === t && (t = !0);
        const n = this,
          { params: i, $el: s, $wrapperEl: r, slides: a } = n;
        return (
          void 0 === n.params ||
            n.destroyed ||
            (n.emit("beforeDestroy"),
            (n.initialized = !1),
            n.detachEvents(),
            i.loop && n.loopDestroy(),
            t &&
              (n.removeClasses(),
              s.removeAttr("style"),
              r.removeAttr("style"),
              a &&
                a.length &&
                a
                  .removeClass(
                    [
                      i.slideVisibleClass,
                      i.slideActiveClass,
                      i.slideNextClass,
                      i.slidePrevClass,
                    ].join(" ")
                  )
                  .removeAttr("style")
                  .removeAttr("data-swiper-slide-index")),
            n.emit("destroy"),
            Object.keys(n.eventsListeners).forEach((e) => {
              n.off(e);
            }),
            !1 !== e &&
              ((n.$el[0].swiper = null),
              (function (e) {
                const t = n;
                Object.keys(t).forEach((e) => {
                  try {
                    t[e] = null;
                  } catch (e) {}
                  try {
                    delete t[e];
                  } catch (e) {}
                });
              })()),
            (n.destroyed = !0)),
          null
        );
      }
      static extendDefaults(e) {
        S(F, e);
      }
      static get extendedDefaults() {
        return F;
      }
      static get defaults() {
        return j;
      }
      static installModule(e) {
        G.prototype.__modules__ || (G.prototype.__modules__ = []);
        const t = G.prototype.__modules__;
        "function" == typeof e && t.indexOf(e) < 0 && t.push(e);
      }
      static use(e) {
        return Array.isArray(e)
          ? (e.forEach((e) => G.installModule(e)), G)
          : (G.installModule(e), G);
      }
    }
    Object.keys(V).forEach((e) => {
      Object.keys(V[e]).forEach((t) => {
        G.prototype[t] = V[e][t];
      });
    }),
      G.use([
        function (e) {
          let { swiper: t, on: n, emit: i } = e;
          const s = f();
          let r = null,
            a = null;
          const o = () => {
              t &&
                !t.destroyed &&
                t.initialized &&
                (i("beforeResize"), i("resize"));
            },
            l = () => {
              t && !t.destroyed && t.initialized && i("orientationchange");
            };
          n("init", () => {
            t.params.resizeObserver && void 0 !== s.ResizeObserver
              ? t &&
                !t.destroyed &&
                t.initialized &&
                (r = new ResizeObserver((e) => {
                  a = s.requestAnimationFrame(() => {
                    const { width: n, height: i } = t;
                    let s = n,
                      r = i;
                    e.forEach((e) => {
                      let { contentBoxSize: n, contentRect: i, target: a } = e;
                      (a && a !== t.el) ||
                        ((s = i ? i.width : (n[0] || n).inlineSize),
                        (r = i ? i.height : (n[0] || n).blockSize));
                    }),
                      (s === n && r === i) || o();
                  });
                })).observe(t.el)
              : (s.addEventListener("resize", o),
                s.addEventListener("orientationchange", l));
          }),
            n("destroy", () => {
              a && s.cancelAnimationFrame(a),
                r && r.unobserve && t.el && (r.unobserve(t.el), (r = null)),
                s.removeEventListener("resize", o),
                s.removeEventListener("orientationchange", l);
            });
        },
        function (e) {
          let { swiper: t, extendParams: n, on: i, emit: s } = e;
          const r = [],
            a = f(),
            o = function (e, t) {
              void 0 === t && (t = {});
              const n = new (a.MutationObserver || a.WebkitMutationObserver)(
                (e) => {
                  if (1 === e.length) return void s("observerUpdate", e[0]);
                  const t = function () {
                    s("observerUpdate", e[0]);
                  };
                  a.requestAnimationFrame
                    ? a.requestAnimationFrame(t)
                    : a.setTimeout(t, 0);
                }
              );
              n.observe(e, {
                attributes: void 0 === t.attributes || t.attributes,
                childList: void 0 === t.childList || t.childList,
                characterData: void 0 === t.characterData || t.characterData,
              }),
                r.push(n);
            };
          n({ observer: !1, observeParents: !1, observeSlideChildren: !1 }),
            i("init", () => {
              if (t.params.observer) {
                if (t.params.observeParents) {
                  const e = t.$el.parents();
                  for (let t = 0; t < e.length; t += 1) o(e[t]);
                }
                o(t.$el[0], { childList: t.params.observeSlideChildren }),
                  o(t.$wrapperEl[0], { attributes: !1 });
              }
            }),
            i("destroy", () => {
              r.forEach((e) => {
                e.disconnect();
              }),
                r.splice(0, r.length);
            });
        },
      ]);
    var H = G;
    function W(e, t, n, i) {
      const s = u();
      return (
        e.params.createElements &&
          Object.keys(i).forEach((r) => {
            if (!n[r] && !0 === n.auto) {
              let a = e.$el.children("." + i[r])[0];
              a ||
                (((a = s.createElement("div")).className = i[r]),
                e.$el.append(a)),
                (n[r] = a),
                (t[r] = a);
            }
          }),
        n
      );
    }
    function q(e) {
      return (
        void 0 === e && (e = ""),
        "." +
          e
            .trim()
            .replace(/([\.:!\/])/g, "\\$1")
            .replace(/ /g, ".")
      );
    }
    function Y(e, t) {
      return e.transformEl
        ? t
            .find(e.transformEl)
            .css({
              "backface-visibility": "hidden",
              "-webkit-backface-visibility": "hidden",
            })
        : t;
    }
    var U = n(2),
      X = n.n(U),
      K = n(3),
      J = n.n(K),
      Z = n(5);
    i.a.plugin(r),
      document.documentElement.classList.remove("no-js"),
      new J.a({
        elements_selector: ".js-lazy-load",
        class_loaded: "lazy-load--loaded",
        threshold: window.innerHeight / 5,
      }),
      (window.Cookies = o.a),
      (window.Alpine = i.a),
      (window.collapse = r),
      (window.Swiper = H),
      H.use([
        function (e) {
          let { swiper: t, extendParams: n, on: i, emit: s } = e;
          const r = "swiper-pagination";
          let a;
          n({
            pagination: {
              el: null,
              bulletElement: "span",
              clickable: !1,
              hideOnClick: !1,
              renderBullet: null,
              renderProgressbar: null,
              renderFraction: null,
              renderCustom: null,
              progressbarOpposite: !1,
              type: "bullets",
              dynamicBullets: !1,
              dynamicMainBullets: 1,
              formatFractionCurrent: (e) => e,
              formatFractionTotal: (e) => e,
              bulletClass: r + "-bullet",
              bulletActiveClass: r + "-bullet-active",
              modifierClass: r + "-",
              currentClass: r + "-current",
              totalClass: r + "-total",
              hiddenClass: r + "-hidden",
              progressbarFillClass: r + "-progressbar-fill",
              progressbarOppositeClass: r + "-progressbar-opposite",
              clickableClass: r + "-clickable",
              lockClass: r + "-lock",
              horizontalClass: r + "-horizontal",
              verticalClass: r + "-vertical",
            },
          }),
            (t.pagination = { el: null, $el: null, bullets: [] });
          let o = 0;
          function l() {
            return (
              !t.params.pagination.el ||
              !t.pagination.el ||
              !t.pagination.$el ||
              0 === t.pagination.$el.length
            );
          }
          function c(e, n) {
            const { bulletActiveClass: i } = t.params.pagination;
            e[n]().addClass(`${i}-${n}`)[n]().addClass(`${i}-${n}-${n}`);
          }
          function d() {
            const e = t.rtl,
              n = t.params.pagination;
            if (l()) return;
            const i =
                t.virtual && t.params.virtual.enabled
                  ? t.virtual.slides.length
                  : t.slides.length,
              r = t.pagination.$el;
            let d;
            const u = t.params.loop
              ? Math.ceil((i - 2 * t.loopedSlides) / t.params.slidesPerGroup)
              : t.snapGrid.length;
            if (
              (t.params.loop
                ? ((d = Math.ceil(
                    (t.activeIndex - t.loopedSlides) / t.params.slidesPerGroup
                  )) >
                    i - 1 - 2 * t.loopedSlides && (d -= i - 2 * t.loopedSlides),
                  d > u - 1 && (d -= u),
                  d < 0 && "bullets" !== t.params.paginationType && (d = u + d))
                : (d =
                    void 0 !== t.snapIndex ? t.snapIndex : t.activeIndex || 0),
              "bullets" === n.type &&
                t.pagination.bullets &&
                t.pagination.bullets.length > 0)
            ) {
              const i = t.pagination.bullets;
              let s, l, u;
              if (
                (n.dynamicBullets &&
                  ((a = i
                    .eq(0)
                    [t.isHorizontal() ? "outerWidth" : "outerHeight"](!0)),
                  r.css(
                    t.isHorizontal() ? "width" : "height",
                    a * (n.dynamicMainBullets + 4) + "px"
                  ),
                  n.dynamicMainBullets > 1 &&
                    void 0 !== t.previousIndex &&
                    ((o += d - (t.previousIndex - t.loopedSlides || 0)) >
                    n.dynamicMainBullets - 1
                      ? (o = n.dynamicMainBullets - 1)
                      : o < 0 && (o = 0)),
                  (s = Math.max(d - o, 0)),
                  (u =
                    ((l = s + (Math.min(i.length, n.dynamicMainBullets) - 1)) +
                      s) /
                    2)),
                i.removeClass(
                  ["", "-next", "-next-next", "-prev", "-prev-prev", "-main"]
                    .map((e) => `${n.bulletActiveClass}${e}`)
                    .join(" ")
                ),
                r.length > 1)
              )
                i.each((e) => {
                  const t = x(e),
                    i = t.index();
                  i === d && t.addClass(n.bulletActiveClass),
                    n.dynamicBullets &&
                      (i >= s &&
                        i <= l &&
                        t.addClass(n.bulletActiveClass + "-main"),
                      i === s && c(t, "prev"),
                      i === l && c(t, "next"));
                });
              else {
                const e = i.eq(d),
                  r = e.index();
                if ((e.addClass(n.bulletActiveClass), n.dynamicBullets)) {
                  const e = i.eq(s),
                    a = i.eq(l);
                  for (let e = s; e <= l; e += 1)
                    i.eq(e).addClass(n.bulletActiveClass + "-main");
                  if (t.params.loop)
                    if (r >= i.length) {
                      for (let e = n.dynamicMainBullets; e >= 0; e -= 1)
                        i.eq(i.length - e).addClass(
                          n.bulletActiveClass + "-main"
                        );
                      i.eq(i.length - n.dynamicMainBullets - 1).addClass(
                        n.bulletActiveClass + "-prev"
                      );
                    } else c(e, "prev"), c(a, "next");
                  else c(e, "prev"), c(a, "next");
                }
              }
              if (n.dynamicBullets) {
                const s = Math.min(i.length, n.dynamicMainBullets + 4),
                  r = (a * s - a) / 2 - u * a,
                  o = e ? "right" : "left";
                i.css(t.isHorizontal() ? o : "top", r + "px");
              }
            }
            if (
              ("fraction" === n.type &&
                (r.find(q(n.currentClass)).text(n.formatFractionCurrent(d + 1)),
                r.find(q(n.totalClass)).text(n.formatFractionTotal(u))),
              "progressbar" === n.type)
            ) {
              let e;
              e = n.progressbarOpposite
                ? t.isHorizontal()
                  ? "vertical"
                  : "horizontal"
                : t.isHorizontal()
                ? "horizontal"
                : "vertical";
              const i = (d + 1) / u;
              let s = 1,
                a = 1;
              "horizontal" === e ? (s = i) : (a = i),
                r
                  .find(q(n.progressbarFillClass))
                  .transform(`translate3d(0,0,0) scaleX(${s}) scaleY(${a})`)
                  .transition(t.params.speed);
            }
            "custom" === n.type && n.renderCustom
              ? (r.html(n.renderCustom(t, d + 1, u)),
                s("paginationRender", r[0]))
              : s("paginationUpdate", r[0]),
              t.params.watchOverflow &&
                t.enabled &&
                r[t.isLocked ? "addClass" : "removeClass"](n.lockClass);
          }
          function u() {
            const e = t.params.pagination;
            if (l()) return;
            const n =
                t.virtual && t.params.virtual.enabled
                  ? t.virtual.slides.length
                  : t.slides.length,
              i = t.pagination.$el;
            let r = "";
            if ("bullets" === e.type) {
              let s = t.params.loop
                ? Math.ceil((n - 2 * t.loopedSlides) / t.params.slidesPerGroup)
                : t.snapGrid.length;
              t.params.freeMode &&
                t.params.freeMode.enabled &&
                !t.params.loop &&
                s > n &&
                (s = n);
              for (let n = 0; n < s; n += 1)
                e.renderBullet
                  ? (r += e.renderBullet.call(t, n, e.bulletClass))
                  : (r += `<${e.bulletElement} class="${e.bulletClass}"></${e.bulletElement}>`);
              i.html(r), (t.pagination.bullets = i.find(q(e.bulletClass)));
            }
            "fraction" === e.type &&
              ((r = e.renderFraction
                ? e.renderFraction.call(t, e.currentClass, e.totalClass)
                : `<span class="${e.currentClass}"></span> / <span class="${e.totalClass}"></span>`),
              i.html(r)),
              "progressbar" === e.type &&
                ((r = e.renderProgressbar
                  ? e.renderProgressbar.call(t, e.progressbarFillClass)
                  : `<span class="${e.progressbarFillClass}"></span>`),
                i.html(r)),
              "custom" !== e.type && s("paginationRender", t.pagination.$el[0]);
          }
          function p() {
            t.params.pagination = W(
              t,
              t.originalParams.pagination,
              t.params.pagination,
              { el: "swiper-pagination" }
            );
            const e = t.params.pagination;
            if (!e.el) return;
            let n = x(e.el);
            0 !== n.length &&
              (t.params.uniqueNavElements &&
                "string" == typeof e.el &&
                n.length > 1 &&
                (n = t.$el.find(e.el)).length > 1 &&
                (n = n.filter((e) => x(e).parents(".swiper")[0] === t.el)),
              "bullets" === e.type &&
                e.clickable &&
                n.addClass(e.clickableClass),
              n.addClass(e.modifierClass + e.type),
              n.addClass(
                t.isHorizontal() ? e.horizontalClass : e.verticalClass
              ),
              "bullets" === e.type &&
                e.dynamicBullets &&
                (n.addClass(`${e.modifierClass}${e.type}-dynamic`),
                (o = 0),
                e.dynamicMainBullets < 1 && (e.dynamicMainBullets = 1)),
              "progressbar" === e.type &&
                e.progressbarOpposite &&
                n.addClass(e.progressbarOppositeClass),
              e.clickable &&
                n.on("click", q(e.bulletClass), function (e) {
                  e.preventDefault();
                  let n = x(this).index() * t.params.slidesPerGroup;
                  t.params.loop && (n += t.loopedSlides), t.slideTo(n);
                }),
              Object.assign(t.pagination, { $el: n, el: n[0] }),
              t.enabled || n.addClass(e.lockClass));
          }
          function f() {
            const e = t.params.pagination;
            if (l()) return;
            const n = t.pagination.$el;
            n.removeClass(e.hiddenClass),
              n.removeClass(e.modifierClass + e.type),
              n.removeClass(
                t.isHorizontal() ? e.horizontalClass : e.verticalClass
              ),
              t.pagination.bullets &&
                t.pagination.bullets.removeClass &&
                t.pagination.bullets.removeClass(e.bulletActiveClass),
              e.clickable && n.off("click", q(e.bulletClass));
          }
          i("init", () => {
            p(), u(), d();
          }),
            i("activeIndexChange", () => {
              (t.params.loop || void 0 === t.snapIndex) && d();
            }),
            i("snapIndexChange", () => {
              t.params.loop || d();
            }),
            i("slidesLengthChange", () => {
              t.params.loop && (u(), d());
            }),
            i("snapGridLengthChange", () => {
              t.params.loop || (u(), d());
            }),
            i("destroy", () => {
              f();
            }),
            i("enable disable", () => {
              const { $el: e } = t.pagination;
              e &&
                e[t.enabled ? "removeClass" : "addClass"](
                  t.params.pagination.lockClass
                );
            }),
            i("lock unlock", () => {
              d();
            }),
            i("click", (e, n) => {
              const i = n.target,
                { $el: r } = t.pagination;
              if (
                t.params.pagination.el &&
                t.params.pagination.hideOnClick &&
                r.length > 0 &&
                !x(i).hasClass(t.params.pagination.bulletClass)
              ) {
                if (
                  t.navigation &&
                  ((t.navigation.nextEl && i === t.navigation.nextEl) ||
                    (t.navigation.prevEl && i === t.navigation.prevEl))
                )
                  return;
                const e = r.hasClass(t.params.pagination.hiddenClass);
                s(!0 === e ? "paginationShow" : "paginationHide"),
                  r.toggleClass(t.params.pagination.hiddenClass);
              }
            }),
            Object.assign(t.pagination, {
              render: u,
              update: d,
              init: p,
              destroy: f,
            });
        },
      ]),
      H.use([
        function (e) {
          let { swiper: t, extendParams: n, on: i, emit: s } = e;
          function r(e) {
            let n;
            return (
              e &&
                ((n = x(e)),
                t.params.uniqueNavElements &&
                  "string" == typeof e &&
                  n.length > 1 &&
                  1 === t.$el.find(e).length &&
                  (n = t.$el.find(e))),
              n
            );
          }
          function a(e, n) {
            const i = t.params.navigation;
            e &&
              e.length > 0 &&
              (e[n ? "addClass" : "removeClass"](i.disabledClass),
              e[0] && "BUTTON" === e[0].tagName && (e[0].disabled = n),
              t.params.watchOverflow &&
                t.enabled &&
                e[t.isLocked ? "addClass" : "removeClass"](i.lockClass));
          }
          function o() {
            if (t.params.loop) return;
            const { $nextEl: e, $prevEl: n } = t.navigation;
            a(n, t.isBeginning && !t.params.rewind),
              a(e, t.isEnd && !t.params.rewind);
          }
          function l(e) {
            e.preventDefault(),
              (!t.isBeginning || t.params.loop || t.params.rewind) &&
                t.slidePrev();
          }
          function c(e) {
            e.preventDefault(),
              (!t.isEnd || t.params.loop || t.params.rewind) && t.slideNext();
          }
          function d() {
            const e = t.params.navigation;
            if (
              ((t.params.navigation = W(
                t,
                t.originalParams.navigation,
                t.params.navigation,
                { nextEl: "swiper-button-next", prevEl: "swiper-button-prev" }
              )),
              !e.nextEl && !e.prevEl)
            )
              return;
            const n = r(e.nextEl),
              i = r(e.prevEl);
            n && n.length > 0 && n.on("click", c),
              i && i.length > 0 && i.on("click", l),
              Object.assign(t.navigation, {
                $nextEl: n,
                nextEl: n && n[0],
                $prevEl: i,
                prevEl: i && i[0],
              }),
              t.enabled ||
                (n && n.addClass(e.lockClass), i && i.addClass(e.lockClass));
          }
          function u() {
            const { $nextEl: e, $prevEl: n } = t.navigation;
            e &&
              e.length &&
              (e.off("click", c),
              e.removeClass(t.params.navigation.disabledClass)),
              n &&
                n.length &&
                (n.off("click", l),
                n.removeClass(t.params.navigation.disabledClass));
          }
          n({
            navigation: {
              nextEl: null,
              prevEl: null,
              hideOnClick: !1,
              disabledClass: "swiper-button-disabled",
              hiddenClass: "swiper-button-hidden",
              lockClass: "swiper-button-lock",
            },
          }),
            (t.navigation = {
              nextEl: null,
              $nextEl: null,
              prevEl: null,
              $prevEl: null,
            }),
            i("init", () => {
              d(), o();
            }),
            i("toEdge fromEdge lock unlock", () => {
              o();
            }),
            i("destroy", () => {
              u();
            }),
            i("enable disable", () => {
              const { $nextEl: e, $prevEl: n } = t.navigation;
              e &&
                e[t.enabled ? "removeClass" : "addClass"](
                  t.params.navigation.lockClass
                ),
                n &&
                  n[t.enabled ? "removeClass" : "addClass"](
                    t.params.navigation.lockClass
                  );
            }),
            i("click", (e, n) => {
              const { $nextEl: i, $prevEl: r } = t.navigation,
                a = n.target;
              if (
                t.params.navigation.hideOnClick &&
                !x(a).is(r) &&
                !x(a).is(i)
              ) {
                if (
                  t.pagination &&
                  t.params.pagination &&
                  t.params.pagination.clickable &&
                  (t.pagination.el === a || t.pagination.el.contains(a))
                )
                  return;
                let e;
                i
                  ? (e = i.hasClass(t.params.navigation.hiddenClass))
                  : r && (e = r.hasClass(t.params.navigation.hiddenClass)),
                  s(!0 === e ? "navigationShow" : "navigationHide"),
                  i && i.toggleClass(t.params.navigation.hiddenClass),
                  r && r.toggleClass(t.params.navigation.hiddenClass);
              }
            }),
            Object.assign(t.navigation, { update: o, init: d, destroy: u });
        },
      ]),
      H.use([
        function (e) {
          let { swiper: t, extendParams: n, on: i } = e;
          n({ fadeEffect: { crossFade: !1, transformEl: null } }),
            (function (e) {
              const {
                effect: t,
                swiper: n,
                on: i,
                setTranslate: s,
                setTransition: r,
                overwriteParams: a,
                perspective: o,
              } = e;
              let l;
              i("beforeInit", () => {
                if (n.params.effect !== t) return;
                n.classNames.push(`${n.params.containerModifierClass}${t}`),
                  o &&
                    o() &&
                    n.classNames.push(n.params.containerModifierClass + "3d");
                const e = a ? a() : {};
                Object.assign(n.params, e), Object.assign(n.originalParams, e);
              }),
                i("setTranslate", () => {
                  n.params.effect === t && s();
                }),
                i("setTransition", (e, i) => {
                  n.params.effect === t && r(i);
                }),
                i("virtualUpdate", () => {
                  n.slides.length || (l = !0),
                    requestAnimationFrame(() => {
                      l && n.slides && n.slides.length && (s(), (l = !1));
                    });
                });
            })({
              effect: "fade",
              swiper: t,
              on: i,
              setTranslate: () => {
                const { slides: e } = t,
                  n = t.params.fadeEffect;
                for (let i = 0; i < e.length; i += 1) {
                  const e = t.slides.eq(i);
                  let s = -e[0].swiperSlideOffset;
                  t.params.virtualTranslate || (s -= t.translate);
                  let r = 0;
                  t.isHorizontal() || ((r = s), (s = 0));
                  const a = t.params.fadeEffect.crossFade
                    ? Math.max(1 - Math.abs(e[0].progress), 0)
                    : 1 + Math.min(Math.max(e[0].progress, -1), 0);
                  Y(n, e)
                    .css({ opacity: a })
                    .transform(`translate3d(${s}px, ${r}px, 0px)`);
                }
              },
              setTransition: (e) => {
                const { transformEl: n } = t.params.fadeEffect;
                (n ? t.slides.find(n) : t.slides).transition(e),
                  (function (e) {
                    let {
                      swiper: t,
                      duration: n,
                      transformEl: i,
                      allSlides: s,
                    } = e;
                    const { slides: r, activeIndex: a, $wrapperEl: o } = t;
                    if (t.params.virtualTranslate && 0 !== n) {
                      let e,
                        n = !1;
                      (e = s
                        ? i
                          ? r.find(i)
                          : r
                        : i
                        ? r.eq(a).find(i)
                        : r.eq(a)).transitionEnd(() => {
                        if (n) return;
                        if (!t || t.destroyed) return;
                        (n = !0), (t.animating = !1);
                        const e = ["webkitTransitionEnd", "transitionend"];
                        for (let t = 0; t < e.length; t += 1) o.trigger(e[t]);
                      });
                    }
                  })({ swiper: t, duration: e, transformEl: n, allSlides: !0 });
              },
              overwriteParams: () => ({
                slidesPerView: 1,
                slidesPerGroup: 1,
                watchSlidesProgress: !0,
                spaceBetween: 0,
                virtualTranslate: !t.params.cssMode,
              }),
            });
        },
      ]),
      H.use([
        function (e) {
          let t,
            { swiper: n, extendParams: i, on: s, emit: r } = e;
          function a() {
            const e = n.slides.eq(n.activeIndex);
            let i = n.params.autoplay.delay;
            e.attr("data-swiper-autoplay") &&
              (i = e.attr("data-swiper-autoplay") || n.params.autoplay.delay),
              clearTimeout(t),
              (t = _(() => {
                let e;
                n.params.autoplay.reverseDirection
                  ? n.params.loop
                    ? (n.loopFix(),
                      (e = n.slidePrev(n.params.speed, !0, !0)),
                      r("autoplay"))
                    : n.isBeginning
                    ? n.params.autoplay.stopOnLastSlide
                      ? l()
                      : ((e = n.slideTo(
                          n.slides.length - 1,
                          n.params.speed,
                          !0,
                          !0
                        )),
                        r("autoplay"))
                    : ((e = n.slidePrev(n.params.speed, !0, !0)), r("autoplay"))
                  : n.params.loop
                  ? (n.loopFix(),
                    (e = n.slideNext(n.params.speed, !0, !0)),
                    r("autoplay"))
                  : n.isEnd
                  ? n.params.autoplay.stopOnLastSlide
                    ? l()
                    : ((e = n.slideTo(0, n.params.speed, !0, !0)),
                      r("autoplay"))
                  : ((e = n.slideNext(n.params.speed, !0, !0)), r("autoplay")),
                  ((n.params.cssMode && n.autoplay.running) || !1 === e) && a();
              }, i));
          }
          function o() {
            return (
              void 0 === t &&
              !n.autoplay.running &&
              ((n.autoplay.running = !0), r("autoplayStart"), a(), !0)
            );
          }
          function l() {
            return (
              !!n.autoplay.running &&
              void 0 !== t &&
              (t && (clearTimeout(t), (t = void 0)),
              (n.autoplay.running = !1),
              r("autoplayStop"),
              !0)
            );
          }
          function c(e) {
            n.autoplay.running &&
              (n.autoplay.paused ||
                (t && clearTimeout(t),
                (n.autoplay.paused = !0),
                0 !== e && n.params.autoplay.waitForTransition
                  ? ["transitionend", "webkitTransitionEnd"].forEach((e) => {
                      n.$wrapperEl[0].addEventListener(e, p);
                    })
                  : ((n.autoplay.paused = !1), a())));
          }
          function d() {
            const e = u();
            "hidden" === e.visibilityState && n.autoplay.running && c(),
              "visible" === e.visibilityState &&
                n.autoplay.paused &&
                (a(), (n.autoplay.paused = !1));
          }
          function p(e) {
            n &&
              !n.destroyed &&
              n.$wrapperEl &&
              e.target === n.$wrapperEl[0] &&
              (["transitionend", "webkitTransitionEnd"].forEach((e) => {
                n.$wrapperEl[0].removeEventListener(e, p);
              }),
              (n.autoplay.paused = !1),
              n.autoplay.running ? a() : l());
          }
          function f() {
            n.params.autoplay.disableOnInteraction
              ? l()
              : (r("autoplayPause"), c()),
              ["transitionend", "webkitTransitionEnd"].forEach((e) => {
                n.$wrapperEl[0].removeEventListener(e, p);
              });
          }
          function h() {
            n.params.autoplay.disableOnInteraction ||
              ((n.autoplay.paused = !1), r("autoplayResume"), a());
          }
          (n.autoplay = { running: !1, paused: !1 }),
            i({
              autoplay: {
                enabled: !1,
                delay: 3e3,
                waitForTransition: !0,
                disableOnInteraction: !0,
                stopOnLastSlide: !1,
                reverseDirection: !1,
                pauseOnMouseEnter: !1,
              },
            }),
            s("init", () => {
              n.params.autoplay.enabled &&
                (o(),
                u().addEventListener("visibilitychange", d),
                n.params.autoplay.pauseOnMouseEnter &&
                  (n.$el.on("mouseenter", f), n.$el.on("mouseleave", h)));
            }),
            s("beforeTransitionStart", (e, t, i) => {
              n.autoplay.running &&
                (i || !n.params.autoplay.disableOnInteraction
                  ? n.autoplay.pause(t)
                  : l());
            }),
            s("sliderFirstMove", () => {
              n.autoplay.running &&
                (n.params.autoplay.disableOnInteraction ? l() : c());
            }),
            s("touchEnd", () => {
              n.params.cssMode &&
                n.autoplay.paused &&
                !n.params.autoplay.disableOnInteraction &&
                a();
            }),
            s("destroy", () => {
              n.$el.off("mouseenter", f),
                n.$el.off("mouseleave", h),
                n.autoplay.running && l(),
                u().removeEventListener("visibilitychange", d);
            }),
            Object.assign(n.autoplay, { pause: c, run: a, start: o, stop: l });
        },
      ]),
      H.use([
        function (e) {
          let { swiper: t, extendParams: n, emit: i, once: s } = e;
          n({
            freeMode: {
              enabled: !1,
              momentum: !0,
              momentumRatio: 1,
              momentumBounce: !0,
              momentumBounceRatio: 1,
              momentumVelocityRatio: 1,
              sticky: !1,
              minimumVelocity: 0.02,
            },
          }),
            Object.assign(t, {
              freeMode: {
                onTouchStart: function () {
                  const e = t.getTranslate();
                  t.setTranslate(e),
                    t.setTransition(0),
                    (t.touchEventsData.velocities.length = 0),
                    t.freeMode.onTouchEnd({
                      currentPos: t.rtl ? t.translate : -t.translate,
                    });
                },
                onTouchMove: function () {
                  const { touchEventsData: e, touches: n } = t;
                  0 === e.velocities.length &&
                    e.velocities.push({
                      position: n[t.isHorizontal() ? "startX" : "startY"],
                      time: e.touchStartTime,
                    }),
                    e.velocities.push({
                      position: n[t.isHorizontal() ? "currentX" : "currentY"],
                      time: E(),
                    });
                },
                onTouchEnd: function (e) {
                  let { currentPos: n } = e;
                  const {
                      params: r,
                      $wrapperEl: a,
                      rtlTranslate: o,
                      snapGrid: l,
                      touchEventsData: c,
                    } = t,
                    d = E() - c.touchStartTime;
                  if (n < -t.minTranslate()) t.slideTo(t.activeIndex);
                  else if (n > -t.maxTranslate())
                    t.slides.length < l.length
                      ? t.slideTo(l.length - 1)
                      : t.slideTo(t.slides.length - 1);
                  else {
                    if (r.freeMode.momentum) {
                      if (c.velocities.length > 1) {
                        const e = c.velocities.pop(),
                          n = c.velocities.pop(),
                          i = e.position - n.position,
                          s = e.time - n.time;
                        (t.velocity = i / s),
                          (t.velocity /= 2),
                          Math.abs(t.velocity) < r.freeMode.minimumVelocity &&
                            (t.velocity = 0),
                          (s > 150 || E() - e.time > 300) && (t.velocity = 0);
                      } else t.velocity = 0;
                      (t.velocity *= r.freeMode.momentumVelocityRatio),
                        (c.velocities.length = 0);
                      let e = 1e3 * r.freeMode.momentumRatio;
                      const n = t.velocity * e;
                      let d = t.translate + n;
                      o && (d = -d);
                      let u,
                        p = !1;
                      const f =
                        20 *
                        Math.abs(t.velocity) *
                        r.freeMode.momentumBounceRatio;
                      let h;
                      if (d < t.maxTranslate())
                        r.freeMode.momentumBounce
                          ? (d + t.maxTranslate() < -f &&
                              (d = t.maxTranslate() - f),
                            (u = t.maxTranslate()),
                            (p = !0),
                            (c.allowMomentumBounce = !0))
                          : (d = t.maxTranslate()),
                          r.loop && r.centeredSlides && (h = !0);
                      else if (d > t.minTranslate())
                        r.freeMode.momentumBounce
                          ? (d - t.minTranslate() > f &&
                              (d = t.minTranslate() + f),
                            (u = t.minTranslate()),
                            (p = !0),
                            (c.allowMomentumBounce = !0))
                          : (d = t.minTranslate()),
                          r.loop && r.centeredSlides && (h = !0);
                      else if (r.freeMode.sticky) {
                        let e;
                        for (let t = 0; t < l.length; t += 1)
                          if (l[t] > -d) {
                            e = t;
                            break;
                          }
                        d = -(d =
                          Math.abs(l[e] - d) < Math.abs(l[e - 1] - d) ||
                          "next" === t.swipeDirection
                            ? l[e]
                            : l[e - 1]);
                      }
                      if (
                        (h &&
                          s("transitionEnd", () => {
                            t.loopFix();
                          }),
                        0 !== t.velocity)
                      ) {
                        if (
                          ((e = o
                            ? Math.abs((-d - t.translate) / t.velocity)
                            : Math.abs((d - t.translate) / t.velocity)),
                          r.freeMode.sticky)
                        ) {
                          const n = Math.abs((o ? -d : d) - t.translate),
                            i = t.slidesSizesGrid[t.activeIndex];
                          e =
                            n < i
                              ? r.speed
                              : n < 2 * i
                              ? 1.5 * r.speed
                              : 2.5 * r.speed;
                        }
                      } else if (r.freeMode.sticky)
                        return void t.slideToClosest();
                      r.freeMode.momentumBounce && p
                        ? (t.updateProgress(u),
                          t.setTransition(e),
                          t.setTranslate(d),
                          t.transitionStart(!0, t.swipeDirection),
                          (t.animating = !0),
                          a.transitionEnd(() => {
                            t &&
                              !t.destroyed &&
                              c.allowMomentumBounce &&
                              (i("momentumBounce"),
                              t.setTransition(r.speed),
                              setTimeout(() => {
                                t.setTranslate(u),
                                  a.transitionEnd(() => {
                                    t && !t.destroyed && t.transitionEnd();
                                  });
                              }, 0));
                          }))
                        : t.velocity
                        ? (i("_freeModeNoMomentumRelease"),
                          t.updateProgress(d),
                          t.setTransition(e),
                          t.setTranslate(d),
                          t.transitionStart(!0, t.swipeDirection),
                          t.animating ||
                            ((t.animating = !0),
                            a.transitionEnd(() => {
                              t && !t.destroyed && t.transitionEnd();
                            })))
                        : t.updateProgress(d),
                        t.updateActiveIndex(),
                        t.updateSlidesClasses();
                    } else {
                      if (r.freeMode.sticky) return void t.slideToClosest();
                      r.freeMode && i("_freeModeNoMomentumRelease");
                    }
                    (!r.freeMode.momentum || d >= r.longSwipesMs) &&
                      (t.updateProgress(),
                      t.updateActiveIndex(),
                      t.updateSlidesClasses());
                  }
                },
              },
            });
        },
      ]),
      (window.enterView = X.a),
      (window.scrollMonitor = Z),
      i.a.start();
  },
]);
