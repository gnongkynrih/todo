import 'package:animated_snack_bar/animated_snack_bar.dart';
import 'package:flutter/material.dart';
import 'package:quickalert/quickalert.dart';

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
                    QuickAlert.show(
                        context: context,
                        type: QuickAlertType.confirm,
                        text: 'Do you want to save the data',
                        confirmBtnText: 'Yes',
                        cancelBtnText: 'No',
                        confirmBtnColor: Colors.green,
                        onConfirmBtnTap: () {
                          if (myForm.currentState!.validate()) {
                            AnimatedSnackBar.material(
                              'One record added successfully',
                              type: AnimatedSnackBarType.success,
                            ).show(context);
                          }
                          Navigator.pop(context);
                        });
                  },
                  child: const Text('Save'))
            ]),
          ),
        ]));
  }
}
