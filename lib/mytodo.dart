import 'package:flutter/material.dart';

class MyToDo extends StatefulWidget {
  const MyToDo({super.key});

  @override
  State<MyToDo> createState() => _MyToDoState();
}

class _MyToDoState extends State<MyToDo> {
  final myForm = GlobalKey<FormState>();
  TextEditingController textController = TextEditingController();
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          backgroundColor: Colors.amber,
          title: const Text('MY TODO'),
        ),
        body: Column(children: [
          const Text('TODO'),
          Form(
            key: myForm,
            child: Column(children: [
              TextFormField(
                controller: textController,
              ),
              const SizedBox(
                height: 10,
              ),
              ElevatedButton(
                  onPressed: () {
                    print(textController.text);
                  },
                  child: const Text('Save'))
            ]),
          ),
        ]));
  }
}
