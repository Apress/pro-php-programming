function(doc) {
    if (doc.deptno==30) {
        emit(doc._id, { empno:doc.empno, 
                        ename: doc.ename, 
                        job: doc.job,
                        mgr:doc.mgr,
                        sal:doc.sal}); 
    }
}
