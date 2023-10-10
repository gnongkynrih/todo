import 'package:flutter/material.dart';
import 'package:todo/mytodo.dart';
import 'package:todo/taskmodel.dart';

class ListTask extends StatefulWidget {
  const ListTask({super.key});

  @override
  State<ListTask> createState() => _ListTaskState();
}

//github.com/gnongkynrih
class _ListTaskState extends State<ListTask> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          'Task Manager',
          style: TextStyle(color: Colors.white),
        ),
        backgroundColor: Colors.purple.shade900,
      ),
      body: SizedBox(
        height: MediaQuery.of(context).size.height,
        child: ListView.builder(
            itemCount: tasks.length,
            itemBuilder: (context, index) {
              return ListTile(
                leading: Switch(
                  onChanged: (value) {
                    setState(() {
                      tasks[index].isCompleted = value;
                    });
                  },
                  value: tasks[index].isCompleted,
                ),
                title: Text(tasks[index].task),
              );
            }),
      ),
      floatingActionButton: CircleAvatar(
        backgroundColor: Colors.purple.shade900,
        child: IconButton(
            onPressed: () {
              Navigator.push(context,
                  MaterialPageRoute(builder: (builder) => const MyToDo()));
            },
            icon: const Icon(
              Icons.add,
              color: Colors.white,
            )),
      ),
    );
  }
}
