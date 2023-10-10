import 'package:animated_snack_bar/animated_snack_bar.dart';
import 'package:flutter/material.dart';
import 'package:quickalert/quickalert.dart';
import 'package:todo/listtask.dart';
import 'package:todo/taskmodel.dart';

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
                validator: (String? value) {
                  if (value!.isEmpty) {
                    return 'Field is required';
                  } else if (value.length < 4) {
                    return "Enter at least 4 characters";
                  }
                  return null;
                },
              ),
              const SizedBox(
                height: 10,
              ),
              ElevatedButton(
                  onPressed: () {
                    if (myForm.currentState!.validate()) {
                      TaskModel t = TaskModel(
                          isCompleted: false, task: textController.text);
                      setState(() {
                        tasks.add(t);
                      });
                      Navigator.pop(context);
                      AnimatedSnackBar.material(
                        duration: const Duration(seconds: 2),
                        'One record added successfully',
                        type: AnimatedSnackBarType.success,
                      ).show(context);
                    } else {
                      AnimatedSnackBar.material(
                        duration: const Duration(seconds: 10),
                        'Not added',
                        type: AnimatedSnackBarType.warning,
                      ).show(context);
                    }
                    Navigator.pushReplacement(
                        context,
                        MaterialPageRoute(
                            builder: (builder) => const ListTask()));
                  },
                  child: const Text('Save'))
            ]),
          ),
        ]));
  }
}
