<head>
	<title>Matrix UI</title>
	<script type="text/javascript" src="media/vue.min.js"></script>
	<link href="media/montserrat.css" rel="stylesheet" type="text/css">
</head>

<style>
    body {
        //background-image: url("/image 4.png");
        //background-size: cover;
        //background-position: 25px;
        margin: 0;
        padding: 0;
	    background-color: black;
    }

    :root {
        --font-size: 14px;
        --white: white;
        --dark-white: #7c7c7c;
        --mid-white: #979797;
        --cyan: #0DBBFF;
        --filter-orange: invert(46%) sepia(90%) saturate(528%) hue-rotate(3deg) brightness(110%) contrast(103%);
        --icon-size: 16px;
        --transition-all-fast: all 0.1s cubic-bezier(.17, .67, .3, .92);
    }

    .menu {
        display: flex;
        flex-direction: column;
        position: absolute;
        top: 0;
        left: 0;
        height: 100vh;
        width: 60px;
        background: linear-gradient(-25deg, #25252A 0%, #50505A 100%);
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 0px 25px 25px 0px;
        transition: var(--transition-all-fast);
        padding: 25px 5px;
        box-sizing: border-box;
        color: var(--white);
        font-size: var(--font-size);
        font-family: Montserrat, serif;
        overflow-x: clip;
        overflow-y: scroll;
        -ms-overflow-style: none;
        scrollbar-width: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -o-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -ms-user-select: none;
    }
    .menu::-webkit-scrollbar {
        display: none;
    }
    .menu:hover {
        width: 250px;
        padding: 25px 10px;
    }
    .menu.active {
        width: 250px;
        padding: 25px 10px;
    }
    .menu__line {
        display: block;
        height: 1px;
        border: 0;
        border-top: 1px solid #ccc;
        margin: 5px 0px;
        padding: 0;
        box-sizing: border-box;
    }
    .menu__center {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }


    .vue-menu-button {
        color: var(--white);
        border-radius: 5px;
        padding-left: 5px;
        padding-right: 5px;
        box-sizing: border-box;
        cursor: pointer;
    }
    .vue-menu-button.active {
        background-color: var(--dark-white);
    }
    .vue-menu-button.small {
        text-align: center;
    }
    .vue-menu-button:hover {
        background-color: var(--dark-white);
    }
    .vue-menu-button.selected {
        background-color: var(--cyan);
    }
    .vue-menu-button__main_row {
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        height: 30px;
        width: 100%;
        white-space: nowrap;
        box-sizing: border-box;
    }
    .vue-menu-button__main_row.active {
    //padding-right: 8px; padding-left: 5px;
    }
    .vue-menu-button__main_row.favorite {
        height: 25px;
    }
    .vue-menu-button__main-icon {
        height: var(--icon-size);
        width: var(--icon-size);
        font-size: 0.8rem;
        text-align: center;
        -webkit-user-drag: none;
        -khtml-user-drag: none;
        -moz-user-drag: none;
        -o-user-drag: none;
        user-drag: none;
    }
    .vue-menu-button__main-icon.grow {
        flex-grow: 1;
    }
    .vue-menu-button__drop_rows {
        display: flex;
        justify-content: center;
        gap: 2px;
        transform: translateY(-5px);
        overflow-x: clip;
        height: min-content;
    }
    .vue-menu-button__drop_rows.active {
        flex-direction: column;
        margin-top: 5px;
    }
    .vue-menu-button__title {
        flex-grow: 1;
    }
    .vue-menu-button__title.favorite {
        font-size: 0.8rem;
    }
    .vue-menu-button__triangle-icon {
        margin-right: 8px;
        height: 6px;
        width: auto;
    }
    .vue-menu-button__triangle-icon.active {
        transform: rotate(180deg);
        transition: var(--transition-all-fast);
    }
    .vue-menu-button__drop-icon {
        width: var(--icon-size);
        max-height: var(--icon-size);;
        display: inline-flex;
        justify-content: center;
        align-items: center;
    }
    .vue-menu-button__drop-icon.grow {
        flex-grow: 1;
    }
    .vue-menu-button__drop-link {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        border-radius: 5px;
        padding-top: 0;
        padding-bottom: 0;
        text-decoration: none;
        color: var(--white);
        white-space: nowrap;
        height: 0;
        overflow: clip;
        font-size: 0;
    }
    .vue-menu-button__drop-link.padding {
        padding-left: 5px;
    }
    .vue-menu-button__drop-link.active {
        font-size: 0.8rem;
        padding-top: 7px;
        padding-bottom: 7px;
        height: min-content;
        transition: var(--transition-all-fast);
    }
    .vue-menu-button__drop-link:hover {
        background-color: var(--mid-white);
        padding-left: 5px;
        transition: var(--transition-all-fast);
    }
    .vue-menu-button__drop-link.selected {
        background-color: var(--cyan);
    }
    .vue-menu-button__fav-icon {
        height: 0;
        width: auto;
        -webkit-user-drag: none;
        -khtml-user-drag: none;
        -moz-user-drag: none;
        -o-user-drag: none;
        user-drag: none;
    }
    .vue-menu-button__fav-icon:hover {
        transform: scale(1.2);
        transition: var(--transition-all-fast);
    }
    .vue-menu-button__fav-icon.active {
        filter: var(--filter-orange);
    }
    .vue-menu-button__fav-icon.show {
        height: 12px;
        margin-right: 5px;
        transition: var(--transition-all-fast);
    }
</style>

<body>
<div id="matrix_menu"
     class="menu"
     :class="{active: elements.lock}"
     @mouseover="elements.lock ? false : elements.small = false"
     @mouseleave="elements.lock ? false : elements.small = true">
	<!--USER-->
	<vue-menu-button
		title="Maksym Rozhko"
		icon-name="user-icon"
		:icon-only="elements.small"
		:hash="matrix.hash"
		:items="[{title: 'Change Pass', link: 'test44'}, {title: 'Logout', link: 'test55'}]"
	></vue-menu-button>
	<hr class="menu__line">

	<!-- FAVORITE-->
	<template v-if="matrix.favorite.length">
		<template v-for="btn in matrix.favorite">
			<vue-menu-button
				:title="btn.title"
				:icon-only="elements.small"
				:link="btn.link"
				:hash="matrix.hash"
				:favorite-section="true"
				:favorite-links="matrix.favorite"
				@change-favorite="changeFavorite">
			</vue-menu-button>
		</template>
		<hr class="menu__line">
	</template>

	<!-- LINKS -->
	<div class="menu__center">
		<template v-for="btn in linksList">
			<vue-menu-button
				:title="btn.title"
				:icon-name="btn.icon"
				:icon-only="elements.small"
				:link="btn.link"
				:items="btn.items"
				:hash="matrix.hash"
				:favorite-drop="true"
				:favorite-links="matrix.favorite"
				@change-favorite="changeFavorite">
			</vue-menu-button>
		</template>
	</div>

	<!-- SYSTEM -->
	<hr class="menu__line">
	<vue-menu-button
		title="Report Bug (F1)"
		icon-name="bug-icon"
		:action="true"
		:icon-only="elements.small">
	</vue-menu-button>
	<vue-menu-button
		:title="!elements.lock ? 'Lock Menu' : 'Unlock Menu'"
		icon-name="lock-icon"
		:icon-only="elements.small"
		v-on:click.native="elements.lock = !elements.lock">
	</vue-menu-button>
</div>
</body>

<script>
   Vue.component('vue-menu-button', {
      props: {
         iconOnly: {
            type: Boolean,
            default: true,
         },
         iconName: {
            type: String,
            default: false,
         },
         title: {
            type: String,
            default: false,
         },
         link: {
            type: String,
            default: false,
         },
         hash: {
            type: String,
            default: false,
         },
         action: {
            type: Boolean,
            default: false,
         },
         items: {
            type: Array,
            default: [],
         },
         favoriteSection: {
            type: Boolean,
            default: false,
         },
         favoriteDrop: {
            type: Boolean,
            default: false,
         },
         favoriteLinks: {
            type: Array,
            default: [],
         },
      },
      data() {
         return {
            showDropItems: false,
            selected: false,
         }
      },
      methods: {
         checkAction() {
            if (this.items.length) {
               this.showDropItems = !this.showDropItems
            }
            else if (this.link) {
               window.location.hash = this.link
            }
            else if (this.action) {
               alert('some action')
            }
         },
         getFirstLetter(str) {
            return str.split(' ').map(e => {
               return e.charAt(0)
            }).join('')
         },
         checkHashLink() {
            this.selected = this.link && this.link === this.hash;
         },
         checkItems() {
            if (this.items) {
               for (const [i, e] of this.items.entries()) {
                  this.items[i].favoriteChecked = !!(this.favoriteLinks && this.favoriteLinks.some(f => f.link === e.link));
                  this.items[i].selected = e.link === this.hash;
               }
            }
            this.$forceUpdate()
         },
         changeFavorite(item) {
            if (item) {
               this.$emit("change-favorite", item)
            }
            else {
               this.$emit("change-favorite", {"link": this.link, "title": this.title})
            }
         },
      },
      watch: {
         hash() {
            this.checkHashLink()
            this.checkItems()
         },
         favoriteLinks() {
            this.checkItems()
         }
      },
      mounted() {
         this.checkHashLink()
         this.checkItems()
      },
      template: `
         <template>
            <div draggable="true" class="vue-menu-button"
                 :class="{small: iconOnly, active: showDropItems, selected: selected}">
               <!--MAIN ROW-->
               <div @click="checkAction()" class="vue-menu-button__main_row" :class="{active: !iconOnly, favorite: favoriteSection}">
                  <template v-if="iconName">
                     <img class="vue-menu-button__main-icon"
                          :class="{grow: iconOnly}"
                          :src="'/matrix-ui-media/' + iconName + '.svg'"
                          alt="user">
                  </template>
                  <template v-else>
                     <span class="vue-menu-button__main-icon"
                           :class="{grow: iconOnly}">{{ getFirstLetter(title) }}
							</span>
                  </template>

                  <template v-if="!iconOnly">
                     <span class="vue-menu-button__title"
                           :class="{favorite: favoriteSection, active: !iconOnly}"> {{ title }}
							</span>
                     <template v-if="items.length">
                        <img class="vue-menu-button__triangle-icon"
                             :class="{active: showDropItems}"
                             src="/matrix-ui-media/triangle-icon.svg"
                             alt="drop">
                     </template>
                     <template v-else-if="favoriteSection">
                        <img @click="changeFavorite()"
                             class="vue-menu-button__fav-icon active show"
                             src="/matrix-ui-media/fav-icon.svg"
                             alt="favorite">
                     </template>
                  </template>
               </div>
               <!--DROP ITEMS-->
               <div class="vue-menu-button__drop_rows"
                    :class="{active: showDropItems}">
                  <template v-for="item in items">
                     <a class="vue-menu-button__drop-link"
                        :class="{selected: item.selected, active: showDropItems, padding: !iconOnly}"
                        :href="'#' + item.link">
                        <span class="vue-menu-button__drop-icon"
                              :class="{grow: iconOnly}">
										{{ getFirstLetter(item.title) }}</span>

                        <template v-if="!iconOnly">
                           <span class="vue-menu-button__title"> {{ item.title }}</span>
                           <template v-if="favoriteDrop">
                              <img @click="changeFavorite(item)"
                                   class="vue-menu-button__fav-icon"
                                   :class="{active: item.favoriteChecked, show: showDropItems}"
                                   src="/matrix-ui-media/fav-icon.svg"
                                   alt="favorite">
                           </template>
                        </template>
                     </a>
                  </template>
               </div>
            </div>
         </template>`
   });

   new Vue({
      el: '#matrix_menu',
      data: {
         elements: {
            small: true,
            lock: false,
         },
         matrix: {
            hash: window.location.hash.substring(1),
            favorite: [
               {title: 'Lorem Ipsum', link: 'test1', itsFavorite: true},
               {title: 'Lorem', link: 'test5', itsFavorite: true},
               {title: 'Ipsum', link: 'test12', itsFavorite: true},
            ],
         },
         links: [
            {
               icon: "user-icon", title: 'Orders',
               items: [
                  {title: 'New Task', link: 'test112'},
                  {title: 'Current Task', link: 'test212'},
                  {title: 'Commpleted Task', link: 'test313'},
                  {title: 'Arch Task', link: 'test314'},
                  {title: 'Confirm Request', link: 'test315'},
                  {title: 'Cinform Arch', link: 'test316'},
               ]
            },
            {
               icon: "msg-icon", title: 'Marketing',
               items: [
                  {title: 'File Uploader', link: 'test4111'},
                  {title: 'Trust Us', link: 'test412'},
                  {title: 'New Partner', link: 'test4113'},
                  {title: 'Partners List', link: 'test4114'},
                  {title: 'Raty', link: 'test4115'},
                  {title: 'Upload Trans', link: 'test411531'},
                  {title: 'New Newsletter', link: 'test411'},
                  {title: 'New Rebate', link: 'test5'},
                  {title: 'Rebate List', link: 'test4'},
                  {title: 'New Promo', link: 'test6'},
                  {title: 'Promo List', link: 'test612'},
               ]
            },
            {
               icon: "a-icon", title: 'Shipping',
               items: [
                  {title: 'Add Driver', link: 'test7'},
                  {title: 'Drier List', link: 'test8'},
                  {title: 'Arch Shipment', link: 'test9'},
               ]
            },
            {
               icon: "e-icon", title: 'Support',
               items: [
                  {title: 'Driver Add', link: 'test5412'},
                  {title: 'Drier List', link: 'test17568'},
                  {title: 'Warranty Tracker', link: 'test865345'},
               ]
            },
            {
               icon: "calc-icon", title: 'Key Parts',
               items: [
                  {title: 'SSD', link: 'test13asd'},
                  {title: 'HDD', link: 'test14zxc'},
                  {title: 'RAM', link: 'test15fsdf'},
                  {title: 'WIFI', link: 'test13234'},
                  {title: 'MODEM', link: 'test122344'},
                  {title: 'KeyParts List', link: 'test134535'},
               ]
            },
            {
               icon: "e-icon", title: 'Bug Tracker',
               items: [
                  {title: 'Bug List', link: 'test5412zxczxc'},
                  {title: 'Bug Arch', link: 'test17568zxcasd'},
               ]
            },
            {
               icon: "a-icon", title: 'Labels',
               items: [
                  {title: 'Labels Print', link: 'test72134'},
                  {title: 'EAN Code', link: 'test8asd'},
               ]
            },
            {
               icon: "a-icon", title: 'Other',
               items: [
                  {title: 'Lorem Ipsum', link: 'test16'},
                  {title: 'Lorem', link: 'test17'},
                  {title: 'Ipsum', link: 'test18'},
                  {title: 'Lorem Ipsum', link: 'test111'},
                  {title: 'Lorem', link: 'test123'},
                  {title: 'Ipsum', link: 'test1234'},
               ]
            },
            {
               icon: "e-icon", title: 'Companies',
               items: [
                  {title: 'Company New', link: 'test5412zxc'},
                  {title: 'Company List', link: 'test17568asd'},
               ]
            },
            {
               icon: "user-icon", title: 'Only Link 1', link: 'test21'
            },
            {
               icon: "user-icon", title: 'Only Link 2', link: 'test22'
            },
            {
               icon: "user-icon", title: 'Only Link 3', link: 'test23'
            },
         ],
      },
      methods: {
         changeFavorite(item) {
            if (this.matrix.favorite) {
               if (this.matrix.favorite.find(e => e.link === item.link)) {
                  this.matrix.favorite = this.matrix.favorite.filter(e => e.link !== item.link)
               }
               else {
                  this.matrix.favorite.push(item)
               }
            }
         }
      },
      mounted() {
         window.onhashchange = () => {
            this.matrix.hash = window.location.hash.substring(1)
         }
      },
      computed: {
         linksList() {
            return this.links.filter((item) => item.sort_index = 1)
         }
      }
   })
</script>
