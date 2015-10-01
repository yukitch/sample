if (Meteor.isClient) {
  Template.body.helpers({
    tasks: [
      { text: 'test'},
      { text: 'test2'}
    ]
  });
}
