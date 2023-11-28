export default (await import('vue')).defineComponent({
name: 'BoardComponent',
props: {
laravelData: Object,
},

components: {
MoreBoardComponent,
},

data() {
return {
setting: '',
};
},

created() {
},

mounted() {
},

methods: {
plusLoad($a, $b) {

this.$store.dispatch('actionGetPlusLoad', $a, $b);
},
boardSet($a, $b) {
// 글작성 처리 호출
this.$store.commit('setboard', $a, $b);
},
}
});
